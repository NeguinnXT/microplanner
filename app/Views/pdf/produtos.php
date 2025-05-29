<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 0.85em;
            font-weight: bold;
            border-radius: 4px;
            color: white;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-warning {
            background-color: #ffc107;
            color: black;
        }

        .badge-success {
            background-color: #28a745;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Lista de Produtos</h1>
    <table>
        <?php if (empty($produtos)): ?>
            <p><strong>Nenhum produto cadastrado.</strong></p>
        <?php else: ?>
            <thead>
                <tr>
                    <th>Codigo Produto</th>
                    <th>Nome Produto</th>
                    <th>Quantidade Produto</th>
                    <th>Valor Produto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= esc($produto['SKU']) ?></td>
                        <td><?= esc($produto['Nome']) ?></td>
                        <td>
                            <?php if ($produto['Qtde'] == 0): ?>
                                <span class="badge badge-danger">Sem estoque</span>
                            <?php elseif ($produto['Qtde'] < 5): ?>
                                <span class="badge badge-warning">Estoque baixo (<?= esc($produto['Qtde']) ?>)</span>
                            <?php else: ?>
                                <?= esc($produto['Qtde']) ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($produto['Valor'] == 0): ?>
                                <span class="badge badge-danger">Grátis</span>
                            <?php elseif ($produto['Valor'] < 5): ?>
                                <span class="badge badge-success"><strong><?= number_format($produto['Valor'], 2, ',', '.') ?>€</strong> 🔥 Promoção</span>
                            <?php else: ?>
                                <strong><?= number_format($produto['Valor'], 2, ',', '.') ?>€</strong>
                            <?php endif; ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
    </table>
<?php endif; ?>

</body>

</html>