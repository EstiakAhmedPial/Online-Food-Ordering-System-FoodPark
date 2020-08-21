<?php


session_start();
//Connect the Dbase
$con= mysqli_connect("localhost","root","","foodpark");

if(isset($_POST['sub'])){
$t=$_POST['text'];
$u=$_POST['user'];
$p=$_POST['pass'];
$c=$_POST['city'];
$g=$_POST['gen'];
 
//code for image uploading
if($_FILES['f1']['name']){
move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
$img="image/".$_FILES['f1']['name'];
}
 
$i="insert into reg(name,username,password,city,image,gender)values('$t','$u','$p','$c','$img','$g')";
if(mysqli_query($con, $i)){
echo "inserted successfully..!";
}}?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	   
	   

	    <title>Food Park</title>


  </head>
  <body >
	  <div class="container-fluid">
	      
			<!--  NAV Menu Bar -->

			   <div class="row container-fluid">
			      <div class="col">
			           <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
			              <a class="navbar-brand" href="#">
			                  <h2>
			                      <em>Food Park</em>
			                  </h2>
			              </a>
			              
			              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			                <span class="navbar-toggler-icon"></span>
			              </button>
			              
			                  <div class="collapse navbar-collapse" id="navbarText">
			                    <ul class="navbar-nav mr-auto">
			                      <li class="nav-item active">
			                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			                      </li>
			                      <li class="nav-item">
			                        <a class="nav-link" href="#">Features</a>
			                      </li>
			                      <li class="nav-item">
			                        <a class="nav-link" href="#">Pricing</a>
			                      </li>
			                    </ul>
			                    
			                    <span class="navbar-text " style="">
			                      Order Online Your Favourite Food
			                    </span>
			                  </div>
			            </nav>
			      </div>
			   </div>

			<!--  NAV Menu Bar -->

			   
<!--   Header Ends     -->
   
 
	<!-- Form Item Input -->
		<!-- Form Item Input -->
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="border border-warning m-1 p-3">

						<h3 class="text-warning">
							Input food Items here
						</h3>

						<form method="POST" enctype="multipart/form-data">

							<div class="form-group">
				    			<label  >Item Name</label>
								
								<input class="form-control form-control-lg" type="text" name="">
							</div>

							<div class="form-group">
				    			<label >Description</label>
								
								<input class="form-control form-control-lg" type="text" name="">
							</div>

							<div class="form-group">
			    			<label  >Price</label>
							
							<input class="form-control form-control-lg" type="text" name="">
							</div>

							
							<div class="form-group">
			    			<label  >Image</label>
							
							<input class="form-control form-control-lg" type="file" name="f1">
							
							</div>
							
							 
							<input type="submit" value="Input" class="text-white btn btn-warning" name="submit">
						</form>
					</div>
					
				</div>
			</div>
		</div>

<!-- Form Item Input -->






   
    
<!--    Footer Starts   -->
   <div class="row justify-content-center bg-warning " style="margin-top: 10px;">
    <div class="col-md-4">
            
                
            <p class="h6 " style="color:#fcfcf9; ">2020 &copy;Copyright all rights reserved. <a href="#">ID-123</a> </p>
                
            
        </div>
    </div>

    <!-- Optional JavaScript -->
    
		</div>
     <!-- Optional JavaScript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
      <script src="./js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    
    

  </body>
</html>
 