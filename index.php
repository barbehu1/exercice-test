<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Useless Box</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        // Create connection
        $connexion = new mysqli($servername, $username, $password, "exercice");
        if ($connexion->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connexion réussie";
    
        $requete = "SELECT compteur FROM test";
        $reponse = $connexion->query($requete);
        $variable = mysqli_fetch_array($reponse);
    ?>
    <div class="container-fluid">
        <div class="row align-items-center h-100">
            <div class="col-sm">
                <span>.</span><br>
                <button id="bouton">Off</button>
                <p id="compteur">Compteur : <?= $variable['compteur'] ?></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        // S'execute quand le document est prêt et que jQuery est chargé
        $(document).ready(function(){
            $("#bouton").click(function(){
                $(this).html("On");
                $("span").animate({
                    top: "6vh"
                }, 300, "linear", function() {});
                $("span").animate({
                    top: "-5vh"
                }, 500, "linear", function() {});
                setTimeout(function(){
                    $("#bouton").html("Off");
                }, 300);

                $.ajax({
                    type: "GET",
                    url: "incrementation.php",
                    success:function(data){
                        $("#compteur").html("Compteur : " + data);
                    }
                });
            });
        });
    </script>
</body>
</html>