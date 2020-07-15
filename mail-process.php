<?php
include_once 'database.php';
$first_name = $_POST['name'];
$last_name = $_POST['email'];
$city_name = $_POST['phone_no'];
$email = $_POST['message'];

/* sql query for inserting data into database */

mysqli_query($conn,"insert into employee (name,email,phone_no,message) values ('$name','$email','$phone_no','$message')") or die(mysqli_error());
require_once 'mailer/class.phpmailer.php';
/* creates object */
$mail = new PHPMailer(true);
$mailid = $email;
$subject = "Thank you";
$text_message = "Hello";
$message = "Thank You for Contact with us.";

try
{
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = '465';
$mail->AddAddress($mailid);
$mail->Username ="fabcutsofficial@gmail.com";
$mail->Password ="fabcuts101ga";
$mail->SetFrom('fabcutsofficial@gmail.com','Team FabCuts');
$mail->AddReplyTo("fabcutsofficial@gmail.com","Team FabCuts");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $message;
if($mail->Send())
{
echo "Thank you for register u got a notification through the mail you provide";
}
}
catch(phpmailerException $ex)
{
$msg = "
".$ex->errorMessage()."
";
}
?>
