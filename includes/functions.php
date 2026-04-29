<?php
// Inicia a sessão de forma segura, se já não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Função para formatar valores em Reais (R$)
function formatarMoeda($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}

// Função para calcular o saldo total
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

// Função para calcular o total gasto apenas em despesas
function calcularTotalDespesas($transacoes) {
    $total = 0;
    foreach ($transacoes as $transacao) {
        if ($transacao['tipo'] === 'despesa') {
            $total += $transacao['valor'];
        }
    }
    return $total;
}

// Função para calcular a relevância percentual da despesa
function calcularRelevancia($valorDespesa, $totalDespesas) {
    if ($totalDespesas == 0) return 0;
    return ($valorDespesa / $totalDespesas) * 100;
}

// Controle de Acesso: Redireciona se não estiver logado
function verificarAcesso() {
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        header("Location: login.php");
        exit;
    }
}
?>