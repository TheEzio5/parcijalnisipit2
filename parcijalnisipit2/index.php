<?php
include 'functions_counting.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcijalni ispit - Osnove PHP, R.Banjad</title>
</head>

<body>

    <div style="width: 50%; float: left" ;>

        <form action="" method="POST">
            <label for="word"> Upišite riječ: </label>
            </br>
            <input type="text" name="word">
            </br>
            </br>
            <input type="submit" value="Pošalji">

        </form>
    </div>

    <div style="width: 50%; float: right" ;>
        <table border="1" cellpading="10">
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj suglasnika</th>
                <th>Broj samoglasnika</th>
            </tr>
            <?php
                $wordsJson = file_get_contents(__DIR__ . '/imena.json');
                $letters = json_decode($wordsJson, true);
                //var_dump($letters);   // Provjera!
                
                if (empty($_POST)) {
                    echo "Upišite potrebnu riječ: ";
                } elseif (empty($_POST["word"])) {
                    echo "Polje ne smije biti prazno!!";

                } elseif (!empty($_POST["word"]) && ctype_alpha($_POST["word"])) //Provjerava ako ima nečega !empty! te ako su slova od a do z! i A do Z ali ne razmak i ČĆĐŽŠ!
                {
                    echo " Upišite potrebnu riječ: ";
                    $word = $_POST["word"];
                    $letters[] = $_POST["word"]; // [] Prazne uglate zagrade -> DODJELJUJE SE NA KRAJ NIZA!
                } else {
                    echo "Upišite riječ: ";
                }

                $wordsJson = json_encode($letters);
                file_put_contents(__DIR__ . '/imena.json', $wordsJson); //Prvi dio gdje da spremi drugi dio ŠTO DA SPREMI!!!
                
                foreach ($letters as $charachter) {
                    $charachterCount = strlen($charachter); //broj slova koje treba ispisat integer
                    $samoglasnikCount = zbrajanjeZnakova($charachter)[0];
                    $suglasnikCount = zbrajanjeZnakova($charachter)[1];

                    echo "<tr>";
                    echo "<td>" . $charachter . "</td>";
                    echo "<td>" . $charachterCount . "</td>";
                    echo "<td>" . $suglasnikCount . "</td>";
                    echo "<td>" . $samoglasnikCount . "</td>";

                    echo "</tr>";
                }
                ?>
        </table>
    </div>


</body>

</html>