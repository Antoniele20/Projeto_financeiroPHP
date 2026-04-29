<?php
require_once 'includes/functions.php'; 
verificarAcesso();

// Limpa apenas o histórico de transações, não a sessão de login
$_SESSION['transacoes'] = [];

// Redireciona de volta ao dashboard
header("Location: index.php");
exit;
?>