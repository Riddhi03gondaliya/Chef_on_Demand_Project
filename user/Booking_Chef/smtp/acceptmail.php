<?php
if(isset($_GET['username'])){
    $username = $_GET['username'];
    require 'smtp/PHPMailerAutoload.php';
    $html = 'Your order has been placed';
    $result = smtp_mailer($username, 'Regarding Order', $html);
    if($result === true){
        // Mail sent successfully
        echo "<script>alert('Order has been accepted.');</script>";
        // Redirect to chef_profile.php
        header("url: ../chef/chef_profile.php");
        exit();
    }else{
        echo $result;
    }
}

function smtp_mailer($to, $subject, $msg){
    $mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cheftakeout00@gmail.com';
        $mail->Password   = 'xvcgskgwthsxpxyb';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('cheftakeout00@gmail.com', 'Chef Takeout');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $msg;
        $mail->CharSet = 'UTF-8';

        $mail->send();
        return true;
    }catch (Exception $e){
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
