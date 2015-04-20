<?php
// Check for empty fields
if (empty($_POST['type'])) {
    echo "No arguments Provided!";
    return false;
}

require_once('class.phpmailer.php');

$type = $_POST['type'];
$reference = $_POST['reference'];
$company = $_POST['company'];
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$linkedin = $_POST['linkedin'];
$website = $_POST['website'];
$comment = $_POST['comment'];

// Create the email and send the message
$to = 'info@sussexemploymentagency.org.uk';
$email_subject = "Website $type Contact Form:  $name";
$email_body = "<p>You have received a new message from your website contact form.</p>" . "<p>Here are the details:</p><p>";

if (!empty($company))
    $email_body .= "Company: $company<br>";
if (!empty($reference)) {
    $email_body .= "Job Reference: $reference<br>";
    $email_subject .= "; Ref:  $reference";
}
if (!empty($name))
    $email_body .= "Name: $name<br>";
if (!empty($email_address))
    $email_body .= "Email: $email_address<br>";
if (!empty($phone))
    $email_body .= "Phone: $phone<br>";
if (!empty($linkedin))
    $email_body .= "LinkedIn: $linkedin<br>";
if (!empty($website))
    $email_body .= "URL: $website<br>";
if (!empty($comment))
    $email_body .= "<br>Comment:<br>$comment";

$email_body .= "</p>";

$mail = new PHPMailer;
$mail->setFrom('info@sussexemploymentagency.org.uk', $name);
$mail->addAddress($to, 'Sussex Employent Agency');
$mail->addReplyTo($email, $name);

$mail->Subject = $email_subject;
$mail->msgHTML($email_body);

if (array_key_exists('attach', $_FILES)) {
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['attach']['name']));
    if (move_uploaded_file($_FILES['attach']['tmp_name'], $uploadfile)) {
        $mail->addAttachment($uploadfile, $_FILES['attach']['name']);
    } else {
        $msg = 'Failed to move file to ' . $uploadfile;
    }
}
if (!$mail->send()) {
    $msg = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $msg = "Message sent!";
}

echo $msg;




return true;
?>