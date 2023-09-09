<?php
require_once('PHPMailer.php');
require_once('SMTP.php');
require_once('Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$msg = $_POST['mensagem'];

$data_envio = date('d/m/Y');

$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = ''; // Host SMTP tem algumas gratuitas pesquise
    $mail->SMTPAuth = true;
    $mail->Username = ''; // username
    $mail->Password = ''; // Senha
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // não altere
    $mail->Port = 587; // Altere somente se necessario

    $mail->setFrom(''); // E-mail que vai enviar
    $mail->addAddress(''); // E-mail que vai recever

    $mail->isHTML(true);
    $mail->Subject = 'Novo Pedido de Ajuda'; // Titulo do E-mail
    $mail->Body = 'Preciso de ajuda: '.$msg ; // corpo do E-mail, aceita CSS e HTML
    $mail->AltBody = 'Novo e-mail';

    if ($mail->send()) {
        header('Location: #'); // deu tudo certo
        exit;
    } else {
        header('Location: #'); // alguma coisa falhou
        exit;
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}"; // erro na configuração
    exit;
}

header('Location: #'); // erro interno
exit;
?>
