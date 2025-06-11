<?php
$pageTitle = "Stats";
include( "includes/header.php");
require_once("connect.php");

?>
<tr>
<table border='0' width='75%' cellspacing='3' cellpadding='3' align='center'>
<tr>
<td align='left' width='25%'><b>User</b></td>
<td align='center' width='30%'><b>Email</b></td>
<td align='center' width='25%'><b>totalTime</b></td>
<td align='right' width='25%'><b>Admin</b></td>
</tr>
<?php

$req = "SELECT ID, username, email, totalTime, admin FROM user";
$result = $connection->query($req);
    foreach( $result as $row ){
        ?>
            <tr>
            <td align='left'><?= $row['ID']?></td>
            <td align='left'><?= $row['username'] ?></td>
            <td align='center'><?= $row['email'] ?></td>
            <td align='center'><?= $row['totalTime'] ?></td>
            <td align='right'><?= $row['admin'] ?></td>
            <td align='right'><form method='POST' action='admin.php'><input type='submit' name='<?= $row['ID'] ?>' value='DELETE'></form></td> 
        </tr>;
<?php
    }
include('includes/footer.php');
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'];
       $q = "DELETE FROM user WHERE ID = $name";
       $spot = $connection->query($q);
       echo "<span> $row[ID]</span>";
    }

?>
