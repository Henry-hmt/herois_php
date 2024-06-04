<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <label for="universo">Digite o nome do universo:</label>
        <input type="text" id="universo" name="universo" required><br><br>

        <label for="heroi">Digite o nome do herói:</label>
        <input type="text" id="heroi" name="heroi" required><br><br>

        <label for="quantidade">Digite a quantidade de heróis:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <input id = "btn"type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $universo = strtolower($_POST['universo']);
        $heroi = strtolower($_POST['heroi']);
        $quantidade = intval($_POST['quantidade']);
       
        $heroisMarvel = array(
            "homem aranha" => 'imgs/homemaranha4_2.jpg',
            "homem de ferro" => 'imgs/ferro.jpg',
            "hulk" => 'imgs/hulk.jpeg',
            "doutor estranho" => 'imgs/estra.jpg',
            "homem formiga" => 'imgs/for.jpg'
        );

        $heroisDC = array(
            "batman" => 'imgs/batman.avif',
            "ciborgue" => 'imgs/ciborgue.jpg',
            "flash" => 'imgs/flash.jpeg',
            "superman" => 'imgs/superman.avif',
            "robin" => 'imgs/robin.webp'
        );

        if ($universo == "marvel") {
            $herois = $heroisMarvel;
        } elseif ($universo == "dc") {
            $herois = $heroisDC;
        } else {
            echo "Universo não encontrado.<br>";
            exit;
        }

        if (isset($herois[$heroi])) {
            $imagemHeroi = $herois[$heroi];
            for ($i = 0; $i < $quantidade; $i++) {
                echo "<img class='imgs' src='$imagemHeroi' alt='$heroi'><br>";
            }
        } else {
            echo "Herói '$heroi' não encontrado no universo '$universo'.<br>";
        }
    }
    ?>
</body>

</html>
