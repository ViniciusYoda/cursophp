<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Globais</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <pre>
            <?php 
                echo "Superglobal GET";
                var_dump($_GET);

                echo "Superglobal POST";
                var_dump($_POST);

                echo "Superglobal REQUEST";
                var_dump($_REQUEST);

                echo "Superglobal SERVER";
                var_dump($_SERVER);

                echo "Superglobal COOKIE";
                var_dump($_COOKIE);

                echo "Superglobal SESSION";
                var_dump($_SESSION);

                echo "Superglobal FILES";
                var_dump($_FILES);

                echo "Superglobal ENV";
                var_dump($_ENV);

                echo "Superglobal GLOBALS";
                var_dump($GLOBALS);
            ?>
        </pre>
    </main>
</body>
</html>