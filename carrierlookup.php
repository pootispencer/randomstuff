<?php
$CarrierName = $_POST['CarrierName'];
$dbconn = mysqli_connect('localhost', 'jason', 'PBRru135', 'Griffin') or die("ERROR!!!");
$numrows = mysqli_fetch_array(mysqli_query($dbconn, "SELECT COUNT(CarrierID) FROM Carriers"));
$rows = $numrows[0];


$query = "SELECT CarrierName, ContactName, ContactPhone FROM Carriers WHERE CarrierName LIKE '%$CarrierName%';";
$result = mysqli_query($dbconn, $query);


print "<TABLE border=3 cellpadding=10><TR height=35px><TD>Carrier Name</TD><TD>Contact Name</TD><TD>Contact Phone</TD></TR>";

$i = 0;
while ($i < $rows)
{
$output = mysqli_fetch_array($result);
print "<TR>";
print "<TD>".$output['CarrierName']."</TD><TD>".$output['ContactName']."</TD><TD>".$output['ContactPhone']."</TD>";
print "</TR>";
$i = $i + 1;
}


print "</TABLE>";
print "<BR><BR><BR><BR><BR>";
print "<A HREF=index.html>Go Back</A>";
?>

