<?php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
if(isset($_POST)) {
require("sendgrid-php/sendgrid-php.php");

// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
$name = $_POST['name'];
$email1 = $_POST['email'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("sampratid@gmail.com", "Samprati Dash");
$email->setSubject("You have recieveed email from website");
$email->addTo("sampratid@gmail.com", "samprati dash");

$email->addContent(
    "text/html", "  <tr>
    <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
        padding-top: 25px;
        color: #D02D69;
        font-family: 'Montserrat', sans-serif;' class='header'>
            Welcome you have a new message from:</br> $name </br> , $email1,</br> $message .</br>
    </td>
</tr>

"
);
$sendgrid = new \SendGrid('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');
// $sendgrid = new \SendGrid(getenv('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'));
try {
    $response = $sendgrid->send($email);
    // print $response->statusCode() . "\n";
    // print_r($response->headers());
    // print $response->body() . "\n";
    header("Location: index.php"); 
    exit();

} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
}