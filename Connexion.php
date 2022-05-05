<?php


/*

$mysqli = new mysqli("192.168.225.1", "wpuser", "azertyuiop", "CastorServiceDB");

password_verify($password,$followingdata["Mdp_modo"])

*/
$mysqli = new mysqli("192.168.0.0", "user", "pswd", "dbname");
if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $response=array();
    $email= $_POST['mail'];
    $password= $_POST['mdp'];
    $test=null;
    $cek = "SELECT * FROM Moderateur WHERE Email_modo='$email' and Active_modo=1"; 

    if ($result = $mysqli->query($cek)) {
        $followingdata = $result->fetch_assoc();
        if(password_verify($password,$followingdata["Mdp_modo"])){
           
            //if (password_verify($password,$result)){
                $test=$result->num_rows;
                /* Libération du jeu de résultats */
                $result->close();
        }      
        //}
       
    }
    if ($test==null) {
        echo "0";}else {echo "1";}
    }
    ?>