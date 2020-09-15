<?php


$firstName = $_POST['InputFirstName'];
$name = $_POST['InputName'];
$email = $_POST['InputEmail'];
$number = $_POST['InputNumber'];
$date = $_POST['InputDate'];
$amount = $_POST['InputAmount'];
$time = $_POST['InputTime'];

$server = "specular.be.mysql";
$user = "specular_bebeirecool";
$pw = "beirecool";
$db = "specular_bebeirecool";


$connect = mysqli_connect($server, $user, $pw, $db);

if(!$connect){
    echo "can't connect to the database";
}else{
        $sql = "INSERT INTO `Reservatie`(`voornaam`, `naam`, `datum`, `shift`, `email`, `telefoon`, `aantalPersonen`) VALUES ('$firstName','$name','$date','$time','$email','$number','$amount')";

    
    if (mysqli_query($connect, $sql)) {
        header("Location: succes.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
    mysqli_close($connect);
}

?>