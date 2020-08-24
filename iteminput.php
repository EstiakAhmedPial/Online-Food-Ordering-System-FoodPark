<?php


session_start();
//Connect the Dbase
$con= mysqli_connect("localhost","root","","foodpark");

//

if(isset($_POST['submit']))
{
	$item_name=$_POST['item_name'];
	$item_des=$_POST['item_des'];
	$item_price=$_POST['item_price'];
	 
	//code for image uploading
	if($_FILES['item_img']['name'])
	{
	move_uploaded_file($_FILES['item_img']['tmp_name'], "./img/".$_FILES['item_img']['name']);
	$item_img="./img/".$_FILES['item_img']['name'];
	}
	 
	$i="insert into item (item_name,item_des,item_price,item_img)values('$item_name','$item_des','$item_price','$item_img')";

	if(mysqli_query($con, $i))
	{
	echo "inserted successfully..!";
	}
	else {
		echo "NOT inserted! ! ! Error!!";
	}

}?>
 


<!-- Header -->
<?php include 'header.php'; ?>   
 
	<!-- Form Item Input -->
		<!-- Form Item Input -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="border border-warning m-1 p-3">

						<h3 class="text-warning">
							Input food Items here
						</h3>

						<form method="POST" enctype="multipart/form-data">

							<div class="form-group">
				    			<label  >Item Name</label>
								
								<input class="form-control form-control-lg" type="text" name="item_name">
							</div>

							<div class="form-group">
				    			<label >Description</label>
								
								<input class="form-control form-control-lg" type="text" name="item_des">
							</div>

							<div class="form-group">
			    			<label  >Price</label>
							
							<input class="form-control form-control-lg" type="text" name="item_price">
							</div>

							
							<div class="form-group">
			    			<label  >Image</label>
							
							<input class="form-control form-control-lg" type="file" name="item_img">
							
							</div>
							
							 
							<input type="submit" value="Input" class="text-white btn btn-warning" name="submit">
						</form>
					</div>
					
				</div>
			</div>
		</div>

<!-- Form Item Input -->






 <!-- Footer -->
 <?php include 'footer.php'; ?>