<?php

namespace Source\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    private \stdClass $data;

    private PHPMailer $mail;

    private Message $message;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();

        $this->mail = new PHPMailer(true);
        $this->message = new Message();

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.sendgrid.net';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $_ENV['username'];
        $this->mail->Password   = $_ENV['password'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port       = 465;
        $this->mail->setLanguage('br');
        $this->mail->CharSet = PHPMailer::CHARSET_UTF8;
    }

    public function bootstrap(string $subject, string $body, string $toEmail, string $toName)
    {
        $this->data = new \stdClass();
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->toEmail = $toEmail;
        $this->data->toName = $toName;
        return $this;
    }

    public function attach(string $filePath, string $fileName): Email
    {
        $this->data->attachments[$filePath] = $fileName;

        return $this;
    }

    public function send(string $fromEmail = CONFIG_EMAIL_FROM_EMAIL, string $fromName = CONFIG_EMAIL_FROM_NAME): bool
    {
        if(empty($this->data)){
            $this->message->error("Erro ao enviar: verifique os dados");
            return false;
        }

        if(!is_email($this->data->toEmail)){
            $this->message->error("E-mail de destinatário é inválido");
            return false;
        }

        if(!is_email($fromEmail)){
            $this->message->error("E-mail de remetente é inválido");
            return false;
        }

        try{

            $this->mail->setFrom($fromEmail, $fromName);
            $this->mail->addAddress($this->data->toEmail, $this->data->toName);
            $this->mail->addReplyTo($fromEmail, $fromName);

            if(!empty($this->data->attachments)){
                foreach ($this->data->attachments as $filePath => $filename){
                    $this->mail->addAttachment($filePath, $filename);
                }
            }

            $this->mail->isHTML(true);
            $this->mail->Subject = $this->data->subject;
            $this->mail->Body = $this->data->body;

            $this->mail->send();
            return true;

        }catch (Exception $mailException){
            $this->message->error($mailException->getMessage());
        }

        return true;
    }

    public function mail(): PHPMailer
    {
        return new PHPMailer();
    }

    public function getMessage(): Message
    {
        return $this->message;
    }
}