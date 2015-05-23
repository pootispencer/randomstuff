<?php
$dbconn = mysqli_connect("localhost", "jason", "PBRru135", "Griffin") or die("ERROR");
$CustomerName = $_POST['CustomerName'];

$query = "SELECT CustomerName, AccountMgrName, AccountMgrPhone FROM Customers, AccountManagers WHERE CustomerName LIKE '%$CustomerName%' AND Customers.AccountMgrID=AccountManagers.AccountMgrID;";
$result = mysqli_query($dbconn, $query);
$numrows = $result->num_rows;



print "<TABLE BORDER=2><TR height=35px><TD>Customer</TD><TD>CSR Name</TD><TD>CSR Cell Number</TD></TR>";


$i=0;
while ($i < $numrows)
{
 $out = mysqli_fetch_array($result);
 print "<TR>";
 print "<TD>&nbsp;&nbsp".$out['CustomerName']."&nbsp&nbsp</TD><TD>&nbsp&nbsp".$out['AccountMgrName']."&nbsp&nbsp</TD><TD>&nbsp&nbsp".$out['AccountMgrPhone']."&nbsp&nbsp</TD>";
 print "</TR>";
 $i = $i +1;
}

print "</TABLE>";
print "<BR><BR><BR><BR><A HREF=csrlookup.html>Back</A>";
?>
