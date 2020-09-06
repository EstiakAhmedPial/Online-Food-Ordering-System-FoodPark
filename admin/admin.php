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
 		<br>
 		<br>
 	</div>
 	<div class="row">
 		<!-- ===================================Orders BOX ==================================== -->
					<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
                          <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
                          <div class="card-body p-1">
                            <h1 class="card-title text-warning"> ORDERS </h1>
                            <span class="badge badge-danger"></span>

                            <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM invoice ORDER BY id ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);


					             ?>

                             <h4 class="card-text font-weight-lighter"> Total Number of Orders</h4>
                            <p class="card-text font-weight-lighter display-3"><?php echo $num_rows; ?></p>
                            

                            
                          </div>
                        </div>
 		<!-- ===================================Order got ==================================== --><!-- =================================== Pending Orders BOX ==================================== -->
					<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
                          <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
                          <div class="card-body p-1">
                            <h1 class="card-title text-danger"> PENDING ORDERS </h1>
                            <span class="badge badge-danger"></span>

                           	<?php 
                            	$query= 'SELECT*FROM invoice ORDER by id ';
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);


					             ?>

                            <h4 class="card-text font-weight-lighter text-danger">Number of Pending Orders</h4>
                            <p class="card-text font-weight-lighter display-3 text-danger"><?php echo $num_rows; ?></p>

                            
                            <!-- Submit Button -->
                            <!-- <input type="submit" name="order" class="btn btn-warning text-white" value="Order it" style="margin: 8px;"> -->

                            
                          </div>
                        </div>
 		<!-- ===================================Pending Order  ==================================== -->
 		<!-- ===================================Items  ==================================== -->
					<div class="col-md-4 card border-warning text-center m-1 p-2" style="width: 80%; height: 20%;  ">
                          <!-- <img src=" " class="card-img-top" alt="..." style="height: 180px;"> -->
                          <div class="card-body p-1">
                            <h1 class="card-title text-warning">Items </h1>
                            <span class="badge badge-danger"></span>

                            <?php include 'dbconfig.php';//connect info to database ?>
                            <?php 
                            	$query= "SELECT*FROM item ORDER BY sl ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);


					             ?>

                             <h4 class="card-text font-weight-lighter"> Total Number of Items</h4>
                            <p class="card-text font-weight-lighter display-4"><?php echo $num_rows; ?></p>
                            
                            
                          </div>
                        </div>



 		<!-- ===================================Items  ==================================== -->






<!-- ----------------------------------------------------------------------------------------------- -->
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
