<?php require_once("connection.php"); ?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>09-18 uzduotis</title>
    <?php require_once("includes.php"); ?>
</head>
<body>



    <div class="container">
        <?php require_once("design-parts/meniu.php"); ?>
        <?php require_once("design-parts/jumbotron.php"); ?>
        <?php showJumbotron("Bloga's", "Sveiki atvykę į puslapį"); ?>
        <?php require_once("design-parts/main.php"); ?>
    </div>
    
</body>
</html>




<?php
//1. Pasinaudojant paskaitos kodu, susikurti puslapių atvaizdavimo sistemą.+
//2. Naudojantis Bootstrap elementais: 
    //navbar, jumbotron, cards atvaizduoti puslapius(gali būti identiškai kaip paskaitoje)+
//3. Susikurti kategorijosSeed.php failą, kuris sugeneruoja 10 kategorijų.+
//4. Prie sistemos prijungti vartotojų prisijungimą.+

//Puslapius gali pasiekti tik prisijungę vartotojai.// nepadaryta
//Vartotojo tipai 2: skaitytojas, administratorius.// reikia sukurti DB

//5. Administratorius prie kiekvieno puslapio kortelės turi matyti mygtuką "Edit". +
    //Pvz: http://prntscr.com/1sogdxw // pridetas kitoks mygtukas
//6. Paspaudus mygtuką "Edit" administratoriui atsidaro puslapio redagavimo forma.// dar nepadaryta
//7. "Santrauka" bei "Turinys" turi būti redaguojamas su SummerNote papildiniu.
//8. Redagavimo formos neturi pasiekti neprisijungęs vartotojas bei skaitytojas.
?>


    
</body>
</html>