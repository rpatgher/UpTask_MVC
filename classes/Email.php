<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd01f34a643021f';
        $mail->Password = '3929ad420da8e9';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF_8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong>. Has creado tu cuenta en UpTask, sólo debes confirmarla en el siguiente enlace</p>';
        $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/confirmar?token=' . $this->token . '">Confirmar Cuenta</a></p>';
        $contenido .= '<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje.</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;

        // Enviar mail
        $mail->send();
    }

    public function enviarInstrucciones(){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd01f34a643021f';
        $mail->Password = '3929ad420da8e9';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Reestablece tu Contraseña';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF_8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong>. Parece que has olvidado tu Password, sigue el siguiente enlace para reestablecerlo</p>';
        $contenido .= '<p>Presiona aquí: <a href="http://localhost:3000/reestablecer?token=' . $this->token . '">Reestablecer Password</a></p>';
        $contenido .= '<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje.</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;

        // Enviar mail
        $mail->send();
    }
}