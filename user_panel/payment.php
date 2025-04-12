<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<form method="POST" id="myform" class="aa-login-form">
			<div class="aa-myaccount-area">
				<div class="row">
					<div class="col-md-8">
						<div class="aa-myaccount-login">
							<br />
							<input type="radio" id="pcash" value="Cash" name="paymentoption" />
							<b>Cash</b>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" id="pupi" value="UPI" name="paymentoption" /> <b>UPI</b>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" id="pcard" value="Card" name="paymentoption" />
							<b>CreditCart /
								Debitcart</b>
							<div class="icon-container" style="margin-left: 190px;">
								<i class="fa fa-cc-visa" style="color:navy;"></i>
								<i class="fa fa-cc-amex" style="color:blue;"></i>
								<i class="fa fa-cc-mastercard" style="color:red;"></i>
								<i class="fa fa-cc-discover" style="color:orange;"></i>
							</div>


							<div id="upiimg">
								<img src="https://storage.googleapis.com/dara-c1b52.appspot.com/daras_ai/media/a3202e58-17ef-11ee-9a70-8e93953183bb/cleaned_qr.png"
									style="width:100px;height:100px;">

								<p><b>Either Scan Image or Enter UPI No</b></p>
							</div>
							<div class="form-group" id="upitxt">
								<input type="radio" name="upi_method" value="GPay" onchange="return enter_upi_id()">
								<img src="https://t3.ftcdn.net/jpg/06/16/18/18/360_F_616181843_l404nbV07vMiXDZ1IhWiqZRDpetpuigu.jpg"
									style="width: 150px;">
								<br>
								<input class="form-control uip_id" type="varchar" name="txt1" placeholder="UPI ID"
									required>
							</div>

							<div class="form-group" id="txt1">

								<label for="">Name<span>*</span></label>
								<input class="form-control" type="varchar" name="txt1" placeholder="Name">
							</div>
							<div class="form-group" id="txt2">
								<label for="">Card No<span>*</span></label>
								<input class="form-control" type="number" name="txt2" placeholder="4134 - 1024 - 3640">
							</div>
							<div class="form-group" id="txt3">
								<label for="">CVV<span>*</span></label>
								<input class="form-control" type="number" name="txt3" placeholder="Card No">
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="index.php" class="btn btn-secondary">Cancel</a>
			<button type="submit" class="aa-browse-btn btn btn-success">Place
				Order</button>
		</form>
	</div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function () {
		$("input[name='paymentoption']").click(function () {
			if ($("#pcard").is(":checked")) {
				$("#txt1").show();
				$("#txt2").show();
				$("#txt3").show();
				$("#upitxt").hide();
				$("#upiimg").hide();
			} else if ($("#pupi").is(":checked")) {

				$("#txt1").hide();
				$("#txt2").hide();
				$("#txt3").hide();
				$("#upitxt").show();
				$("#upiimg").show();
			} else {
				$("#txt1").hide();
				$("#txt2").hide();
				$("#txt3").hide();
				$("#upitxt").hide();
				$("#upiimg").hide();
			}
		});
	});

	$(document).ready(function () {
		$("#txt1").hide();
		$("#txt2").hide();
		$("#txt3").hide();
		$("#upitxt").hide();
		$("#upiimg").hide();
	});

	$(".uip_id").hide();
	function enter_upi_id() {
		$(".uip_id").show();
	}
</script>

<script>
	$("#pay_now").click();
</script>