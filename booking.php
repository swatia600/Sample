<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket Booking Widget Flat Responsive Widget Template :: w3layouts</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/util.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <div class="col-md-12">
        <header></header>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a class="text-success bg-success" href="finddesk.html">Back to preferences</a></li>
        <li><a class="text-success bg-success" href="history.html">Show History</a></li>
        <li><a class="text-success bg-success" href="Home.html">Logout </a></li>
    </ul>
    <form>
        <div class="form-group"></div>
    </form>
	<?php
	$from_date= $_POST["from_date"];
	$to_date= $_POST["to_date"];
	$floor = $_POST["floor"];
	$zone = $_POST["zone"];
	echo $from_date . ' ' . $to_date . ': ' . $floor . ' ' . $zone .'<br />';
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
$sql = "SELECT Seat_No FROM seat WHERE Floor_No = $floor AND Zone_No = $zone";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['Seat_No'] . '<br />';
    }
} else {
    echo "0 results";
}
$db->close();
/**
and FROM_DATE<=$from_date and TO_DATE >= $to_date 
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


         
    <div class="row register-form">
        <div class="col-md-7 col-md-offset-2">
            <form class="form-horizontal custom-form">
                <h1 class="text-center">Hot Desking Booking Widget</h1>
                <div class="form-group"></div>
                <div class="col-md-12">
                    <ul>
                        <li>Item 1</li>
                        <li>Item 2</li>
                        <li>Item 3</li>
                        <li>Item 4</li>
                    </ul>
                    <textarea class="form-control"></textarea>
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div><a class="btn btn-default submit-button" role="button" href="success.html">BOOK </a></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>