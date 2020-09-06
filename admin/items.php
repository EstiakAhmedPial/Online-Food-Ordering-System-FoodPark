<?php include 'dbconfig.php';//connect info to database ?>

<?php 

//edit get value
 if (isset($_GET["action"])) {
    if ($_GET["action"]=="edit") {
    	$_SESSION['edit_sl']=$_GET['id'];
    	echo "Edit_id ".$_SESSION['edit_sl'];
    }
}
//edit_db where sl
if (isset($_POST['edit_db'])) {
	$sl=$_POST['sl'];
	$item_name=$_POST['item_name'];
	$item_des=$_POST['item_des'];
	$item_price=$_POST['item_price'];
	 
	//code for image uploading
	if($_FILES['item_img']['name'])
	{
	move_uploaded_file($_FILES['item_img']['tmp_name'], "../img/".$_FILES['item_img']['name']);
	$item_img="./img/".$_FILES['item_img']['name'];
	}
	 
	$i="UPDATE item SET item_name='$item_name', item_des='$item_des', item_price='$item_price', item_img='$item_img' WHERE sl='$sl'";
	//UPDATE `item` SET `sl`=[value-1],`item_name`=[value-2],`item_des`=[value-3],`item_price`=[value-4],`item_img`=[value-5] WHERE 1

	if(mysqli_query($con, $i))
	{
	echo "Edited successfully..!";
	unset($_SESSION['edit_sl']);
	echo '<script>alert("Item is edited")</script>';
    echo '<script>window.location="items.php")</script>';
	}
	else {
		echo "NOT Edited! ! ! Error!!";
	}
}


// delete------------------
if (isset($_POST['delete'])) {
	$sl=$_POST['sl'];

	$i="DELETE FROM item WHERE sl='$sl'";
	if(mysqli_query($con, $i))
	{
	echo "Deleted successfully..!";
	}
	else {
		echo "NOT Deleted! ! ! Error!!";
	}

	
}

