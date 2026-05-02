<?php
require_once 'includes/functions.php'; 
verificarAcesso();
$_SESSION['transacoes'] = [];
header("Location: index.php");
exit;
?>
