<?php
    include'../includes/config.php';
    $email='mananth310@gmail.com';
    $name='mananth310@gmail.com';

    $mail = new PHPMailer;

    $mail->SMTPDebug = 0;                             
    $mail->isSMTP();                                   
    $mail->Host = 'mail.vcew.ac.in';  
    $mail->SMTPAuth = true;                              
    $mail->Username = '_mainaccount@vcew.ac.in';               
    $mail->Password = '0kCkV#H@l.GY';                        
    $mail->SMTPSecure = 'ssl';                          
    $mail->Port = 465;                                 
    $mail->setFrom('no-reply@vcew.ac.in', 'VEIW-AET');
    $mail->addAddress($email);    
    $mail->isHTML(true);     

    $mail->Subject = 'AET- Auditorium Booking - Reg.';
   
    $mail->Body    = '"'.$name.'" Hall Booked Successfully waiting for Approvel the admin approve event then only final in our event hall booking';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

?>
