<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Create connection
    $connexion = new mysqli($servername, $username, $password, "exercice");
    if ($connexion->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $requete = "UPDATE test SET compteur = compteur+1";
    $connexion->query($requete);
    
    $requete = "SELECT compteur FROM test";
    $reponse = $connexion->query($requete);
    $variable = mysqli_fetch_array($reponse);

    echo $variable['compteur'];
?>