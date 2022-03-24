<?php
include'../../includes/config.php';
$obj=new BookingInfo();
$res=$obj->updateBookingStatus();
$obj1=new Auditorium();
$obj2=new College();
$obj3=new Department();
if($res['data']){
	require '../../PHPMailer/PHPMailerAutoload.php';
    $email=$res['data']['email'];

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

    $mail->Subject = $obj1->getName($res['data']['auditorium']).' Booking for '.$obj2->getCollegeName($res['data']['ccode']).' - Reg.';
    if($res['data']['dcode']==1){
        $dname='Common to All';
    }else{
        $dname=$obj3->getDepartmentName($res['data']['dcode']);
    }
    if($res['data']['approve_status']=='Approve'){
    	$mail->Body    = ' Dear Sir / Madam,<br>
                        &nbsp;&nbsp;&nbsp; As per your request, you can utilize our <b>'.$obj1->getName($res['data']['auditorium']).' on '.date('d-M-Y',strtotime($res['data']['date'])).'</b>.
                        <br> <u>With warm regards,</u><br><b>Incharge,<br>'.$obj1->getName($res['data']['auditorium']).',</b><br> ';
    }else{
    	$mail->Body    = " Dear Sir / Madam,<br>
                        &nbsp;&nbsp;&nbsp; We regret to inform you that you can't utilize our <b>".$obj1->getName($res['data']['auditorium'])." on ".date('d-M-Y',strtotime($res['data']['date']))."</b>.<br><b> Reason :".$res['data']['remark']."</b><br> <u>With warm regards,</u><br><b>Incharge,<br>".$obj1->getName($res['data']['auditorium']).",</b><br> ";
    }
    
    
    if(!$mail->send()) {
        $output = 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $output = 'Message has been sent';
    }

}
$out=["status"=>$res['status'],"mail"=>$output];
echo json_encode($out);

//echo json_encode($res);
?>