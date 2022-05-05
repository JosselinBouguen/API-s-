<?php
/*define('HOST', '192.168.225.1');
define('USER', 'wpuser');
define('PASS', 'azertyuiop');
define('DB', 'castorservicedb');
$con = mysqli_connect(HOST, USER, PASS, DB) or die ("Not Connected");

*/
$mysqli = new mysqli("192.168.0.0", "user", "pswd", "dbname");
if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}


    $resultFinal= array();
    $resultt= array();
    $cek = "SELECT COUNT(ID_SERV) as NbServAjd from Services where DATE_FORMAT(DATE_DEPOT_SERV, '%e')=DATE_FORMAT(NOW(), '%e')"; 
    $result = $mysqli->query($cek);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $NbServAjd=$row['NbServAjd'];     
        }
    }
    $cek = "SELECT COUNT(ID_SERV) as NbFormAjd from Services where DATE_FORMAT(DATE_DEPOT_SERV, '%e')=DATE_FORMAT(NOW(), '%e') AND (ID_THEM=9)";   
    $result = $mysqli->query($cek);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $NbFormAjd = $row['NbFormAjd'];
        }
    }
    $cek = "SELECT COUNT(ID_SERV) as NbCourAjd from Services where DATE_FORMAT(DATE_DEPOT_SERV, '%e')=DATE_FORMAT(NOW(), '%e') AND (ID_THEM=3)";   
    $result = $mysqli->query($cek);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $NbCourAjd= $row['NbCourAjd'];
        }
    }

    
    $json = array(
        'NbServAjd' => $NbServAjd,

        'NbFormAjd' => $NbFormAjd,
        'NbCourAjd' => $NbCourAjd,
    );
    $json1 = array(
        'NbServAjd' => $NbServAjd
    );

    echo json_encode($json);

    
    ?>