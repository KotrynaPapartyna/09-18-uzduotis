<?php 
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas</title>

    <?php require_once("includes.php"); ?>

    <style>
        h1 {
            text-align: center;
        }

        .container {
            position:absolute;
            top:50%;
            left:50%;
            transform: translateY(-50%) translateX(-50%);
        }
    </style>
</head>
<body>
    <?php
    
        if(isset($_POST["submit"])) {
            if(isset($_POST["slapyvardis"]) && isset($_POST["slaptazodis"]) 
            && !empty($_POST["slapyvardis"]) && !empty($_POST["slaptazodis"])) {
                $username = $_POST["slapyvardis"];
                $password = $_POST["slaptazodis"];

                $sql = "SELECT * FROM `uzsiregistrave vartotojai` 
                    WHERE slapyvardis='$username' AND slaptazodis='$password'"; 

                $result = $conn->query($sql);
                
                if($result->num_rows == 1) {

                    $user_info = mysqli_fetch_array($result);
                    
                    $cookie_array = array(
                        $user_info["ID"],
                        $user_info["slapyvardis"],
                        $user_info["slaptazodis"],
                        $user_info["teises_id"]
                    );

                    $cookie_array = implode("|", $cookie_array);
                    setcookie("prisijungta", $cookie_array, time() + 3600, "/");

                    header("Location: puslapiai.php");
                } else {
                    $message = "Neteisingi prisijungimo duomenys";
                }
                
            } else {
                $message = "Laukeliai yra tušti arba duomenys yra neteisingi";
            }
        }    

    ?>

    <?php if(!isset($_COOKIE["prisijungta"])) { ?>
    <div class="container">
        <h1>Prisijungimas</h1>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Slapyvardis</label>
                <input class="form-control" type="text" name="username" />
            </div>
            <div class="form-group">
                <label for="password">Slaptažodis</label>
                <input class="form-control" type="password" name="password" />
            </div>
            
            <button class="btn btn-primary" type="submit" name="submit">Prisijungti</button>
        </form>

        <?php if(isset($message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php } ?>
    </div>
    <?php } else {
        header("Location: puslapiai.php");
    } ?>

</body>
</html>