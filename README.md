# Curso de PHP

Repositório de estudos introdutórios de PHP, composto por exercícios guiados e desafios práticos. Os exemplos combinam PHP, HTML e CSS para explorar saída de dados, tipos primitivos, formulários, superglobais, operações matemáticas e consumo de API.

## Tecnologias e requisitos

- PHP 7.4 ou superior (PHP 8.x recomendado)
- Navegador web
- Extensão PHP `intl` para os desafios `d003` e `d004`
- Acesso à internet e `allow_url_fopen` habilitado para consultar a cotação no desafio `d004`

Não há banco de dados, Composer, framework ou processo de build. Cada pasta contém um exemplo independente.

## Como executar

Na raiz do repositório, inicie o servidor embutido do PHP:

```bash
php -S localhost:8000
```

Depois, abra no navegador o exemplo desejado. Alguns endereços:

- `http://localhost:8000/exercicios/ex000/`
- `http://localhost:8000/exercicios/ex004/index.html`
- `http://localhost:8000/desafios/d001/index.html`
- `http://localhost:8000/desafios/d013/`

Para encerrar o servidor, pressione `Ctrl+C` no terminal.

### Conferindo a instalação

```bash
php --version
php -m | grep intl
```

Se `intl` não aparecer no segundo comando, instale ou habilite a extensão correspondente à sua versão do PHP antes de executar os conversores monetários.

## Estrutura do projeto

```text
.
├── exercicios/          # Exemplos introdutórios ex000 a ex006
│   └── exNNN/           # Um exercício independente por pasta
└── desafios/            # Aplicações práticas d001 a d013
    └── dNNN/            # Um desafio independente por pasta
```

Em geral, `index.php` ou `index.html` é o ponto de entrada. Exemplos divididos em duas páginas enviam um formulário para outro arquivo PHP. Os arquivos `style.css` cuidam apenas da apresentação, e `desafios/d013/images/` contém as imagens das cédulas.

## Exercícios

| Pasta | Conteúdo | Conceitos principais |
| --- | --- | --- |
| `ex000` | “Olá, Mundo” | PHP embutido no HTML, `echo` e Unicode |
| `ex001` | Informações do servidor | Função `phpinfo()` |
| `ex002` | Data e hora atuais | Fuso horário, `date()` e concatenação |
| `ex003` | Tipos primitivos | Hexadecimal, arrays, classe, objeto e `var_dump()` |
| `ex004` | Formulário de apresentação | Formulário GET, `$_GET` e operador `??` |
| `ex005` | Inspeção de superglobais | POST, `$_GET`, `$_POST`, `$_REQUEST`, `$_SERVER` e outras superglobais |
| `ex006` | Soma de dois valores | Formulário autorreferente, GET e sintaxe curta de saída `<?= ... ?>` |

O `ex001` expõe detalhes da configuração do servidor e deve ser usado somente em um ambiente local de estudos. O `ex005` também imprime informações extensas da requisição e do ambiente.

## Desafios

| Pasta | Aplicação | Entrada e resultado |
| --- | --- | --- |
| `d001` | Antecessor e sucessor | Recebe um inteiro por GET e mostra os números adjacentes |
| `d002` | Número aleatório | Gera um valor entre 1 e 100 a cada recarga |
| `d003` | Conversão monetária fixa | Converte BRL para USD usando o fator fixo `0,19` |
| `d004` | Conversão com cotação externa | Consulta uma série do Banco Central e converte BRL para USD; usa `5,50` como fallback |
| `d005` | Analisador de número real | Exibe partes inteira e fracionária, arredondamentos e raiz quadrada |
| `d006` | Divisão inteira | Calcula quociente e resto |
| `d007` | Salários mínimos | Decompõe um salário em salários mínimos inteiros e valor restante |
| `d008` | Raízes | Calcula raízes quadrada e cúbica |
| `d009` | Médias | Calcula médias aritmética simples e ponderada de dois valores |
| `d010` | Acréscimo percentual | Aplica ao preço uma porcentagem escolhida com um controle deslizante |
| `d011` | Médias | Atualmente repete a implementação do `d009` |
| `d012` | Conversor de tempo | Decompõe segundos em semanas, dias, horas, minutos e segundos |
| `d013` | Caixa eletrônico | Decompõe um saque nas cédulas de R$ 100, 50, 20, 10, 5, 2 e 1 |

## Fluxo dos formulários

Há dois padrões no repositório:

1. Formulários com página de resultado separada, como `ex004`, `ex005`, `d001`, `d003`, `d004` e `d005`.
2. Formulários autorreferentes, do `ex006` e de `d006` a `d013`, nos quais a mesma página recebe os parâmetros e apresenta o cálculo.

A maioria usa o método GET, deixando os valores visíveis na URL. `ex005` e `d005` usam POST.

## Observações da análise

O projeto tem finalidade didática e ainda não possui testes automatizados. Antes de tratar os exemplos como aplicações de produção, vale considerar os seguintes pontos:

- Os valores recebidos pelos formulários são usados com pouca ou nenhuma validação e escapar a saída com `htmlspecialchars()` evita injeção de HTML.
- `d004` desabilita a verificação do certificado TLS na chamada externa. Isso simplifica a execução local, mas não é seguro em produção.
- `d006` avisa sobre divisão por zero, porém ainda tenta renderizar variáveis de resultado que não foram definidas nesse caso.
- `d009` e `d011` podem dividir por zero quando a soma dos pesos é zero.
- `d011` é uma cópia funcional de `d009`; o nome ou o conteúdo provavelmente deve ser revisto conforme a sequência original do curso.
- Os valores de cotação (`d003`), salário mínimo (`d007`) e fallback cambial (`d004`) são constantes didáticas e podem ficar desatualizados.
- Não há configuração de licença no repositório.

## Validação manual sugerida

Depois de iniciar o servidor, percorra as páginas e envie valores comuns, zero, números negativos (quando o formulário permitir) e campos vazios. Para verificar a sintaxe de todos os arquivos PHP em um ambiente Unix:

```bash
find exercicios desafios -name '*.php' -exec php -l {} \;
```

Para `d004`, teste também sem conexão com a internet para confirmar a mensagem de erro e o uso da cotação alternativa.
