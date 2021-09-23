<?php require_once("connections.php"); ?>



<div class="row">
    <div class="col-lg-3 sidebar">
        <h3>KATEGORIJOS</h3>
    <?php 
        $sql = "SELECT * FROM kategorijos
        ORDER BY pavadinimas ASC
        ";

        $result = $conn->query($sql);

        echo "<ul>";

        while($category = mysqli_fetch_array($result)) {
           //kiek kategorija turi irasu?
           // atlikti uzklausa i puslapiai duomenu bazes lenteleje
           
           //kategorijos ID. $catID - jis ateina is nuorodos
           
           $categoryID = $category["ID"];
           
           $sql1 = "SELECT COUNT(ID) 
           AS viso_irasu 
           FROM `puslapiai` 
           WHERE kategorijos_id = $categoryID "; //10

           $result1 = $conn->query($sql1);
           
           $totalPages = mysqli_fetch_array($result1); //masyva su skaiciumi kiek yra is viso puslapiu

        //    var_dump($totalPages);

        //    echo $totalPages[0];
        //    echo "<br>";
        //    echo $totalPages["viso_irasu"];
           //KIek irasu grazina sita uzklausa?  $sql1. 1


           echo "<li>";

                echo "<a href='index.php?catID=".$categoryID."'>";
                    echo $category["pavadinimas"]." (".$totalPages["viso_irasu"].")" ;
                echo "</a>";
           echo "</li>";
        }

        echo "</ul>"
    ?>

    </div>
    <div class="col-lg-9">
        <div class="row">
        <?php 

            if(isset($_GET["catID"]) && !empty($_GET["catID"])) { //egzistuoja
                $catID = $_GET["catID"];
                
                $sql = "SELECT * FROM puslapiai
                WHERE kategorijos_id = $catID
                ORDER BY puslapiai.ID DESC
                ";
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
                    <a href="edit.php?href=<?php echo $pages["nuoroda"]; ?>" class="btn btn-success">Redaguoti</a>
                </div>
            </div>

            <?php } ?>    
        </div>
    </div>
</div>



