<?php session_start();
error_reporting(0);

	$date=date("d,M,Y, l");
	$time=date("h:i:s a");
	$inwords="";
	$total=0;
	$grandtotal=0;
	//Declare Invoiced DB variables
		$inv_id="";
 	 	$inv_time="";
 	 	$inv_date="";
 	 	$inv_name="";
 	 	$inv_email="";
 	 	$inv_mobile="";
 	 	$inv_address="";
 	 	$inv_destaddress="";
 	 	$inv_shippingcharge="";
 	 	$inv_grandtotal="";
 	 	$inv_inwords="";
 	 	$inv_total="";
 	 	$inv_vat="";
//Declare Invoiced DB variables
 	 	

	// ======================Number to words Functions==============================
		function numberTowords($num)
		{

			$ones = array(
			0 =>"ZERO",
			1 => "ONE",
			2 => "TWO",
			3 => "THREE",
			4 => "FOUR",
			5 => "FIVE",
			6 => "SIX",
			7 => "SEVEN",
			8 => "EIGHT",
			9 => "NINE",
			10 => "TEN",
			11 => "ELEVEN",
			12 => "TWELVE",
			13 => "THIRTEEN",
			14 => "FOURTEEN",
			15 => "FIFTEEN",
			16 => "SIXTEEN",
			17 => "SEVENTEEN",
			18 => "EIGHTEEN",
			19 => "NINETEEN",
			20 => "TWENTY",
			21 => "TWENTYONE",
			22 => "TWENTYTWO",
			23 => "TWENTYTHREE",
			24 => "TWENTYFOUR",
			25 => "TWENTYFIVE",
			26 => "TWENTYSIX",
			27 => "TWENTYSEVEN",
			28 => "TWENTYEIGHT",
			29 => "TWENTYNINE",
			30 => "THIRTY",
			31 => "THIRTYONE",
			32 => "THIRTYTWO",
			33 => "THIRTYTHREE",
			34 => "THIRTYFOUR",
			35 => "THIRTYFIVE",
			36 => "THIRTYSIX",
			37 => "THIRTYSEVEN",
			38 => "THIRTYEIGHT",
			39 => "THIRTYNINE",
			40 => "FOURTY",
			41 => "FOURTYONE",
			42 => "FOURTYTWO",
			43 => "FOURTYTHREE",
			44 => "FOURTYFOUR",
			45 => "FOURTYFIVE",
			46 => "FOURTYSIX",
			47 => "FOURTYSEVEN",
			48 => "FOURTYEIGHT",
			49 => "FOURTYNINE",
			50 => "FIFTY",
			51 => "FIFTYONE",
			52 => "FIFTYTWO",
			53 => "FIFTYTHREE",
			54 => "FIFTYFOUR",
			55 => "FIFTYFIVE",
			56 => "FIFTYSIX",
			57 => "FIFTYSEVEN",
			58 => "FIFTYEIGHT",
			59 => "FIFTYNINE",
			60 => "SIXTY",
			61 => "SIXTYONE",
			62 => "SIXTYTWO",
			63 => "SIXTYTHREE",
			64 => "SIXTYFOUR",
			65 => "SIXTYFIVE",
			66 => "SIXTYSIX",
			67 => "SIXTYSEVEN",
			68 => "SIXTYEIGHT",
			69 => "SIXTYNINE",
			70 => "SIXTY",
			71 => "SEVENTYONE",
			72 => "SEVENTYTWO",
			73 => "SEVENTYTHREE",
			74 => "SEVENTYFOUR",
			75 => "SEVENTYFIVE",
			76 => "SEVENTYSIX",
			77 => "SEVENTYSEVEN",
			78 => "SEVENTYEIGHT",
			79 => "SEVENTYNINE",
			70 => "SIXTY",
			81 => "EIGHTYONE",
			82 => "EIGHTYTWO",
			83 => "EIGHTYTHREE",
			84 => "EIGHTYFOUR",
			85 => "EIGHTYFIVE",
			86 => "EIGHTYSIX",
			87 => "EIGHTYSEVEN",
			88 => "EIGHTYEIGHT",
			89 => "EIGHTYNINE",
			90 => "NINETY",
			91 => "NINETYONE",
			92 => "NINETYTWO",
			93 => "NINETYTHREE",
			94 => "NINETYFOUR",
			95 => "NINETYFIVE",
			96 => "NINETYSIX",
			97 => "NINETYSEVEN",
			98 => "NINETYEIGHT",
			99 => "NINETYNINE",
			
			);
			$tens = array( 
			0 => "ZERO",
			1 => "TEN",
			2 => "TWENTY",
			3 => "THIRTY", 
			4 => "FORTY", 
			5 => "FIFTY", 
			6 => "SIXTY", 
			7 => "SEVENTY", 
			8 => "EIGHTY", 
			9 => "NINETY" 
			); 
			$hundreds = array( 
			"HUNDRED", 
			"THOUSAND", 
			"MILLION", 
			"BILLION", 
			"TRILLION", 
			"QUARDRILLION" 
			); /*limit t quadrillion */
			$num = number_format($num,2,".",","); 
			$num_arr = explode(".",$num); 
			$wholenum = $num_arr[0]; 
			$decnum = $num_arr[1]; 
			$whole_arr = array_reverse(explode(",",$wholenum)); 
			krsort($whole_arr,1); 
			$rettxt = ""; 
			foreach($whole_arr as $key => $i){
				
				while(substr($i,0,1)=="0")
						$i=substr($i,1,5);
				if($i < 20){ 
				/* echo "getting:".$i; */
				$rettxt .= $ones[$i]; 
				}elseif($i < 100){ 
				if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
				if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
				}else{ 
					if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
					if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
					if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
				} 
					if($key > 0){ 
						$rettxt .= " ".$hundreds[$key]." "; 
					}
			} 
			if($decnum > 0){
				$rettxt .= " AND ";
			if($decnum < 20){
				$rettxt.= $ones[$decnum];
			}elseif($decnum < 100){
				$rettxt .= $tens[substr($decnum,0,1)];
				$rettxt .= " ".$ones[substr($decnum,1,1)];
			}
			}
			return $rettxt;
		}

	// ======================Number to words Functions==============================

  //delete item from cart========================
  if (isset($_GET["action"])) {
    if ($_GET["action"]=="delete") {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['sl']==$_GET['id']) {
          unset($_SESSION['cart'][$key]);
          echo '<script>alert("Product is removed")</script>';
          echo '<script>window.location("checkout.php")</script>';
        }
      }
    }
  }


 ?>


