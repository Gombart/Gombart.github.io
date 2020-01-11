<?php
  header('Location: /');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$visitor_email = $_POST['Ename'];
$message = $_POST['subject'];

$email_from = 'bezirksfachwart@trampolin-oberfranken.de';
$email_subject = "Neue Web-Nachricht";
$email_body = "You have received a new message from the user $firstname\n $lastname\n $visitor_email\n." . "Here is the message: \n $message".;

$to = "bezirksfachwart@trampolin-oberfranken.de";
$headers = "From: $email_from \r\n";
$headers = "Reply-To: $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>
