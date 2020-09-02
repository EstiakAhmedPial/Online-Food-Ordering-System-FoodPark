<?php session_start();

	$date=date("d,M,Y, l");
	$time=date("h:i:s a");
	$inwords="";

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
          echo '<script>window.location="checkout.php")</script>';
        }
      }
    }
  }


 ?>


<?php 
pre_r($_SESSION);

function pre_r($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
 ?>



<!-- ========================================================================================================================== -->
<!--                                                   Cart Invoice to Database                                                 -->
<!-- ========================================================================================================================== -->

<?php 


$connect= mysqli_connect("localhost", "root", "","foodpark");

//generating Invoice ID
$invoice_id_tstmp= date('Ymd-');
$invoice_id_tstmp1= date('his');

$invoice_id=$invoice_id_tstmp.("78600").$invoice_id_tstmp1;
//generating Invoice ID

//print_r($invoice_id);
echo ";||   ||invoice_id =".$invoice_id."  :;";

//


if(isset($_POST['submit']))
{
 	$inv_orderdetailsarray="";
  $inv_date =$date;
  $inv_time=$time;
  $inv_id=$invoice_id;
  $inv_name=mysqli_real_escape_string($connect,($_POST['inv_name']));
  $inv_name=mysqli_real_escape_string($connect,($_POST['inv_name']));
  $inv_email=mysqli_real_escape_string($connect,($_POST['inv_email']));
  $inv_mobile=mysqli_real_escape_string($connect,($_POST['inv_mobile']));
  $inv_address=mysqli_real_escape_string($connect,($_POST['inv_address']));
  $inv_destaddress=mysqli_real_escape_string($connect,($_POST['inv_destaddress']));
  					
  //$inv_orderdetailsarray=serialize($_SESSION['cart']);
  
  $inv_total=mysqli_real_escape_string($connect,($_POST['inv_total']));
  $inv_shippingcharge=mysqli_real_escape_string($connect,($_POST['inv_shippingcharge']));
  $inv_vat =mysqli_real_escape_string($connect,($_POST['inv_vat']));
  $inv_grandtotal =mysqli_real_escape_string($connect,($_POST['inv_grandtotal']));

//INSERT INTO `invoice`(`id`, `inv_id`, `inv_time`, `inv_date`, `inv_name`, `inv_email`, `inv_mobile`, `inv_address`, `inv_destaddress`, `inv_total`, `inv_shippingcharge`, `inv_vat`, `inv_grandtotal`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])

  $inputdb= "INSERT INTO invoice (inv_id, inv_time, inv_date, inv_name, inv_email, inv_mobile, inv_address, inv_destaddress, inv_total, inv_shippingcharge, inv_vat, inv_grandtotal ) VALUES('$inv_id','$inv_time','$inv_date','$inv_name','$inv_email','$inv_mobile','$inv_address','$inv_destaddress','$inv_orderdetailsarray','$inv_total','$inv_shippingcharge','$inv_vat','$inv_grandtotal')";
 
  if(mysqli_query($connect, $inputdb))
  {
  echo "<br><h1>INVOICE data inserted successfully..!</h1><br><br>";
  }
  else {
    echo "<br><h1>INVOICE data NOT inserted! ! ! Error!!</h1><br><br>";
  }

 //  $inv_orderdetailsarray=serialize($_SESSION['cart']);
 //  	//INSERT INTO `inv_ordersdetails`(`order_id`, `inv_id`, `inv_orderdetailsarray`) VALUES ([value-1],[value-2],[value-3])
 // $inputdb= "INSERT INTO inv_ordersdetails(inv_id, inv_orderdetailsarray) VALUES('$inv_id','"$inv_orderdetailsarray"')";

 // 		if(mysqli_query($connect, $inputdb))
	// 	  {
	// 	  echo "<br><h1>INV_ORDER data inserted successfully..!</h1><br><br>";
	// 	  }
	// 	  else {
	// 	    echo "<br><h1>INV_ORDER data NOT inserted! ! ! Error!!</h1><br><br>";
	// 	  }

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
		<div class="row">
			<div class="offset-md-1 col-md-10">
				
		
		<form method="POST" action="checkout.php">

			<div class="form-group row">
			    <label for="staticEmail" class="col-sm-1 col-form-label">Date:</label>
			      <input type="text" readonly class="col-sm-2 form-control-plaintext"  value="<?php echo $date;?>">
			</div>
			<div class="form-group row">
			    <label for="staticEmail" class="col-sm-1 col-form-label">Time:</label>
			      <input type="text" readonly class="col-sm-2 form-control-plaintext" value="<?php echo $time;?>">
			</div>

			 <div class="form-row">
			    <div class="col-md-4 mb-3">
			      <label for="validationDefault01">Name</label>
			      <input type="text" name="inv_name" class="form-control" id="validationDefault01" placeholder="Name eg. Ali Hassan" required>
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="validationDefault02">Email</label>
			      <input type="text" name="inv_email" class="form-control" id="validationDefault02" placeholder="Email eg. Otto@email.com">
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="validationDefault02">Mobile no</label>
			      <input type="text" name="inv_mobile" class="form-control" id="validationDefault02" placeholder="eg. +880 1XXX XXXXXX" required>
			    </div>
			</div>

			  <div class="form-row">
			    <div class="col-md-12 mb-8">
			      <label for="validationDefault03">Address </label>
			      <input type="text" name="inv_address" class="form-control" id="validationDefault03" placeholder="Your Address" required>
			    </div>
			  </div>

			  <div class="form-row">
				  <div class="col-md-12 mb-3">
				      <label for="validationDefault04">Shipping Address/Destination Address </label>
				      <input type="text" name="inv_destaddress" class="form-control" id="validationDefault04" placeholder="Shipping Address" required>
				  </div>
			  </div>
			    		    
			  



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
				                    $shippingcharge=50;
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

				                            $vat= ($total*15)/100;

				                            $grandtotal= $total+$vat+$shippingcharge;//

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
				                            <th scope="row " colspan="4"><b class="text-right"><?php echo number_format($total,2); echo " Taka"; ?></b></th>
				                    </tr>
				                    <tr>
				                    	
				                    	<td></td>
				                    	<td></td>
				                    	<th></th>
				                    	<th>VAT <!-- //$shippingcharge --> </th>
				                    	<th> <?php echo number_format($vat,2); echo " Taka"; ?></th>
				                    </tr>
				                    <tr>
				                    	
				                    	<td></td>
				                    	<td></td>
				                    	<th></th>
				                    	<th>Shipping Charge <!-- //$shippingcharge --> </th>
				                    	<th> <?php echo number_format($shippingcharge,2); echo " Taka"; ?></th>
				                    </tr>
				                     <tr>
				                    	
				                    	<td></td>
				                    	<td></td>
				                    	<th></th>
				                    	<th>Grand Total </th>
				                    	<th> <?php echo number_format($grandtotal,2); echo " Taka"; ?></th>
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


            <input type="hidden" name="inv_total" class="form-control" value="<?php echo $total; ?>">
            <input type="hidden" name="inv_shippingcharge" class="form-control" value="<?php echo $shippingcharge; ?>">
            <input type="hidden" name="inv_vat" class="form-control" value="<?php echo $vat; ?>">
            <input type="hidden" name="inv_grandtotal" class="form-control" value="<?php echo $grandtotal; ?>">




			  <div class="form-row">
			  	<div class="offset-md-8 col-md-4form-group">
				    <div class="form-check">
				      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
				      <label class="form-check-label" for="invalidCheck2">
				        Agree to terms and conditions
				      </label>
				    </div>
				</div>
			  
				  
			  </div>

			  <div class="form-row">
			  	<div class="offset-md-8 col-md-4 form-group">
                    <!-- <input type="submit" value="Confirm Order" class="text-white btn btn-danger" name="submit"> -->

				  	<button class="btn btn-warning m-4 p-2" type="submit"  name="submit" value="confirmorder">
				  		<h3 class="text-white">
				  			Confirm Order
				  		</h3>
				  	</button>
				  </div>
			  </div>
			  



		</form>
			</div>
		</div>

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