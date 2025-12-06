<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Tempo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $segundos = $_GET['segundos'] ?? 0;
    ?>
    <main>
        <h1>Conversor de Tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="segundos">Total de Segundos</label>
            <input type="number" name="segundos" id="segundos" value="<?=$segundos?>">
            
            <input type="submit" value="Converter">
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php 
            if ($segundos > 0) {
                $semanas = floor($segundos / 604800);
                $resto = $segundos % 604800;
                
                $dias = floor($resto / 86400);
                $resto = $resto % 86400;
                
                $horas = floor($resto / 3600);
                $resto = $resto % 3600;
                
                $minutos = floor($resto / 60);
                $segs = $resto % 60;

                echo "<p>$segundos segundos = <strong>$semanas semanas, $dias dias, $horas horas, $minutos minutos e $segs segundos</strong></p>";
            }
        ?>
    </section>
</body>
</html>
