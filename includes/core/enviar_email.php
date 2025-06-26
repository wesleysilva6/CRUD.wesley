<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuração do servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'estoque.aqui1@gmail.com';
    $mail->Password   = 'dddccukrqxsiczxr';  // Lembre-se: essa é a senha de app do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    // Remetente e destinatário
    $mail->setFrom('estoque.aqui1@gmail.com', 'Estoque Aqui');
    $mail->addAddress($_SESSION['email_redefinir']);  // Email do usuário que pediu a redefinição

    // Monta o link de redefinição
    $link = 'http://localhost:3000/public/redefinir.php?email=' . urlencode($_SESSION['email_redefinir']);

    // Conteúdo do e-mail (HTML)
    $mail->isHTML(true);
    $mail->Subject = '🔒 Redefinição de Senha - Estoque Aqui';
    $mail->Body = '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: #f7f7f7; padding: 20px; border-radius: 10px;">
            <h2 style="color: #333;">Olá, ' . htmlspecialchars($_SESSION['nome']) . '</h2>
            <p style="color: #555; font-size: 1rem;">
                Recebemos uma solicitação para <b>redefinir a sua senha</b> do sistema <b>ESTOQUE AQUI</b>.
            </p>
            <p style="color: #555; font-size: 1rem;">
                Caso você tenha feito essa solicitação, clique no botão abaixo para redefinir sua senha:
            </p>
            <div style="text-align: center; margin: 30px;">
                <a href="' . $link . '" style="background-color:rgb(6, 62, 145); color: white; padding: 0.7rem 2rem; text-decoration: none; border-radius: 5px;">
                    🔐 Redefinir Senha
                </a>
            </div>
            <p style="color: #999; font-size: 14px;">
                Se você não solicitou esta alteração, pode ignorar este e-mail. Sua senha permanecerá a mesma.
            </p>
            <hr style="border: none; border-top: 1px solid #ddd;">
            <p style="color: #999; font-size: 12px; text-align: center;">
                &copy; 2025 Estoque Aqui. Todos os direitos reservados.
            </p>
        </div>
    </body>
    </html>
    ';

    $mail->send();
    header('Location: ../../public/check.php?email=enviado');
    exit;

    } catch (Exception $e) {
    header('Location: ../../public/check.php?email=nao&enviado');
    exit;
    }
?>
