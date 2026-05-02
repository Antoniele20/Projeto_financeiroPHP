<?php
require_once 'includes/functions.php'; 

verificarAcesso();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $valor = floatval($_POST['valor']);
    $tipo = $_POST['tipo'];

    if (!empty($nome) && $valor > 0) {
        $_SESSION['transacoes'][] = [
            'nome' => $nome,
            'valor' => $valor,
            'tipo' => $tipo
        ];
    }
}

$saldoTotal = calcularSaldo($_SESSION['transacoes'] ?? []);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Financeiro</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 20px; }
        .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        .receita { color: green; }
        .despesa { color: red; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; }
        button { background: #0066cc; color: white; border: none; padding: 10px; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="card">
    <a href="logout.php" style="float: right; color: red;">Sair</a>
    <h2>Dashboard Financeiro</h2>
    
    <div style="background: #e9ecef; padding: 15px; border-radius: 8px;">
        <h3>Saldo Total: <?php echo formatarMoeda($saldoTotal); ?></h3>
    </div>

    <form method="POST" action="index.php">
        <h3>Nova Transação</h3>
        <input type="text" name="nome" placeholder="Descrição (ex: Aluguel)" required>
        <input type="number" step="0.01" name="valor" placeholder="Valor" required>
        <select name="tipo">
            <option value="receita">Receita</option>
            <option value="despesa">Despesa</option>
        </select>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    
    <br>
    <a href="historico.php">Ver Histórico Completo</a>
</div>

</body>
</html>