if(isset($_POST['submit']))
{
	$item_name=$_POST['item_name'];
	$item_des=$_POST['item_des'];
	$item_price=$_POST['item_price'];
	 
	//code for image uploading
	if($_FILES['item_img']['name'])
	{
	move_uploaded_file($_FILES['item_img']['tmp_name'], "../img/".$_FILES['item_img']['name']);
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
 



<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->


<div class="row">
 <!--=====================================================================================================================-->
 <!-- 									Master Row																		  -->
 <!--=====================================================================================================================-->

 <!--=====================================================================================================================-->
<!-- ================================== Side Bar ======================================================================== -->
 <!--=====================================================================================================================-->

<div class="col-md-2 " style=" background-color: #d3d6d8;">
	<?php include 'sidebar.php'; ?>
	
</div>



 <!--=====================================================================================================================-->
<!-- ================================== Side Bar ======================================================================== -->
 <!--=====================================================================================================================-->


<div class="col-md-10">
<!--=====================================================================================================================-->
<!-- ================================== Main Content ======================================================================== -->
<!--=====================================================================================================================-->

	<div class="row">
	<!-- ---------------------------------------Items Input form ------------------------------------------------------------ -->

		<div class="col-md-4">
					<div class="border border-warning m-1 p-1">

						
				<!-- ================Edit Form== -->
							<?php 
							//Verify  Session Edit 
								if (!empty($_SESSION['edit_sl'])) {
							// <!-- Get Data -->
                           include 'dbconfig.php';//connect info to database 
                            	$d=$_SESSION['edit_sl'];
                            	$query= "SELECT*FROM item WHERE sl ='$d'";
					            $result= mysqli_query($con, $query);
					            // $num_rows=mysqli_num_rows($result);
					            
					            
              					// $row = mysqli_fetch_assoc($result);
              					$row=mysqli_fetch_assoc($result);

							?>
							<h3 class="text-warning">
							Edit food Items here
							</h3>
						<form method="POST" enctype="multipart/form-data">

								<div class="form-group">
				    			<label  >SL</label>
								
								<input class="form-control form-control-lg" type="text" name="sl" value="<?php echo $row['sl']; ?>">
								</div>

								<div class="form-group">
				    			<label  >Item Name</label>
									
									<input class="form-control form-control-lg" type="text" name="item_name" value="<?php echo $row['item_name']; ?>">
								</div>

								<div class="form-group">
					    			<label >Description</label>
									
									<input class="form-control form-control-lg" type="text" name="item_des" value="<?php echo $row['item_des']; ?>">
								</div>

								<div class="form-group">
				    			<label  >Price</label>
								
								<input class="form-control form-control-lg" type="text" name="item_price" value="<?php echo $row['item_price']; ?>">
								</div>

								
								<div class="form-group">
				    			<label  >Image</label>
                        		<img src="../<?php echo $row['item_img']; ?>" class="img-thumbnail">
								
								<input class="form-control form-control-lg" type="file" name="item_img" >
								<!-- <input class="form-control form-control-lg" type="file" name="items_img"> -->
								
								</div>


							<input type="submit" value="Input" class="text-white btn btn-warning" name="edit_db">
						</form>


							<?php 
								}else{

							 ?>
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
						<?php 
							} 
						?>
					</div>
					
				</div>
	<!-- ---------------------------------------Items Input form ------------------------------------------------------------ -->


	<!-- ---------------------------------------Ttems display form------------------------------------------------- -->
		<div class="col-md-8   p-1 ">
			<div class="border border-warning m-1">
				<table class="table table-responsive table-hover table-secondary">
                        <thead>
                          <tr>
                            <th scope="col">SL. no.</th>
                            <th scope="col"> Image </th>
                            <th scope="col">Item Name</th>
                            <th scope="col"> Price </th>
                            <th scope="col">Description</th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Remove </th>
                          </tr>
                        </thead>

                        <!-- Get Data Table -->
                           <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM item ORDER BY sl ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            $i=1;
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){

					             ?>

					     <form  method="POST" enctype="multipart/form-data">
                        <tr>


                        	<!-- SL. --><th scope="col"><?php echo $row['sl']; ?></th>  
                        	<!-- Image -->
                        	<th>
                        		<img src="../<?php echo $row['item_img']; ?>" class="img-thumbnail">
                        	</th>
                        	<!-- Name --><th>
                        		<?php echo $row['item_name']; ?>
                        	</th>
                        	<!-- Price --><th>
                        		<?php echo $row['item_price']; ?>
                        	</th>
                        	<!-- Des --><td>
                        		<?php echo $row['item_des']; ?>
                        	</td>
                        	<!--Edit  --><td>
                        			<a href ="items.php?action=edit&id=<?php echo $row['sl']; ?>" class="btn btn-warning text-white">Edit</a>

                        			<!-- <input class="btn btn-warning text-white" type="submit" name="edit" value="Edit"> -->
                        		
                        	</td>
                        	<!--Remove  --><td>
                        		<input type="hidden" name="sl" value="<?php echo $row['sl']; ?>">
                        		<!-- Button trigger modal -->
                        		<input type="submit" name="delete" class="btn btn-danger" value="Delete" >
								<!-- <button type="submit" name="delmodalsl" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal" value="">
								  Delete 
								</button> -->
                        		
                        	</td>
                        </tr>

                        		<?php
                        				
                        			}
                        		}
                        		 ?>
                        </form>
				</table>
			</div>
		</div>
	<!-- ---------------------------------------Ttems display form------------------------------------------------- -->


	</div>

<!--=====================================================================================================================-->
<!-- ================================== Main Content ======================================================================== -->
<!--=====================================================================================================================-->
</div>


 <!--=====================================================================================================================-->
 <!-- 									Master Row																		  -->
 <!--=====================================================================================================================-->
</div>





    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
