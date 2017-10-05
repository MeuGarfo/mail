<?php
namespace Basic;
use PHPMailer\PHPMailer\PHPMailer;
class Mail{
    var $mail;
    function __construct($cfg){
        $this->mail = new PHPMailer(false);
        $this->mail->isSMTP();
        $this->mail->Host = $cfg['server'];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $cfg['user'];
        $this->mail->Password = $cfg['password'];
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = $cfg['port'];
        $this->mail->setFrom($cfg['from'], $cfg['name']);
    }
    function send($from,$to,$subject,$html,$plain=false){
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $html;
        if($plain){
            $this->mail->AltBody = $plain;
        }
        if($this->mail->send()){
            return true;
        }else{
            return false;
        }
    }
}
