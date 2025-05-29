<!-- arquivo: app/Views/emails/recuperar_codigo.php -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Código de Verificação</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 480px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 40px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        h1 {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: center;
        }
        .code-box {
            background-color: #f1f1f1;
            padding: 15px 0;
            border-radius: 6px;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 4px;
            color: #2d2d2d;
            text-align: center;
            width: 200px;
            margin: 20px auto;
        }
        .footer {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seu código de verificação</h1>
        <p>Use o código abaixo para concluir sua verificação.</p>
        <div class="code-box"><?= esc($codigo) ?></div>
        <p>Este código irá expirar em 10 minutos. Por segurança, não compartilhe com ninguém.</p>
        <div class="footer">
            Se você não solicitou este código, ignore este e-mail.
        </div>
    </div>
</body>
</html>
