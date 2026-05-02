<?php
require_once 'includes/functions.php'; 

if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: index.php");
    exit;
}

$erro = "";
$usuario_correto = "admin";
$senha_hash_bd = password_hash("123456", PASSWORD_DEFAULT); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuario_correto && password_verify($senha, $senha_hash_bd)) {
        $_SESSION['logado'] = true;
        if (!isset($_SESSION['transacoes'])) {
            $_SESSION['transacoes'] = [];
        }
        header("Location: index.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle Financeiro</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #eee; }
        .login-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin-bottom: 15px; padding: 10px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #0066cc; color: white; border: none; border-radius: 4px; cursor: pointer;}
        .erro { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Acesso Restrito</h2>
        <?php if($erro): ?><p class="erro"><?= $erro ?></p><?php endif; ?>
        
        <form method="POST" action="login.php">
            <label>Usuário (admin):</label>
            <input type="text" name="usuario" required>
            
            <label>Senha (123456):</label>
            <input type="password" name="senha" required>
            
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
