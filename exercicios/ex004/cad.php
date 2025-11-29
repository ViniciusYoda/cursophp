<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do Formulário</h1>
    </header>
    <?php 
        $nome = $_GET["nome"] ?? "sem nome";
        $sobrenome = $_GET["sobrenome"] ?? "sem sobrenome";
        echo "Olá <strong>$nome $sobrenome</strong>, seja bem vindo(a)!";
    ?>
    <p><a href="index.html">Voltar para a pagina anterior</a></p>
</body>
</html>