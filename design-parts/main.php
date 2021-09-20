<?php require_once("connection.php"); ?>


<div class="row">
    <div class="col-lg-3">
        <h3>Šoninė juosta(Sidebar)</h3>
    </div>
    <div class="col-lg-9">
        <div class="row">
        <?php 

            $sql = "SELECT * FROM kategorijos
            ORDER BY kategorijos.ID ASC
            ";

            $result = $conn->query($sql);

            while($pages = mysqli_fetch_array($result)) {
            ?>
            <div class="card col-lg-4" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pages["pavadinimas"]; ?></h5>
                    
                    <a href="puslapiai.php?href=<?php echo $pages["aprasymas"]; ?>"class="btn btn-primary">Eiti į puslapį</a>
                </div>
            </div>

            <?php } ?>    
        </div>
    </div>
</div>