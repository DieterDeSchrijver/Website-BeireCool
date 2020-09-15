<?php  

$server = "ID290120_beirecool.db.webhosting.be";
$dbUser = "ID290120_beirecool";
    $pw = "beirecool123";
    $db = "ID290120_beirecool";

 $connect = mysqli_connect($server, $dbUser, $pw, $db);  
 $queryReservations ="SELECT * FROM `Reservation` ORDER BY id";  
 $resultReservations = mysqli_query($connect, $queryReservations); 

 $queryOrders ="SELECT * FROM `BcOrder` ORDER BY id";  
 $resultOrders = mysqli_query($connect, $queryOrders); 
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Beire Cool Overzicht</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <br /><br />
    <div class="container" style="width:95%;">
        <h2 align="center">Beire Cool Overzicht</h2>
        <h3 align="center">Reservaties</h3>
        <br />
        <form method="post" action="export.php" align="center">
            <input type="submit" name="export" value="Download Excel" class="btn btn-success" />
        </form>
        <br />
        <div class="table-responsive" id="employee_table" style="overflow: visible;">
            <table class="table table-bordered">
                <tr>
                    <th width="5%">ID</th>
                    <th width="5%">Voornaam</th>
                    <th width="5%">Familienaam</th>
                    <th width="5%">Datum</th>
                    <th width="5%">Shift</th>
                    <th width="5%">Email</th>
                    <th width="5%">Telefoon</th>
                    <th width="5%">Volwassenen</th>
                    <th width="5%">Kinderen</th>
                    <th width="5%">Opmerking</th>
                </tr>
                <?php  
                     while($row = mysqli_fetch_array($resultReservations))  
                     {  
                     ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["firstName"]; ?></td>
                    <td><?php echo $row["lastName"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["adults"]; ?></td>
                    <td><?php echo $row["childs"]; ?></td>
                    <td><?php echo $row["message"]; ?></td>
                </tr>
                <?php       
                     }  
                     ?>
            </table>
        </div>

        <h3 align="center">Bestellingen</h3>
        <br />
        <form method="post" action="export_order.php" align="center">
            <input type="submit" name="export" value="Download Excel" class="btn btn-success" />
        </form>
        <br />
        <div class="table-responsive" id="employee_table" style="overflow: scroll;">
            <table class="table table-bordered">
                <tr>
                    <th width="5%">ID</th>
                    <th width="5%">Voornaam</th>
                    <th width="5%">Familienaam</th>
                    <th width="5%">Methode</th>
                    <th width="5%">Leverdatum</th>
                    <th width="5%">Afhaaldatum</th>
                    <th width="5%">Email</th>
                    <th width="5%">Telefoon</th>
                    <th width="5%">Opmerking</th>
                    <th width="5%">Kinder Spaghetti</th>
                    <th width="5%">Kinder vol-au-vent rijst</th>
                    <th width="5%">Kinder vol-au-vent puree</th>
                    <th width="5%">Spaghetti</th>
                    <th width="5%">Spaghetti veggie</th>
                    <th width="5%">Vol-au-vent rijst</th>
                    <th width="5%">Vol-au-vent puree</th>
                    <th width="5%">Chocomousse</th>
                    <th width="5%">Rijstpap</th>
                    <th width="5%">Confituurtaartje</th>
                    <th width="5%">Rode wijn</th>
                    <th width="5%">Witte wijn</th>
                    <th width="5%">Snoepzak</th>
                    <th width="5%">Kinder Surprise</th>
                </tr>
                <?php  
                     while($row = mysqli_fetch_array($resultOrders))  
                     {  
                     ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["firstName"]; ?></td>
                    <td><?php echo $row["lastName"]; ?></td>
                    <td><?php echo $row["method"]; ?></td>
                    <td><?php echo $row["deliveryDate"]; ?></td>
                    <td><?php echo $row["pickupDate"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["message"]; ?></td>
                    <td><?php echo $row["spaghetti_kind"]; ?></td>
                    <td><?php echo $row["vol-au-vent_met_rijst_kind"]; ?></td>
                    <td><?php echo $row["vol-au-vent_met_puree_kind"]; ?></td>
                    <td><?php echo $row["spaghetti"]; ?></td>
                    <td><?php echo $row["spaghetti_veg"]; ?></td>
                    <td><?php echo $row["vol-au-vent_met_rijst"]; ?></td>
                    <td><?php echo $row["vol-au-vent_met_puree"]; ?></td>
                    <td><?php echo $row["chocomousse"]; ?></td>
                    <td><?php echo $row["rijstpap"]; ?></td>
                    <td><?php echo $row["confituurtaartje"]; ?></td>
                    <td><?php echo $row["wijn_rood_merlot"]; ?></td>
                    <td><?php echo $row["wijn_wit_chardonnay"]; ?></td>
                    <td><?php echo $row["snoepzak"]; ?></td>
                    <td><?php echo $row["kinder_surprise_box"]; ?></td>
                </tr>
                <?php       
                     }  
                     ?>
            </table>
        </div>
    </div>
</body>

</html>