<?php //Check array
// pre_r($_SESSION);

// function pre_r($array){
//   echo "<pre>";
//   print_r($array);
//   echo "</pre>";
// }


// pre_r($_SESSION['cart'][1]['item_name']);
// pre_r($_SESSION['cart'][1]['item_quantity']);



 ?>




<!-- ========================================================================================================================== -->
<!--                                                   Cart Invoice to Database                                                 -->
<!-- ========================================================================================================================== -->

<?php 



//generating Invoice ID
$invoice_id_tstmp= date('ymd');
$invoice_id_tstmp1= date('h');

$invoice_id=$invoice_id_tstmp.$invoice_id_tstmp1.("786").rand(1,78699);
//generating Invoice ID
// print_r($invoice_id);

//  echo " Matha Kharap   :::  ";
//  $count= count($_SESSION['cart']);
// // echo "count =".$count;
//  for ($i=0; $i <$count ; $i++) { 
 	
//  	$sl =$_SESSION['cart'][$i]['sl'];
//  	$item_name=$_SESSION['cart'][$i]['item_name'];
//  	$item_price=$_SESSION['cart'][$i]['item_price'];
//  	$item_quantity=$_SESSION['cart'][$i]['item_quantity'];
//  	$item_total=($_SESSION['cart'][$i]['item_price']*$_SESSION['cart'][$i]['item_quantity']);
//  	echo "  ||  ";
//  	echo "invoice_id".$invoice_id."  NO. ".($i+1)."sl:  ".$inv_itemsl." Name : ".$inv_itname."  Price : ".$inv_itemprice."  Quantity : ".$inv_itemquantity."  Total: ".$item_total;

//  	echo "  ||  ";

				//$insertdb="INSERT INTO inv_orders(inv_id, inv_cartno, sl, item_name, item_price, item_quantity, item_total)VALUES ('$invoice_id', '$nv_cartno', '$sl', '$item_name', '$item_price', '$item_quantity', '$item_total')";
				// if(mysqli_query($connect, $insertdb))
				//   {
				//   echo "<h1>Order DB inserted successfully..!</h1>";
				//   }
				//   else {
				//     echo "<h1>Order DB NOT inserted! ! ! Error!!</h1>";
				//   }


 	//INSERT INTO `inv_orders`(`order_sl`, `inv_id`, `Inv_cartno`, `sl`, `item_name`, `item_price`, `item_quantity`, `item_total`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
 // }



include 'dbconfig.php';//connect info to database 


