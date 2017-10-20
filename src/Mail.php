<?php
/**
* Basic
* Micro framework em PHP
*/

namespace Basic;

use PHPMailer\PHPMailer\PHPMailer;

/**
* Classe Mail
*/
class Mail
{
    public $mail;
    /**
    * Condiguração do SMTP
    * @param array $cfg Dados da configuração
    */
    public function __construct(array $cfg)
    {
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
    /**
    * Enviar email
    * @param  string $to      Destinatário
    * @param  string $subject Assunto
    * @param  string $html    Mensagem em HTML
    * @param  mixed $plain    Mensagem em plain-text
    * @return bool            Retorna true ou false
    */
    public function send(string $to, string $subject, string $html, string $plain=null):bool
    {
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body    = $html;
        if ($plain) {
            $this->mail->AltBody = $plain;
        }
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
