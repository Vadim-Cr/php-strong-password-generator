<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>php_Strong_Password_Generator</title>

    <!-- <?php include "functions.php"; ?> -->

    <style>
        .myBckground{
            /* background-color: #011633;  */
            background-color: #8AB754; 
        }
        .primary_text_color{
            color: #7D8B9B;
        }
        .secondary_text_color{
            color: #ffff;
        }
        #valid{
            background-color: #CFF4FC;
        }

    </style>
</head>
<body class="myBckground container">
    <h1 class="text-center primary_text_color">Strong Password Generator</h1>
    <h2 class="text-center secondary_text_color">Genera Una Password Sicura</h2>
    <div id="valid" class="p-5 mb-4">
        <p>Nessun Parametro Valido Inserito</p>
    </div>

    <div class="bg-light p-3">
        <form>
            <div class="container-top d-flex justify-content-between">
                <p>Lunghezza password:</p>
                <input type="number" name="lunghezza_password" placeholder="lunghezza password">
            </div>

            <div class="container-middle d-flex justify-content-between">
                <p>Consenti Ripetizioni di uno o più caratteri</p>
                <div>
                    <div id="one" class="mb-2 flex-column">
                        <input type="radio" id="yes" name="repeat" value="Sì">
                        <label for="yes">Sì</label>
                        <input type="radio" id="no" name="repeat" value="No">
                        <label for="no">No</label>
                    </div>
                    <div id="two" class="flex-column">
                        <input type="checkbox" id="letters" name="option1" value="Lettere">
                        <label for="letters">Lettere</label>
                        <input type="checkbox" id="numbers" name="option2" value="Numeri">
                        <label for="numbers">Numeri</label>
                        <input type="checkbox" id="symbols" name="option3" value="Simboli">
                        <label for="symbols">Simboli</label>
                    </div>  
                </div>
            </div>
            <input type="submit" value="Invia">
            <input type="reset" value="Annulla">

        </form>

        
    </div>

    <?php
// echo "la password sarà lunga " . $_GET["lunghezza_password"] . " parole<br>";

session_start();


$n=$_GET["lunghezza_password"];
function getPassword($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!£$%&*/';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        if ($_GET["option1"]) { 
            $characters .='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        } elseif ($_GET["option2"]) {
            $characters .='0123456789';
        }  elseif ($_GET["option3"]) {
            $characters .='!£$%&*/';
        }   elseif ($_GET["option1"] && $_GET["option2"] && $_GET["option3"]) {
            $characters;
        } else {
            $characters ='';
        }
        $index = rand(0, strlen($characters)-1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}
 
// echo getPassword($n);
    ?>
<div class="h1 bg-success text-light p-3 d-flex flex-wrap">
            LA TUA PASSWORD E':  <?php echo getPassword($n)?>;
        </div>
</body>
</html>
