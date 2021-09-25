<?php require_once("connections.php"); ?>

<?php 

$sql = "SELECT reiksme FROM nustatymai WHERE ID = 1 "; // 1 irasas
$result = $conn->query($sql);
$selected_value = mysqli_fetch_array($result);

// 0 reiks kad sidebar neatvaizduojamas
        // 1 reiks kad sidebar yra kaireje puseje
        // 2 reiks kad sidebar yra desineje puseje

?>

<div class="row">


    <?php if ($selected_value[0] == 1) {
        require("sidebar.php");
    } ?>
    
    <?php if($selected_value[0] == 0) { ?>
        <div class="col-lg-12">
    <?php } else {?>
        <div class="col-lg-9">
    <?php } ?>
        <div class="row">
        <?php 

            if(isset($_GET["catID"]) && !empty($_GET["catID"])) { //egzistuoja
                $catID = $_GET["catID"];
                
                $sql = "SELECT puslapiai.pavadinimas, 
                puslapiai.nuoroda, 
                puslapiai.santrauka, 
                kategorijos.pavadinimas AS kategorijos_pavadinimas,
                kategorijos.ID
                FROM puslapiai 
                LEFT JOIN kategorijos
                ON puslapiai.kategorijos_id = kategorijos.ID
                WHERE puslapiai.kategorijos_id = $catID
                ORDER BY puslapiai.ID DESC";    
            } else {
                $sql = "SELECT puslapiai.pavadinimas, 
                puslapiai.nuoroda, 
                puslapiai.santrauka, 
                kategorijos.pavadinimas AS kategorijos_pavadinimas,
                kategorijos.ID
                FROM puslapiai 
                LEFT JOIN kategorijos
                ON puslapiai.kategorijos_id = kategorijos.ID
                ORDER BY puslapiai.ID DESC";
            }

            $result = $conn->query($sql);

            while($pages = mysqli_fetch_array($result)) {
            ?>
            <div class="card col-lg-4 card card border-info" style="width: 18rem;">
                <img class="card-img-top" src="https://images.unsplash.com/photo-1631992254357-b8eb0c017067?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=783&q=80" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pages["pavadinimas"]; ?></h5>
                    <p class="card-text"><?php echo $pages["santrauka"]; ?></p>
                    <p class="catd-text"><a  href="index.php?catID=<?php echo $pages["ID"] ?>" ><?php echo $pages["pavadinimas"]; ?></a>  </p>
                    <div class="card-footer bg-transparent border-success"></div>
                    <a href="puslapiai.php?href=<?php echo $pages["nuoroda"]; ?>" class="btn btn-primary">Į puslapį</a>
                    <a href="redagavimas.php?href=<?php echo $pages["nuoroda"]; ?>" class="btn btn-success">Redaguoti</a>
                </div>
            </div>

            <?php } ?>    
        </div>
    </div>
</div>



