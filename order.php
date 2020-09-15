<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="MAVIA - Register, Reservation, Questionare, Reviews form wizard">
	<meta name="author" content="Ansonika">
	<title>MAVIA | Register, Reservation, Questionare, Reviews form wizard</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "https://www.beirecool.be"
    }
    </script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 8000)" style="background-color:#fff;">
<?php

	$option = $_POST['option'];
	$dateAfhalen = $_POST['dateAfhalen'];
	$dateLeveren = $_POST['dateLeveren'];
    $spaghetti_kind = $_POST['spaghetti_kind'];
    $vol_au_vent_met_rijst_kind = $_POST['vol_au_vent_met_rijst_kind'];
    $vol_au_vent_met_puree_kind = $_POST['vol_au_vent_met_puree_kind'];
    $spaghetti = $_POST['spaghetti'];
    $spaghetti_veg = $POST['spaghetti_veg'];
    $vol_au_vent_met_rijst = $_POST['vol_au_vent_met_rijst'];
    $vol_au_vent_met_puree = $_POST['vol_au_vent_met_puree'];
    $chocomousse = $_POST['chocomousse'];
    $rijstpap = $_POST['rijstpap'];
    $confituurtaartje = $_POST['confituurtaartje'];
    $wijn_rood_merlot = $_POST['wijn_rood_merlot'];
    $wijn_wit_chardonnay = $_POST['wijn_wit_chardonnay'];
    $snoepzak = $_POST['snoepzak'];
    $kinder_surprise_box = $_POST['kinder_surprise_box'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $addMessage = $_POST['additional_message'];
    echo $spaghetti_veg;
    $server = "specular.be.mysql";
    $dbUser = "specular_bebeirecool";
    $pw = "beirecool";
    $db = "specular_bebeirecool";
	
    
	$connect = mysqli_connect($server, $dbUser, $pw, $db);

if(!$connect){
    echo "can't connect to the database";
}else{
        $sql = "INSERT INTO `BcOrder`(`firstName`, `lastName`, `method`, `deliveryDate`, `pickupDate`, `email`, `phone`, `message`, `spaghetti_kind`, `vol-au-vent_met_rijst_kind`, `vol-au-vent_met_puree_kind`, `spaghetti`, `spaghetti_veg`, `vol-au-vent_met_rijst`, `vol-au-vent_met_puree`, `chocomousse`, `rijstpap`, `confituurtaartje`, `wijn_rood_merlot`, `wijn_wit_chardonnay`, `snoepzak`, `kinder_surprise_box`) VALUES ('$firstName','$lastName','$option','$dateLeveren','$dateAfhalen','$email','$phone','$addMessage','$spaghetti_kind','$vol_au_vent_met_rijst_kind','$vol_au_vent_met_puree_kind','$spaghetti', '$spaghetti_veg', '$vol_au_vent_met_rijst','$vol_au_vent_met_puree','$chocomousse','$rijstpap', '$confituurtaartje','$wijn_rood_merlot','$wijn_wit_chardonnay','$snoepzak','$kinder_surprise_box')";

    
    if (mysqli_query($connect, $sql)) {
        header("Location: succes.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
    mysqli_close($connect);
}

?>
<!-- END SEND MAIL SCRIPT -->   

<div id="success">
    <div class="icon icon--order-success svg">
              <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                  <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                  <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
              </svg>
     </div>
<h4><span>Request successfully sent!</span>Thank you for your time</h4>
<small>You will be redirect back in 5 seconds.</small>
</div>
</body>
</html>