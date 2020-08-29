<?php 

session_start();
//clearcart

if (filter_input(INPUT_POST, 'clearcart')) {
  //session_destroy();
  session_unset();
}
  //$con= mysqli_connect("localhost","root","","foodpark");
 
$item_array= array();

if (filter_input(INPUT_POST, 'order')) {
    if (isset($_SESSION['cart'])) {
      $count= count($_SESSION['cart']);
      
      $item_array = array_column($_SESSION['cart'], 'sl');
       
      if(!in_array(filter_input(INPUT_GET, 'id'), $item_array))
      {
        $_SESSION['cart'][$count]=array(
            'sl' => filter_input(INPUT_GET, 'id'),
            'item_name'=>filter_input(INPUT_POST, 'item_name'),
            'item_price'=>filter_input(INPUT_POST, 'item_price'),
            'item_quantity'=>filter_input(INPUT_POST, 'item_quantity')
        );
      }
      else{// CHK duplicacy of items
        for ($i = 0; $i < count($item_array); $i++){
          if ($item_array[$i]==filter_input(INPUT_GET,'id')) {
            //add item quantity to products
            $_SESSION['cart'][$i]['item_quantity'] += filter_input(INPUT_POST,'item_quantity');
          }
        }
      }

    }
    else{
      //if Cart dosent exist
      $_SESSION['cart'][0]=array(
            'sl' => filter_input(INPUT_GET, 'id'),
            'item_name'=>filter_input(INPUT_POST, 'item_name'),
            'item_price'=>filter_input(INPUT_POST, 'item_price'),
            'item_quantity'=>filter_input(INPUT_POST, 'item_quantity')
      );
    }
  }

  //delete item from cart========================
  if (isset($_GET["action"])) {
    if ($_GET["action"]=="delete") {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['sl']==$_GET['id']) {
          unset($_SESSION['cart'][$key]);
          echo '<script>alert("Product is removed")</script>';
          echo '<script>window.location="index.php")</script>';
        }
      }
    }
  }
// pre_r($_SESSION);

// function pre_r($array){
//   echo "<pre>";
//   print_r($array);
//   echo "</pre>";
// }

 
 ?>
<!-- Header          ========= -->
<?php include 'header.php'; ?>
<!--   Header Ends     -->
   
 
   
<!--     body   -->

<!-- Modal Button -->
 <!-- Button trigger modal -->
      <div class="" style="margin-top: 100px;">
        
      </div>
        <button type="button" class="btn btn-success fixed-bottom " style="" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 100px;">
          <h5 class="text-white"> View Cart </h5>
        </button>
<!-- Modal Button -->


<div class="row " style="margin: 10px; padding: 10px;">


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Your Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                

                <!-- ----------------------------------CART---------------------- -->
                  <table class="table table-hover table-dark">
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
                    $total=0; 
                      if(!empty($_SESSION["cart"])){
                        
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
                            <th scope="row text-left"><?php echo number_format($total,2); ?></th>
                          </tr>
                    <!-- Fetch Cart Items Dynamically -->
                         </tbody>
                      </table>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Order More !</button>
                
                <form method="post" action="checkout.php">
                <!-- Clear Cart Button -->

                  <input type="submit" name="clearcart" class="btn btn-success text-white" value="Checkout" style="margin: 8px;">

                </form>
               <!--  <button type="button" class="btn btn-success">Checkout</button> -->
                
                <!-- Form -->
                <form method="post" action="index.php">
                <!-- Clear Cart Button -->

                  <input type="submit" name="clearcart" class="btn btn-warning text-white" value="Clear Cart" style="margin: 8px;">

                </form>

              </div>
            </div>
          </div>

    </div>


</div>


<!-- =======================================
                   master row
====================================== -->
<div class="row">
 <!-- =======================================
                   master row
====================================== -->



        <!-- ------------Collumn 2-------------- -->
        <div class="col-md-12 col-sm-12">
          <!-- ------------Collumn 2-------------- -->




      <!-- 
      ========================================
                Display Porducts
      ========================================= 
      -->
       
           <div class="row">
             

           <?php 

            $con= mysqli_connect("localhost","root","","foodpark");
            $query= "SELECT*FROM item ORDER BY sl ASC";
            $result= mysqli_query($con, $query);
            $num_rows=mysqli_num_rows($result);

            
            if ($num_rows > 0){
              while ($row = mysqli_fetch_assoc($result)){
              


              //Fetch Array Start: Items
          ?>


            <div class="col-md-3 col-sm-3">
              <form method="post" action="index.php?action=add&id=<?php echo $row['sl'];?>">
                <!--      ITEMS        -->
                      
                        <div class="card border-warning text-center" style="width: 80%; height: 20%;  ">
                          <img src="<?php echo $row['item_img']; ?>" class="card-img-top" alt="..." style="height: 180px;">
                          <div class="card-body">
                            <h6 class="card-title"><?php echo $row['item_name']; ?></h6>
                            <span class="badge badge-danger">Price: <?php echo $row['item_price']; ?> TK</span>
                            <!--   //<p class="card-text font-weight-lighter"><?php echo $row['sl']; ?></p> -->
                            <p class="card-text font-weight-lighter"><?php echo $row['item_des']; ?></p>

                            
                            <!-- Name -->
                            <input type="hidden" name="item_name" class="form-control" value="<?php echo $row['item_name']; ?>">

                            <!-- Price -->
                            <input type="hidden" name="item_price"class="form-control" value="<?php echo $row['item_price']; ?>" style="margin: 8px; width: 20px;">
                            <!-- // Product Quantity -->
                            <input type="text" name="item_quantity" class="form-control" value="1">


                            <!-- Submit Button -->
                            <input type="submit" name="order" class="btn btn-warning text-white" value="Order it" style="margin: 8px;">

                            
                          </div>
                        </div>
                      
                    <!--      ITEMS        -->
                
              </form>
              
            </div>



           <?php
                //Fetch Array End
                };
              };

          ?>

           </div> 

      <!-- 
      ========================================
        Display Porducts Ends
      ========================================= 
      -->


          <!-- ------------Collumn 2-------------- -->
        </div>
        <!-- ------------Collumn 2-------------- -->




        <!-- ------------Collumn 1-------------- -->
        <!-- <div class="col-md-3 bg-warning text-white"> -->
          <!-- ------------Collumn 1-------------- -

          
            </div>   -->

          <!-- ------------Collumn 1-------------- -
        </div>
        - ------------Collumn 1-------------- -->
         
            <!-- ----------------------------------------------------------------------- -->




<!-- =======================================
                   master row
====================================== -->

</div>

<!-- =======================================
  master row
====================================== -->



    




<!--     body   -->

    



    
    
<!--    Footer Starts   -->
<?php include 'footer.php'; ?>
