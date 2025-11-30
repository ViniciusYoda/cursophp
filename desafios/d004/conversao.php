<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Conversão</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Resultado da Conversão</h1>
        
        <!-- Link para voltar -->
        <p><a href="index.html">← Voltar para converter novo valor</a></p>

        <?php
            // Valor com tratamento seguro
            $valor = isset($_GET['valor']) ? (float)$_GET['valor'] : 0;
            $cotacao = 0;
            $data_cotacao = '';
            
            // URL corrigida da API do Banco Central
            $url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.10813/dados/ultimos/1?formato=json";
            
            // Configuração do contexto para evitar problemas
            $options = [
                'http' => [
                    'method' => 'GET',
                    'header' => 'User-Agent: Mozilla/5.0'
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ];
            
            $context = stream_context_create($options);
            
            // Tentativa de obter a cotação
            $response = @file_get_contents($url, false, $context);
            
            if ($response !== false) {
                $data = json_decode($response, true);
                
                if ($data && count($data) > 0) {
                    $ultimaCotacao = $data[0]; // Pega o primeiro item (mais recente)
                    $cotacao = (float)$ultimaCotacao['valor'];
                    $data_cotacao = $ultimaCotacao['data'];
                    
                    echo "<p>Cotação do Dólar (USD): <strong>R$ " . number_format($cotacao, 2, ',', '.') . "</strong></p>";
                    echo "<p>Data: " . $data_cotacao . "</p>";
                } else {
                    echo "<p style='color: red;'>Erro: Dados da cotação não encontrados na API</p>";
                    // Valor fallback
                    $cotacao = 5.50;
                    echo "<p>Usando cotação alternativa: R$ " . number_format($cotacao, 2, ',', '.') . "</p>";
                }
            } else {
                echo "<p style='color: red;'>Erro ao acessar a API do Banco Central</p>";
                // Valor fallback para permitir o cálculo
                $cotacao = 5.50;
                echo "<p>Usando cotação alternativa: R$ " . number_format($cotacao, 2, ',', '.') . "</p>";
            }

            // Cálculo seguro da conversão
            if ($cotacao > 0 && $valor > 0) {
                $total = $valor / $cotacao;
                $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);    
                echo "<p>Seus " . numfmt_format_currency($padrao, $valor, "BRL") . " equivalem a " . numfmt_format_currency($padrao, $total, "USD") . " Dólares</p>";
            } elseif ($valor > 0) {
                echo "<p style='color: red;'>Não foi possível realizar a conversão.</p>";
            } else {
                echo "<p style='color: red;'>Nenhum valor informado para conversão.</p>";
            }
        ?>
    </main>
</body>
</html>