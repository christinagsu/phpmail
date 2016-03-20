<?php
// Pear Mail Library
require_once "Mail.php";
if (isset($_REQUEST['name'])) {
    $from = 'christinagsu@gmail.com';
    $to = 'chrisanddavid1@gmail.com';
    $subject = 'Testing wamp';
    $body = $_REQUEST['message'];

    $host    = "smtp.gmail.com";
    $port    =  "587";
    $user    = $from;
    $pass    = "testgsu1";
    $headers = array("From"=> $from, "To"=>$to, "Subject"=>$subject);
    $smtp    = @Mail::factory("smtp", array("host"=>$host, "port"=>$port, "auth"=> true, "secure"=>"tls", "username"=>$user, "password"=>$pass));
    $mail    = @$smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)){
        echo "error: {$mail->getMessage()}";
    } else {
        echo "Message sent";
    }
    
}

?>
<form method="post" name="myemailform" action="email.php">
 
Enter Name: <input type="text" name="name">
 
Enter Email Address:    <input type="text" name="email">
 
Enter Message:  <textarea name="message"></textarea>
 
<input type="submit" value="Send Form">
</form>
