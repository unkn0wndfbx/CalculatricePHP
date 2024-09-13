<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Calculatrice</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="calculatrice">
        <h2>Calculatrice en ligne</h2>
        <form action="" method="post">
            <label for="nombre1">Nombre 1 :</label>
            <input id="nombre1" name="nombre1" required type="text"
                   value="<?= isset($_POST['nombre1']) ? $_POST['nombre1'] : 0 ?>">

            <label for="nombre2">Nombre 2 :</label>
            <input id="nombre2" name="nombre2" required type="text"
                   value="<?= isset($_POST['nombre2']) ? $_POST['nombre2'] : 0 ?>">

            <label for="resultat">Résultat :</label>
            <input id="resultat" name="resultat" readonly type="text" value="<?= isset($resultat) ? $resultat : 0 ?>">

            <div>
                <input name="operation" type="submit" value="Additionner">
                <input name="operation" type="submit" value="Soustraire">
                <input name="operation" type="submit" value="Multiplier">
                <input name="operation" type="submit" value="Diviser">
                <input name="operation" type="submit" value="Puissance">
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre1 = floatval($_POST['nombre1']);
            $nombre2 = floatval($_POST['nombre2']);
            $operation = $_POST['operation'];
            $resultat = '';

            switch ($operation) {
                case 'Additionner':
                    $resultat = $nombre1 + $nombre2;
                    break;
                case 'Soustraire':
                    $resultat = $nombre1 - $nombre2;
                    break;
                case 'Multiplier':
                    $resultat = $nombre1 * $nombre2;
                    break;
                case 'Diviser':
                    if ($nombre2 != 0) {
                        $resultat = $nombre1 / $nombre2;
                    } else {
                        $resultat = 'Erreur : Division par zéro';
                    }
                    break;
                case 'Puissance':
                    $resultat = pow($nombre1, $nombre2);
                    break;
                default:
                    $resultat = 'Opération non reconnue';
            }

            echo "<script>document.getElementById('resultat').value = '$resultat';</script>";
        }
        ?>
    </div>
</body>
</html>