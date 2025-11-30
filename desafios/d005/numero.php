<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisador de número</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Analisador de números</h1>
        <?php 
            $num = $_POST['n'] ?? 0;
            echo "<p>O número escolhido foi <strong>$num</strong></p>";

            $int = (int)$num;
            $fra = (float)$num;

            echo "<ul>
                <li>A parte inteira do número é <strong>$int</strong></li>
                <li>A parte fracionária do número é <strong>" . ($fra - $int) . "</strong></li>
                <li>O arredondamento para cima é <strong>" . ceil($fra) . "</strong></li>
                <li>O arredondamento para baixo é <strong>" . floor($fra) . "</strong></li>
                <li>A raiz quadrada do número é <strong>" . sqrt($fra) . "</strong></li>
                </ul>";
        ?>
    </main>
</body>
</html>