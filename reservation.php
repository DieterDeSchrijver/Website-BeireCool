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
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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

    $date = $_POST['date'];
    $time = $_POST['time'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['telephone'];
    $adults = $_POST['adults'];
    $childs = $_POST['childs'];
    $addMessage = $_POST['additional_message'];
    
	$server = "ID290120_beirecool.db.webhosting.be";
	$dbUser = "ID290120_beirecool";
		$pw = "beirecool123";
		$db = "ID290120_beirecool";




						$mail = $_POST['email'];
						//$to = "test@domain.com";/* YOUR EMAIL HERE */
						$subject = "Reservation from MAVIA";
						$headers = "From: Reservation from MAVIA <noreply@yourdomain.com>";
						$message = "DETAILS\n";
	
						$message .= "\nDatum: " . $_POST['check_in'];
						$message .= "\nTijdslot: " . $_POST['time'];
						$message .= "\nVolwassenen: " . $_POST['adults'];
						$message .= "\nKinderen: " . $_POST['childs'];
						$message .= "\nVoornaam: " . $_POST['firstname'];
						$message .= "\nFamilienaam: " . $_POST['lastname'];
						$message .= "\nEmail: " . $_POST['email'];
						$message .= "\nTelefoonnummer: " . $_POST['telephone'];
						$message .= "\nExtra opmerking: " . $_POST['additional_message'];
						$message .= "\nVoorwaarden aanvaard: " . $_POST['terms'];
												
						//Receive Variable
						//$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
						$user = "$email";
						$usersubject = "Bedankt";
						$userheaders = "Van: beirecool@gmail.be\n";
						/*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
						$usermessage = "Bedankt voor uw tijd. Uw reservatie is geplaatst\n\nHIERONDER EEN OVERZICHT\n\n$message"; 
						mail($user,$usersubject,$usermessage,$userheaders);
    
                        $connect = mysqli_connect($server, $dbUser, $pw, $db);

if(!$connect){
    echo "can't connect to the database";
}else{
        $sql = "INSERT INTO `Reservation`(`firstName`, `lastName`, `date`, `time`, `email`, `phone`, `adults`, `childs`, `message`) VALUES ('$firstName','$lastName','$date','$time','$email','$phone','$adults', '$childs', '$addMessage')";

    
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