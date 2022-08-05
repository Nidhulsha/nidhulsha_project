<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
$hostelname=$_POST['hostel'];
$wardenname=$_POST['wardenname'];
$wardenno=$_POST['wardenno'];
$roomneeds=$_POST['roomneeds'];

// $regno=$_POST['regno'];
// $fname=$_POST['fname'];
// $mname=$_POST['mname'];
// $lname=$_POST['lname'];
// $gender=$_POST['gender'];
// $contactno=$_POST['contact'];
// $emailid=$_POST['email'];
// $emcntno=$_POST['econtact'];
// $gurname=$_POST['gname'];
// $gurrelation=$_POST['grelation'];
// $gurcntno=$_POST['gcontact'];
// $caddress=$_POST['address'];
// $ccity=$_POST['city'];
// $cstate=$_POST['state'];
// $cpincode=$_POST['pincode'];
// $paddress=$_POST['paddress'];
// $pcity=$_POST['pcity'];
// $pstate=$_POST['pstate'];
// $ppincode=$_POST['ppincode'];
$query="insert into  registration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('iiiisisissssisississsisssi',$roomno,$seater,$feespm,$foodstatus,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$emcntno,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$cstate,$cpincode,$paddress,$pcity,$pstate,$ppincode);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Room Detail </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
							<?php
// $uid=$_SESSION['login'];
// 							 $stmt=$mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? || regno=? ");
// 				$stmt->bind_param('ss',$uid,$uid);
// 				$stmt->execute();
// 				$stmt -> bind_result($email);
// 				$rs=$stmt->fetch();
// 				$stmt->close();
// 				if($rs)
				// { 
					?>
			<!-- <h3 style="color: red" align="center">Hostel already booked by you</h3>
			<div align="center">
				<div class="col-md-4">&nbsp;</div>
			<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

												<div class="stat-panel-number h1 ">My Room</div>
													
												</div>
											</div>
											<a href="room-details.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div> -->
				<?php
				//  }
				// else{
								
							?>			

<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Hostel Name</label>
<div class="col-sm-8">
<select name="hostel" id="hostel" class="form-control">
<option value="">Select Hostel</option>
<option value="1">Marutham</option>
<option value="2">Ganga</option>
<option value="3">Yamuna</option>
<option value="4">Kambar</option>
<option value="5">Bharathi</option>
<option value="6">NRI</option>
<option value="7">Meghala</option>
</select>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" >Warden Name : </label>
<div class="col-sm-8">
<input type="text" name="wardenname" id="wardenname"  class="form-control" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label" >Warden Contact No : </label>
<div class="col-sm-8">
<input type="text" name="wardenno" id="wardenno"   class="form-control" >
</div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label" >Room needs :</label>
<div class="col-sm-8">
<input type="text" name="roomneeds" id="roomneeds"   class="form-control" >
</div>
</div>


	








<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
</form>
<?php
error_reporting(0);
$mysqli = mysqli_connect("localhost", "root", "", "hostel");
$hostelname = $_POST['hostel'];
$wardenname = $_POST['wardenname'];
$wardenno = $_POST['wardenno'];
$roomneeds = $_POST['roomneeds'];
if(isset($_POST['submit'])){
   
        // echo "string";
        $sql = "INSERT INTO roomdetails (hostelname, wardenname, wardenno, roomneeds)
         VALUES ('$hostelname', '$wardenname', '$wardenno', '$roomneeds')";
         
        $mysqli->query($sql);
        echo $mysqli->error;
    }/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    echo "failed";
    exit();
}
  ?>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script type="text/javascript">

$(document).ready(function() {
	$('#duration').keyup(function(){
		var fetch_dbid = $(this).val();
		$.ajax({
		type:'POST',
		url :"ins-amt.php?action=userid",
		data :{userinfo:fetch_dbid},
		success:function(data){
	    $('.result').val(data);
		}
		});
		

})});
</script>

</html>