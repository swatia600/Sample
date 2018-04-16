<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desk Booking - Novartis</title>
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
	<?php
		$from_date= $_POST["from_date"];
		$to_date= $_POST["to_date"];
		$floor = $_POST["floor"];
		$zone = $_POST["zone"];
		
		//echo $from_date . ' ' . $to_date . ': ' . $floor . ' ' . $zone .'<br />';
		$db = mysqli_connect('localhost','root','','hotdesk')
		or die('Error connecting to MySQL server.');
	?>
	<!--<h1>PHP connect to MySQL</h1>-->
 
	<?php
		if($floor == "@" AND $zone == "@")
		{
			$sql = "SELECT D_Id,Seat_No,FROM_DATE,TO_DATE FROM seat";
			$result = $db->query($sql);
		}
		else if($zone == "@" AND $floor != "@")
		{
			$sql = "SELECT D_Id,Seat_No,FROM_DATE,TO_DATE FROM seat WHERE Floor_No like $floor";
			$result = $db->query($sql);
		}
		else if($zone != "@" AND $floor == "@")
		{
			$sql = "SELECT D_Id,Seat_No,FROM_DATE,TO_DATE FROM seat WHERE Zone_No like $zone";
			$result = $db->query($sql);
		}
		else
		{
			$sql = "SELECT D_Id,Seat_No,FROM_DATE,TO_DATE FROM seat WHERE Floor_No like $floor AND Zone_No like '$zone'";
			$result = $db->query($sql);
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
		}
	?>


         
    <div class="row register-form">
        <div class="col-md-7 col-md-offset-2">
            <form class="form-horizontal custom-form">
                <h1 class="text-center">Hot Desking Booking Widget</h1>
                <div class="form-group"></div>
                <div class="col-md-12">
				<ul id="list">
				<?php
				if ($result->num_rows > 0) {
					$noOfSeatsAvailable = 0;
					while($row = $result->fetch_assoc()) {
						if($from_date == '')
						{
							$noOfSeatsAvailable = -1;
							echo "Please enter From Date field.";
						}
						else if($to_date == '')
						{
							if(strtotime($row['FROM_DATE']) <= strtotime($from_date) && strtotime($row['TO_DATE']) >= strtotime($from_date))
							{
								$noOfSeatsAvailable = $noOfSeatsAvailable + 1;
								$seatNo = $row['D_Id'];?>
								<li id ="<?php echo $seatNo?>"> <?php echo $seatNo . '<br />' ;?> </li>
								<?php 
							}
							else
							{
								$noOfSeatsAvailable = -1;
								echo "Seat can only be booked within the current week.";
							}
						}
						else if(strtotime($row['FROM_DATE']) <= strtotime($from_date) && strtotime($row['TO_DATE']) >= strtotime($to_date)) {
							$noOfSeatsAvailable = $noOfSeatsAvailable + 1;
							$seatNo = $row['D_Id'];?>
							<li id ="<?php echo $seatNo?>"> <?php echo $seatNo . '<br />' ;?> </li>
							<?php 
						}
					}
					if($noOfSeatsAvailable == 0) {
						echo "No Seat is available based on your preferences";
					}
                } 
				else {
					echo "No Seat is available based on your preferences";
                }
                $db->close();
                ?> 
                    </ul>                                                                                                                                                                                                                                                                         
                    <textarea class="form-control"></textarea>
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div><a class="btn btn-default submit-button" role="button" href="success.html">BOOK </a></form>
        </div>
    </div>
	
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type='text/javascript'>
		$(function(){
			  $('[id]').click(function(){
				   var id = $(this).attr('id');
				   if(id!="list") {
					   alert(id);
				   }
			  });
		});
	</script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>