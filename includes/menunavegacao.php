<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle Financeiro</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        nav { margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #ccc; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; font-weight: bold; }
        .btn { padding: 8px 15px; background: #0066cc; color: #fff; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-danger { background: #cc0000; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        .receita { color: green; font-weight: bold; }
        .despesa { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="historico.php">Histórico de Transações</a>
            <a href="limpar.php" class="btn btn-danger" onclick="return confirm('Deseja realmente zerar o mês?');">Zerar Mês</a>
            <a href="logout.php" style="float:right; color: red;">Sair</a>
        </nav>