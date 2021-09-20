
<?php require_once("connection.php"); ?>

<?php

$url = $_GET["href"]; 

$sql = "SELECT * FROM kategorijos 
WHERE nuoroda='$url'";

$result = $conn->query($sql);

if($result->num_rows != 0) {
    $page = mysqli_fetch_array($result); 
    header("Location:404.php");  
}

?>



<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page["pavadinimas"]; ?></title>
    <?php require_once("includes.php"); ?>
</head>
<body>

    <div class="container">
        <?php require_once("design-parts/meniu.php"); ?>
        <?php require_once("design-parts/jumbotron.php"); ?>

        <?php showJumbotron($page["pavadinimas"], $page["aprasymas"]); ?>

        
        <?php echo $page["tevinis_id"]; ?>
     </div>
    
</body>
</html>