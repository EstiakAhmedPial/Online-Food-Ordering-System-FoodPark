<?php session_start();
//2echo "<h1> invoice_id  ".$_SESSION['invoice_id']."</h1>";

 ?>
<!--   Header Starts   -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->

<div class="row">
	<br>
</div>

		<div class="row">
			<br>
		</div>

		<div class="row ">
			<div class="col-md-8 offset-md-2 border border-warning">
				<div class="row border border-light">
					<div class="col-md-12 border border-warning">
						<h1 class="text-warning text-center">
							Your order is submited <em>Invoice ID:<?php echo $_SESSION['invoice_id']; ?></em> our agent will call you to confim the order in 15 mins.
						</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<br>
		</div>





<!-- ========================================= -->
<div class="row">
	<br><br>
</div>

<?php unset($_SESSION['cart']); ?>
<!-- ========================================= -->
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>