//eNTERING INVOICE DATA
	if(isset($_POST['submit']))
	{


		 $count= count($_SESSION['cart']);
			// echo "count =".$count;
			 for ($i=0; $i <=$count ; $i++) { 
			 	$inv_cartno=$i+1;
			 	$inv_id=$invoice_id;
			 	$sl =$_SESSION['cart'][$i]['sl'];
			 	$item_name=$_SESSION['cart'][$i]['item_name'];
			 	$item_price=$_SESSION['cart'][$i]['item_price'];
			 	$item_quantity=$_SESSION['cart'][$i]['item_quantity'];
			 	$item_itotal=($_SESSION['cart'][$i]['item_price']*$_SESSION['cart'][$i]['item_quantity']);
			 	$item_total=$item_itotal;
			 	// echo "  ||  ";
			 	// //echo " invoice_id ".$inv_id."  NO. ".$inv_cartno."  sl:  ".$sl." Name : ".$inv_itname."  Price : ".$inv_itemprice."  Quantity : ".$inv_itemquantity."  Total: ".$item_total;

			 	// echo "  ||  ";

							$insertdb="INSERT INTO inv_orders(inv_id, inv_cartno, sl, item_name, item_price, item_quantity, item_total)VALUES('$inv_id', '$inv_cartno', '$sl', '$item_name', '$item_price', '$item_quantity', '$item_total')";
							if(mysqli_query($connect, $insertdb))
							  {
							  echo "<h1>Order DB inserted successfully..!</h1>";
							  }
							  else {
							    echo "<h1>Order DB NOT inserted! ! ! Error!!</h1>";
							  }
			 }

			 //========================Invoice Table Udate code OK=======================
 	 	// $inv_id=mysqli_real_escape_string($connect,($_POST['inv_id']));
 	 	$inv_id=$invoice_id;
 	 	$inv_time=mysqli_real_escape_string($connect,($_POST['inv_time']));
 	 	$inv_date=mysqli_real_escape_string($connect,($_POST['inv_date']));
 	 	$inv_name=mysqli_real_escape_string($connect,($_POST['inv_name']));
 	 	$inv_email=mysqli_real_escape_string($connect,($_POST['inv_email']));
 	 	$inv_mobile=mysqli_real_escape_string($connect,($_POST['inv_mobile']));
 	 	$inv_address=mysqli_real_escape_string($connect,($_POST['inv_address']));
 	 	$inv_destaddress=mysqli_real_escape_string($connect,($_POST['inv_destaddress']));
 	 	$inv_shippingcharge = mysqli_real_escape_string($connect,($_POST['inv_shippingcharge']));
 	 	$inv_grandtotal=mysqli_real_escape_string($connect,($_POST['inv_grandtotal']));
 	 	$inv_inwords=mysqli_real_escape_string($connect,($_POST['inv_inwords']));
 	 	$inv_total=mysqli_real_escape_string($connect,($_POST['inv_total']));
 	 	$inv_vat=mysqli_real_escape_string($connect,($_POST['inv_vat']));


 	 	$insertdb="INSERT INTO invoice(inv_id,inv_time,inv_date,inv_name,inv_email,inv_mobile,inv_address,inv_destaddress,inv_total,inv_shippingcharge,inv_vat,inv_grandtotal,inv_inwords) VALUES ('$inv_id','$inv_time','$inv_date','$inv_name','$inv_email','$inv_mobile','$inv_address','$inv_destaddress','$inv_total','$inv_shippingcharge','$inv_vat', '$inv_grandtotal','$inv_inwords')";
 	 	if(mysqli_query($connect, $insertdb))
		  {
		  echo "<h1>INVOICE DB inserted successfully..!</h1>";
		  $_SESSION['invoice_id']=$invoice_id;
				header("location: invoicesuccess.php");

		  echo '<script>window.location="index.php")</script>';
		  }
		  else {
		    echo "<h1>INVOICE DB NOT inserted! ! ! Error!!</h1>";
		  }


//========================Invoice Table Udate code OK=======================


	}
		
 ?>

<!-- ========================================================================================================================== -->
<!--                                                   Cart Invoice to Database                                                 -->
<!-- ========================================================================================================================== -->

<!--   Header Starts   -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->
   

<div class="row">
	<br>
</div>


