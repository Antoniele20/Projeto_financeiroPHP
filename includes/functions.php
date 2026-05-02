<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function formatarMoeda($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}
function calcularSaldo($transacoes) {
    $saldo = 0;
    foreach ($transacoes as $transacao) {
        if ($transacao['tipo'] === 'receita') {
            $saldo += $transacao['valor'];
        } else {
            $saldo -= $transacao['valor'];
        }
    }
    return $saldo;
}
function calcularTotalDespesas($transacoes) {
    $total = 0;
    foreach ($transacoes as $transacao) {
        if ($transacao['tipo'] === 'despesa') {
            $total += $transacao['valor'];
        }
    }
    return $total;
}
function calcularRelevancia($valorDespesa, $totalDespesas) {
    if ($totalDespesas == 0) return 0;
    return ($valorDespesa / $totalDespesas) * 100;
}
function verificarAcesso() {
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: login.php");
        exit;
    }
}
?>
