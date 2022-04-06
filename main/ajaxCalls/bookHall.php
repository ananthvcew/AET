<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->bookingHall();
$obj1=new Auditorium();
$obj2=new College();
$obj3=new Department();
if($res['data']){
	require '../../PHPMailer/PHPMailerAutoload.php';
    $email=$res['data']['adminEmail'];

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

    $mail->Subject =$obj1->getName($res['data']['auditorium']).' Booking for '.$obj2->getCollegeName($res['data']['ccode']).' - Reg.';
    if($res['data']['dcode']==1){
        $dname='Common to All';
    }else{
        $dname=$obj3->getDepartmentName($res['data']['dcode']);
    }
    $mail->Body    = ' Dear Sir,<br>
                        &nbsp;&nbsp;&nbsp;We are Plan to contact <b>'.$res['data']['event_info'].' on '.date('d-M-Y',strtotime($res['data']['date'])).'</b>. So We request you to kindly give the permission to utilize our <b>'.$obj1->getName($res['data']['auditorium']).'</b>. <br><br><table border=1 style="border-collapse: collapse; width:50%; text-align:left;"><tr><th>Collge</th><th>'.$obj2->getCollegeName($res['data']['ccode']).'</th></tr><tr><th>Department</th><th>'.$dname.'</th></tr><tr><th>Chief Guest</th><th>'.$res['data']['cgd'].'</th></tr><tr><th>No.of Audience</th><th>'.$res['data']['nfa'].'</th></tr> </table><br> <u>With warm regards,</u><br><b>'.$res['data']['booking_by'].'</b><br> '.$res['data']['contact_no'].'';
    
    if(!$mail->send()) {
        $output = 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $output = 'Message has been sent';
    }

}
$out=["status"=>$res['status'],"mail"=>$output];
echo json_encode($out);
?>