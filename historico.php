<?php
require_once 'includes/functions.php'; 
verificarAcesso(); // Proteção de rota

$transacoes = $_SESSION['transacoes'];
$totalDespesas = calcularTotalDespesas($transacoes);

require_once 'includes/menunavegacao.php';
?>

<h2>Histórico de Transações</h2>

<?php if (empty($transacoes)): ?>
    <p>Nenhuma transação registrada neste mês.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Impacto no Saldo</th>
                <th>Relevância (Despesas)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transacoes as $transacao): ?>
                <tr>
                    <td><?= $transacao['nome'] ?></td>
                    <td style="text-transform: capitalize;"><?= $transacao['tipo'] ?></td>
                    <td class="<?= $transacao['tipo'] ?>">
                        <?= formatarMoeda($transacao['valor']) ?>
                    </td>
                    <td>
                        <?= ($transacao['tipo'] === 'receita') ? '+' : '-' ?>
                    </td>
                    <td>
                        <?php 
                            // Lógica de bônus: Porcentagem do gasto frente ao total de despesas
                            if ($transacao['tipo'] === 'despesa') {
                                $porcentagem = calcularRelevancia($transacao['valor'], $totalDespesas);
                                echo number_format($porcentagem, 1, ',', '.') . "%";
                            } else {
                                echo "-";
                            }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

    </div> </body>
</html>