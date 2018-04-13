<?php
//Step1
 $db = mysqli_connect('localhost','root','','hotdesk')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>
 
<?php
$sql = "SELECT * FROM booking";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['521ID'] . ' ' . $row['FROM_DATE'] . ': ' . $row['TO_DATE'] . ' ' . $row['SEATNO'] .'<br />';
    }
} else {
    echo "0 results";
}
$db->close();
/**
//Step2
$query = "SELECT * FROM `booking` ";
mysqli_query($db, $query) or die('Error querying database.');
//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['521ID'] . ' ' . $row['FROM_DATE'] . ': ' . $row['TO_DATE'] . ' ' . $row['SEATNO'] .'<br />';
}
//Step 4
mysqli_close($db);
**/
?>

</body>
</html>