<?php 
	//Check Cart Empty Message
	if (empty($_SESSION['cart'])) {
		?>
		<div class="row">
			<br>
		</div>

		<div class="row ">
			<div class="col-md-8 offset-md-2 border border-warning">
				<div class="row border border-light">
					<div class="col-md-12 border border-warning">
						<h1 class="text-warning text-center">
							<?php echo 'There is nothing in your Cart... Go to FoodPark <a href="index.php">home</a> order'; ?>
						</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<br>
		</div>


		<?php
		
	}else{

	//Check Cart Empty
	
 ?>

<!-- ========================================= -->
<div class="row">
	<br><br>
</div>
<!-- ========================================= -->

<!-- ---------------------------------Checkout Form & Invoice--------------------------------------- -->

<div class="row">
	<div class="offset-md-1 col-md-10 border border-warning" style=" border-width: 3px !important;">
		<div class="row border border-light" >
			<div class="col-md-12 m-1 border border-warning">
				


				<div class="row bg-warning">
					<h2 class="text-white text-center">
						Invoice
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
				                      if(!empty($_SESSION["cart"])){
				                        $total=0;
				                        $cartno=1;// for counting item no
				                        foreach ($_SESSION["cart"] as $key => $value) {
				                        	
				                        ?>
				                        <!-- Fetch Cart Items Dynamically -->

				                        <tbody>
				                          <tr>
				                            <th scope="row"><?php echo $cartno; ?></th>
				                            <td><?php echo $value['item_name']; ?></td>
				                            <td><?php echo $value['item_price']; ?> BDT</td>
				                            <td><?php echo $value['item_quantity']; ?></td>
				                            <td><?php echo number_format(($value['item_quantity']*$value['item_price']), 2);?></td>
				                            <td><a href ="checkout.php?action=delete&id=<?php echo $value['sl']; ?>"><span class="badge-danger">  X  </span></a></td>
				                          </tr>
				                       

				                          <?php 
				                          //Calculating all totals
				                            $total= $total+($value['item_quantity']*$value['item_price']);

				                            $vat= ($total*15)/100;//Vat calculation

				                            $grandtotal= $total+$vat+$inv_shippingcharge;//

				                            $inwords=numberTowords($grandtotal);
				                           ?>
				                          
				                        <!-- Fetch Cart Items Dynamically -->
				                    <?php 
				                       $cartno+=1;

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
				                    	<th>VAT (15%)<!-- //$vat--> </th>
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
					<!-- Inv_id --><input type="text" name="inv_id" value="<?php echo $invoice_id; ?> " class="col-md-4 form-control"> 
				</div>
				<div class="form-group">
					<!-- date --><input type="text" name="inv_date" value="<?php echo $date; ?>" class="form-control">
					<!-- time --><input type="text" name="inv_time" value=" <?php echo $time; ?>" class="form-control "> 
				</div>
				<div class="form-group">
				<!-- name --><input type="text" name="inv_name" placeholder="Your name here"  class="form-control form-control-lg"> 
					
				</div>
				<div class="form-group"></div>


				<!-- mobile --><input type="text" name="inv_mobile" placeholder="Your mobile here" class="form-control form-control-lg"> 
				<!-- email --><input type="text" name="inv_email" placeholder="Your email here" class="form-control form-control-lg"> 
				<!-- address --><input type="text" name="inv_address"placeholder="Your address here" class="form-control form-control-lg"> 
				<!-- destaddress --><input type="text" name="inv_destaddress" placeholder="Your destination address here" class="form-control form-control-lg"> 

				<!-- hIDDEN VALUES -->
				<!-- total --><input type="hidden" name="inv_total" value="<?php echo $total; ?>" class="form-control form-control-lg"> 
				<!-- vat --><input type="hidden" name="inv_vat" value="<?php echo $vat; ?>" class="form-control form-control-lg"> 
				<!-- shippingcharge --><input type="hidden" name="inv_shippingcharge" value="<?php echo $inv_shippingcharge; ?>" class="form-control form-control-lg">
				<!-- grandtotal --><input type="hidden" name="inv_grandtotal" value="<?php echo $grandtotal; ?>" class="form-control form-control-lg">
				<!-- $inwords --><input type="hidden" name="inv_inwords" value="<?php echo $inwords.' TAKA ONLY'; ?>" class="form-control form-control-lg">
				<!-- hIDDEN VALUES -->



<!-- ==============================Experiment============================= -->



<!-- ==============================Experiment============================= -->




				<!-- Submit Button -->
				<input type="submit" name="submit" value="Confirm Order" class="btn btn-warning"> 

			</form>
			<!-- ------------------------------------Invice Details Form----------------------------------------------- -->
			<!-- ====================================================================================================== -->
            
			</div>
		</div>
		<!-- Border Row ================ -->
			</div>
		</div>
	</div>
</div>




<?php //Check Cart Empty
	
	}

	 //Check Cart Empty ends
	// ?>
<!-- ---------------------------------Checkout Form & Invoice Ends--------------------------------------- -->
<!-- ========================================= -->
<div class="row">
	<br><br>
</div>
<!-- ========================================= -->
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>