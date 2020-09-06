<?php 


$inv_id="";

if (isset($_GET['action'])) {
    if ($_GET['action']=='view') {
        $inv_id=$_GET['id'];
           
    }
}


 ?>
<?php include 'dbconfig.php';//connect info to database ?>

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



<div class="col-md-10 " style=" ">
<!--===============================================Orders Manage Page ===================================================== -->
	<div class="row">
	<!-- ----------------------------------------------Orders Table------------------------------------------------------------ -->
			<div class="col-md-12 border border-warning m-1">
			<!-- -------------------------------------Table-------------------------------------------------------------------- -->
				    <div class="col-md-12 m-1 border border-warning">
                


                <div class="row bg-warning">
                    <h2 class="text-white text-center">
                        Invoice no. <?php echo $inv_id; ?>
                    </h2>
                </div>
                <!-- Border Row ================ -->
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        
                


                    <!-- -----------------------------------------CART List--------------------------------------------------- -->
                    <!-- ====================================================================================================== -->
                            <div class="row">
                                <div class="col-md-10 offset-md-1">

                                <!-- =========================================================================== -->
                                <!-- ----------------------------------CART---------------------- -->
                                        <table class="table table-hover border border-warning">
                                                <thead>
                                                    <th colspan="6" class="bg-warning">Order details</th>
                                                </thead>
                                                <thead>
                                                  <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col"> X </th>
                                                  </tr>
                                                </thead>

                                            <!-- Fetch Cart Items Dynamically -->
                                            <?php 

                                            //Declare Cal vaariables
                                            $total=0;
                                            $grandtotal=0;
                                            $inv_shippingcharge=50;
                                            $vat=0;
                                               //<!-- get Orders from invoice table -->
                                               // include 'dbconfig.php';//connect info to database 
                            
                                                $query= "SELECT*FROM inv_orders where inv_id='$inv_id' ";
                                                $result= mysqli_query($con, $query);
                                                $num_rows=mysqli_num_rows($result);
                                                
                                                if ($num_rows > 0){
                                                    while ($value = mysqli_fetch_assoc($result)){  
                                                ?>
                                                <!-- Fetch Cart Items Dynamically -->

                                                <tbody>
                                                  <tr>
                                                    <th scope="row"><?php echo $value['inv_cartno']; ?></th>
                                                    <td><?php echo $value['item_name']; ?></td>
                                                    <td><?php echo $value['item_price']; ?> BDT</td>
                                                    <td><?php echo $value['item_quantity']; ?></td>
                                                    <td><?php echo ($value['item_total']);?></td>
                                                    <!-- <td><a href ="checkout.php?action=delete&id=<?php echo $value['']; ?>"><span class="badge-danger">  X  </span></a></td> -->
                                                  </tr>
                                               

                                                  <?php 
                                                  //Calculating all totals
                                                    $total= $total+($value['item_quantity']*$value['item_price']);

                                                    $vat= ($total*15)/100;//Vat calculation

                                                    $grandtotal= $total+$vat+$inv_shippingcharge;//

                                                    $inwords="";
                                                   ?>
                                                  
                                                <!-- Fetch Cart Items Dynamically -->
                                            <?php 
                                               // $cartno+=1;

                                                }
                                                    
                                              }

                                            ?>
                                            <tr>    
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <th scope="row">Total</th>
                                                    <th scope="row " colspan="2"><b class="text-right"><?php echo number_format($total,2); echo " Taka"; ?></b></th>
                                            </tr>
                                            <tr>
                                                
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th>VAT <!-- //$vat--> </th>
                                                <th> <?php echo number_format($vat,2); echo " Taka"; ?></th>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th>Shipping Charge <!-- //$shippingcharge --> </th>
                                                <th> <?php echo number_format($inv_shippingcharge,2); echo " Taka"; ?></th>
                                                <td></td>

                                            </tr>
                                             <tr>
                                                
                                                <td></td>
                                                <td></td>
                                                <th></th>
                                                <th>Grand Total </th>
                                                <th> <?php echo number_format($grandtotal,2); echo " Taka"; ?></th>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>In words</th>
                                                
                                                <th colspan="4"> <?php echo $inwords; echo " TAKA ONLY"; ?></th>

                                            </tr>
                                            <!-- Fetch Cart Items Dynamically -->
                                                 </tbody>
                                        </table>
                                </div>
                            </div>
                    <!-- -----------------------------------------CART List--------------------------------------------------- -->
                    <!-- ====================================================================================================== -->

                    <!-- ====================================================================================================== -->
                    <!-- ------------------------------------Invice Details Form----------------------------------------------- -->
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-2">Invoice ID</label>
                            <!-- Inv_id --><input type="text" name="inv_id" value="<?php echo $inv_id; ?> " class="col-md-4 form-control"> 
                        </div>
                        <?php 

                         $query= "SELECT*FROM invoice where inv_id='$inv_id' ";
                                                $result= mysqli_query($con, $query);
                                                $num_rows=mysqli_num_rows($result);
                        //SELECT `id`, `inv_id`, `inv_time`, `inv_date`, `inv_name`, `inv_email`, `inv_mobile`, `inv_address`, `inv_destaddress`, `inv_total`, `inv_shippingcharge`, `inv_vat`, `inv_grandtotal`, `inv_inwords`, `inv_delivery` FROM `invoice` WHERE 1
                                                if ($num_rows > 0){
                                                    while ($row = mysqli_fetch_assoc($result)){  
                                                
                         ?>


                        <div class="form-group">
                            <!-- date --><input type="text" name="inv_date" value="<?php echo $row['inv_date']; ?>" class="form-control">
                            <!-- time --><input type="text" name="inv_time" value=" <?php echo $row['inv_time']; ?>" class="form-control "> 
                        </div>
                        <div class="form-group">
                        <!-- name --><input type="text" name="inv_name" placeholder="Your name here" value=" <?php echo $row['inv_name']; ?>"  class="form-control form-control-lg"> 
                            
                        </div>
                        <div class="form-group"></div>


                        <!-- mobile --><input type="text" name="inv_mobile" value=" <?php echo $row['inv_mobile']; ?>"  placeholder="Your mobile here" class="form-control form-control-lg"> 
                        <!-- email --><input type="text" name="inv_email" value=" <?php echo $row['inv_email']; ?>" placeholder="Your email here" class="form-control form-control-lg"> 
                        <!-- address --><input type="text" name="inv_address" value=" <?php echo $row['inv_address']; ?>"  placeholder="Your address here" class="form-control form-control-lg"> 
                        <!-- destaddress --><input type="text" name="inv_destaddress" value=" <?php echo 'Delivery address: '.$row['inv_destaddress']; ?>"  placeholder="Your destination address here" class="form-control form-control-lg"> 

                        



        <!-- ==============================Experiment============================= -->



        <!-- ==============================Experiment============================= -->




                        <!-- Submit Button -->
                        <!-- <input type="submit" name="submit" value="Confirm Order" class="btn btn-warning">  -->

                    </form>
                    <!-- ------------------------------------Invice Details Form----------------------------------------------- -->
                    <!-- ====================================================================================================== -->
                        <!-- Fetch Cart Items Dynamically -->
                                            <?php 
                                               // $cartno+=1;

                                                }
                                                    
                                              }

                                            ?>
                    </div>
                </div>
                <!-- Border Row ================ -->
                    </div>
                </div>
			<!-- -------------------------------------Table-------------------------------------------------------------------- -->
			</div>
	<!-- ----------------------------------------------Orders Table------------------------------------------------------------ -->


	</div>
	
<!--===============================================Orders Manage Page ===================================================== -->
</div>

 <!--=====================================================================================================================-->
 <!-- 									Master Row																		  -->
 <!--=====================================================================================================================-->
</div>





    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
