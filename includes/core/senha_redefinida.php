<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require '../../vendor/autoload.php';

        function enviarConfirmacaoSenhaRedefinida($email, $nome) {
        $mail = new PHPMailer(true);

        try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'estoque.aqui1@gmail.com';
        $mail->Password   = 'dddccukrqxsiczxr'; // sua senha de app do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom('estoque.aqui1@gmail.com', 'Estoque Aqui');
        $mail->addAddress($email, $nome);
        $link = 'http://localhost:3000/public/login.php';

    $mail->isHTML(true);
    $mail->Subject = '🔐 Senha Redefinida com Sucesso - Estoque Aqui';
    $mail->Body = '
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: #f7f7f7; padding: 20px; border-radius: 10px;">
            <h2 style="color: #333;">Olá, ' . htmlspecialchars($nome) . '</h2>
            <p style="color: #555; font-size: 1rem;">
                Informamos que a sua senha foi <b>redefinida com sucesso</b> no sistema <b>ESTOQUE AQUI</b>.
            </p>
            <p style="color: #555; font-size: 1rem;">
                Se você realizou essa ação, não é necessário fazer nada. Agora você pode acessar normalmente com sua nova senha.
            </p>
            <p style="color: #555; font-size: 1rem;">
                Caso <b>não tenha sido você</b>, recomendamos que entre em contato conosco imediatamente e altere novamente sua senha.
            </p>
            <div style="text-align: center; margin: 30px;">
                <a href="' . $link . '"style="background-color:rgb(6, 62, 145); color: white; padding: 0.7rem 2rem; text-decoration: none; border-radius: 5px;">
                    🔑 Acessar Sistema
                </a>
            </div>
            <p style="color: #999; font-size: 14px;">
                Este é um e-mail automático. Por favor, não responda.
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
    } catch (Exception $e) {
        // Log de erro se quiser
    }
}
?>
