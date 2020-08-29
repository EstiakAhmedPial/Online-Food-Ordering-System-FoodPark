<?php session_start();




 ?>


<?php 
pre_r($_SESSION);

function pre_r($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
 ?>

<!--   Header Starts   -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->
   

<div class="row">
	<br>
</div>



<!-- Checkout Form  -->
<div class="row ">
	<div class="col-md-10 offset-md-1 border border-warning">
		<form>
		<div class="form-group row bg-warning">
			<h3 class="text-dark">
				Invoice
			</h3>
		</div>

		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Invoice no. :</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Date:</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Time :</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
		    </div>
		  </div>

		  <div class="form-group row m-3 p-3">
		    <div class="row">
			    <div class="col-md-4">
			      <input type="text" class="form-control" placeholder="Name">
			    </div>
			    <div class="col">
			      <input type="text" class="form-control" placeholder="Mobile">
			    </div>
			 </div>
		  </div>


		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
		    </div>
		  </div>
		</form>





	<div class="row">
	<div class="col-md-8">
		<!-- =========================================================================== -->
		<!-- ----------------------------------CART---------------------- -->
                <table class="table table-hover table-light">
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
                            <td><a href ="index.php?action=delete&id=<?php echo $value['sl']; ?>"><span class="badge-danger">  X  </span></a></td>
                          </tr>
                       

                          <?php 
                            $total= $total+($value['item_quantity']*$value['item_price']);
                           ?>
                          
                        <!-- Fetch Cart Items Dynamically -->
                    <?php 
                       $cartno+=1;

                        }
                        	
                      }

                    ?>
                    <tr>
                            <th scope="row">Total</th>
                            <th scope="row " colspan="5"><b class="text-right"><?php echo number_format($total,2); echo " Taka"; ?></b></th>
                          </tr>
                    <!-- Fetch Cart Items Dynamically -->
                         </tbody>
                </table>
		<!-- ----------------------------------CART---------------------- -->
		<!-- =========================================================================== -->
	</div>
</div>
	</div>
</div>







<!--    Footer Starts   -->
<?php include 'footer.php'; ?>