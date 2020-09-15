<?php  


$server = "specular.be.mysql";
$dbUser = "specular_bebeirecool";
    $pw = "beirecool";
    $db = "specular_bebeirecool";

      //export.php  
 if(isset($_POST["export"]))  
 {  
    $connect = mysqli_connect($server, $dbUser, $pw, $db);  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=reservaties.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id', 'Voornaam', 'Familienaam', 'Datum', 'Shift', 'Email', 'Telefoon', 'Volwassenen', 'Kinderen', 'Opmerking'));  
      $query ="SELECT * FROM `Reservation` ORDER BY id";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  