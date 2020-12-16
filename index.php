<?php
require("./config.php");

if (isset($_POST['submit'])) {
	$nic = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['phone'];
	$nick = $_POST['nick'];
	$msg = $_POST['msg'];

	$query = "SELECT * From invitees WHERE NIC='$nic'";
	$runQ = mysqli_query($con, $query);

	if (mysqli_num_rows($runQ) > 0) {
		$sql = "UPDATE invitees SET Name='$name',Contact='$contact',Nick='$nick',Msg='$msg' WHERE NIC='$nic'";
		$result = mysqli_query($con, $sql);
		if ($result) {
			header("Location: index.php?done=1");
			exit;
		}
	} else {
		$sql =  "INSERT INTO invitees (NIC, Name, Contact, Nick, Msg) 
				VALUES ('$nic', '$name', '$contact', '$nick', '$msg')";
		$result=mysqli_query($con, $sql);
		if ($result) {
			header("Location: index.php?done=1");
			exit;
		}
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Yahampath & Hasini</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./index.css?v=e0sddcd355<?php echo date('s'); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
	<div class="container text-center">
		<div class="p-0 wrapCenter row justify-content-center align-content-center">
			<div class="img-box">
				<img id="myImg" src="./invitation.jpg" class="img-fluid iiiii" alt="Yahampath & Hasini">
			</div>
			<div id="mymodalIMG" class="modalIMG p-0">
				<img class="modalIMG-content " id="img01">
			</div>
			<?php
				if(isset($_GET['done'])) {
					echo "<div class='modal modalthanks fade show' style='display: block;' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='false'>
							<div class='modal-dialog modal-dialog-centered' role='document'>
								<div class='modal-content'>
									<div class='modal-body'>
										<h5>Thank You!</h5>
									</div>
								</div>
							</div>
						</div>
						<script>
							setTimeout(function() {
								document.getElementById('exampleModalCenter').style.display = 'none';
							}, 3000);
						</script>
						";
				}
			?>
			<div class="showonmobile mt-4">
				<div class="location botLinks col-6">
					<a class="row text-center" target="_blank" href="https://g.page/Sigiriana?share"><i class="m-auto fas fa-map-marker-alt"></i>
						<p>Find the Navigation</p>
					</a>
				</div>
				<div class="calender botLinks col-6">
					<a class="row text-center" target="_blank" href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=M3M4aHIybDAyMDk2NTNuNmJqMXBsM2lldGEgMGp0cGc1M2J0OXAwanZldW9pZmFrZDFmYWtAZw&amp;tmsrc=0jtpg53bt9p0jveuoifakd1fak%40group.calendar.google.com">
						<i class="m-auto fas fa-calendar-plus"></i><p class="p-0 m-auto justify-content-right">Add to Calender</p>
					</a>
				</div>
			</div>
			<div class="bottomLinks mt-3 row justify-content-center align-content-center bbb">
				<div class="hideonmobile location botLinks col-3">
					<a class="row" target="_blank" href="https://g.page/Sigiriana?share"><i class="m-auto col-3 fas fa-map-marker-alt"></i>
						<p class="col-9 p-0 m-auto justify-content-left">Find the Navigation</p>
					</a>
				</div>
				<div class="col-6 m-0 p-0 button-wrap-issue">
					<button id="btnmodal" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">
						<bold>Let Us Know Your Presence</bold>
					</button>
				</div>
				<div class="hideonmobile calender botLinks col-3">
					<a target="_blank" class="row" href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=M3M4aHIybDAyMDk2NTNuNmJqMXBsM2lldGEgMGp0cGc1M2J0OXAwanZldW9pZmFrZDFmYWtAZw&amp;tmsrc=0jtpg53bt9p0jveuoifakd1fak%40group.calendar.google.com">
						<p class="col-9 p-0 m-auto justify-content-right">Add to Calender</p><i class="col-3 m-auto fas fa-calendar-plus"></i>
					</a>
				</div>
			</div>

			<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Let Us Know Your Presence</h5>
								<div style="top:0" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</div>
							</div>
							<div class="modal-body">
								<p>Due to the COVID-19 pandemic, we appreciate it if you can provide the following details.</p>
								<form action="index.php" method="POST">
									<div class="form-group">
										<label for="name" class="col-form-label">Name:
											<input name="name" type="text" class="mt-1 form-control text-center" id="name" required></label>
									</div>
									<div class="form-group">
										<label for="id" class="col-form-label">NIC:
											<input name="id" type="text" class="mt-1 form-control text-center" id="id" required></label>
									</div>
									<div class="form-group">
										<label for="pnone" class="col-form-label">Contact Number:
											<input name="phone" type="text" class="mt-1 form-control text-center" id="phone" required></label>
									</div>
									<div class="form-group">
										<label for="nick" class="col-form-label">Nick name (Optional):
											<input name="nick" type="text" class="mt-1 form-control text-center" id="nick"></label>
									</div>
									<div class="form-group">
										<label for="msg" class="col-form-label">Message (Optional):
											<textarea name="msg" class="mt-1 form-control text-center" rows="2" cols="50" id="msg"></textarea></label>
									</div>
									<div class="justify-content-center modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" name="submit" class="btn-footer btn btn-primary">Send</button>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		// Get the modalIMG
		var modalIMG = document.getElementById('mymodalIMG');

		// Get the image and insert it inside the modalIMG - use its "alt" text as a caption
		var img = document.getElementById('myImg');
		var modalIMGImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
		img.onclick = function() {
			modalIMG.style.display = "block";
			modalIMGImg.src = this.src;
			modalIMGImg.alt = this.alt;
		}


		// When the user clicks on <span> (x), close the modalIMG
		modalIMG.onclick = function() {
			img01.className += " out";
			setTimeout(function() {
				modalIMG.style.display = "none";
				img01.className = "modalIMG-content";
			}, 400);

		}
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>