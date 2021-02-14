<?php
    // Connexion à la bdd
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $connexion = new mysqli($servername, $username, $password, "exercice");
    if ($connexion->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requete mise a jour de la variable dans la bdd
    $requete = "UPDATE test SET compteur = compteur+1";
    $connexion->query($requete);
    
    // Requete pour obtenir la nouvelle valeur
    $requete = "SELECT compteur FROM test";
    $reponse = $connexion->query($requete);
    $variable = mysqli_fetch_array($reponse);

    // Return data
    echo $variable['compteur'];
?>