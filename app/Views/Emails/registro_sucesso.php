<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Criada com Sucesso!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 0;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; background-color: #ffffff; margin: 30px auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden;">
        <tr>
            <td style="background-color: #2563eb; padding: 20px; text-align: center; color: #ffffff;">
                <h2 style="margin: 0;">MicroPlanner</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 30px;">
                <h3 style="color: #111827;">Conta Criada com Sucesso!</h3>
                <p>Olá <strong><?= esc($nome) ?></strong>,</p>
                <p>Estamos felizes em informar que sua conta na <strong>MicroPlanner</strong> foi criada com sucesso.</p>
                <p><strong>📧 E-mail:</strong> <?= esc($email) ?><br>
                <strong>📅 Registro em:</strong> <?= esc($data_registro) ?></p>
                <p>Você já pode acessar nossa plataforma e começar a usar os recursos disponíveis.</p>
                <div style="text-align: center; margin: 30px 0;">
                    <a href="<?= base_url('login') ?>" style="background-color: #2563eb; color: #ffffff; padding: 12px 25px; border-radius: 5px; text-decoration: none; font-weight: bold;">Acessar Plataforma</a>
                </div>
                <p style="color: #6b7280;">Se você não reconhece esse cadastro, por favor entre em contato com o suporte.</p>
                <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 30px 0;">
                <p style="text-align: center; color: #9ca3af;">Equipe de Suporte - MicroPlanner</p>
            </td>
        </tr>
    </table>
</body>
</html>
