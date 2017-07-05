<?php
// require 'PHPMailer/PHPMailerAutoload.php';

// $mail = new PHPMailer;

// $mail->isSMTP();                                   // Set mailer to use SMTP
// $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                            // Enable SMTP authentication
// $mail->Username = 'srinath.chinchole@qleverlabs.com';          // SMTP username
// $mail->Password = '9867613282'; // SMTP password
// $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465;                                 // TCP port to connect to

// $mail->setFrom('srinath.chinchole@qleverlabs.com', 'shrinath');
// $mail->addReplyTo('shrinath598@gmail.com', 'Chinchole');
// $mail->addAddress('shrinath598@gmail.com');   // Add a recipient
// //$mail->addCC('cc@example.com');
// //$mail->addBCC('bcc@example.com');

// $mail->isHTML(true);  // Set email format to HTML

// $bodyContent = '<h1>Enquiry from Qleverlabs Website</h1>';
// $bodyContent .= '<p>Finaly Now I can send mail <b>offline</b></p>';
// $name = $_POST['NAME']; 
// $email_address = $_POST['EMAIL']; 
// $phone = $_POST['PHONE']; 
// $mail->Subject = 'Enquiry from Qleverlabs Website';
// $mail->Body    = 	" Here are the details:\n Name: $name <br><br> \n Email: $email_address <br><br> \n Number: \n $phone"; 

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
    
//     header('Location: index.html');

// }


require 'vendor/autoload.php';
use Mailgun\Mailgun;

 $name = $_POST['NAME']; 
$email_address = $_POST['EMAIL']; 
$phone = $_POST['PHONE']; 

# Instantiate the client.
$mgClient = new Mailgun('key-d3b60c6f01ad98a3380b10483abe5b3a');
$domain = "sandbox65f5b06ec34d43fb8c7612db1c3e2793.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
  array('from'    => 'My Islamic Kart Seller <'.$email_address.'>',
        'to'      => ' <seller@myislamickart.com>',
        'subject' => 'Seller Registered',
        'text'    => 'Name:'.$name.'  Phone'.$phone));

        
        if(isset($result) == 1){
         header('Location:index.php?s=ok');
        }else{
            header('Location:index.php?s=nok');
        }
        ?>
