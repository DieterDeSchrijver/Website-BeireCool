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
      header('Content-Disposition: attachment; filename=bestellingen.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('id', 'Voornaam', 'Familienaam', 'Methode', 'Leverdatum', 'Afhaaldatum', 'Email', 'Telefoon', 'Opmerking', 'Kinder Spaghetti', 'Kinder vol-au-vent rijst', 'Kinder vol-au-vent puree', 'Spaghetti', 'Spaghetti veggie', 'Vol-au-vent rijst', 'Vol-au-vent puree', 'Chocomousse', 'Rijstpap', 'Confituurtaartje' ,'Rode wijn', 'Witte wijn', 'Snoepzak', 'Kinder Surprise'));  
      $query ="SELECT * FROM `BcOrder` ORDER BY id";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  