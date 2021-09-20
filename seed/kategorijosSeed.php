<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategoriju generavimas</title>
</head>
<body>
    <form action="" method="get">
        <button type="submit" name="submit">Sukurti kategorijas</button>
    </form>
    <?php 

    require_once("../connection.php");

    //function randomText($n) {
        //$text = "";


       // for($i = 0; $i < $n ; $i++) {
           // $randomNumber = rand();
           // $hashedText = md5($randomNumber);
           // $text .= $hashedText; // kai ciklas ivyksta dar pridedamas ir tekstas 
        //}
        
       // return str_replace("a", " ", $text); // PVZ- visos a raides keiciamos i tarpa

    // }

    

    // sugeneruojamas atsitiktinis tekstas i DB 
    if(isset($_GET["submit"])) {
        for ($i=0; $i<10; $i++) {

            $pavadinimas = "Kategorija".$i;
            $nuoroda = "nuoroda".$i;
            $aprasymas = "aprasymas".$i; 
            $tevinis_id = 0; 


            $sql = "INSERT INTO `kategorijos`(`pavadinimas`, `nuoroda`, `aprasymas`, `tevinis_id` ) 
            VALUES ('$pavadinimas','$nuoroda','$aprasymas', '$tevinis_id')";

            if(mysqli_query($conn, $sql)) {
                echo "Kategorija sukurta sėkmingai";
                echo "<br>";
            } else {
                echo "Kažkas įvyko negerai"; // tokiu atveju tikrinti uzklausa
                echo "<br>";
            }
        }
    }

?>
</body>
</html>