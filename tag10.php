<?php
if (isset($_COOKIE['voter']) || isset($_COOKIE['post_key'])){
}
else {header('Location: login.php');}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Steem Voter</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/css/mdb.min.css" />
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
		<script>
	$(document).ready(function() {
		// Initialize Material Select
		$('.mdb-select').material_select();
	});

	$('#update').on('click', function() {
		// This will select 2nd option
		$('.select-dropdown li:eq( 2 )').trigger('click');
	});
</script>
</head>
<body>
    <!-- Start your project here-->
  <div class="container-fluid">
   
<div  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <!--Modal: Contact form-->
		
    <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header primary-color white-text">
               <a class="btn-primary" href="index.php" align="left" >BACK</a>&nbsp;&nbsp;&nbsp; <h4 class="title">
				      
                    <i class="fa fa-pencil"></i> Steem Vote</h4>
                <a class="btn-primary" href="logout.php">LOGOUT</a>
            </div>
            <!--Body-->
            <div class="modal-body">
<form action="tagvotelist.php" method="POST">
			

              <div class="mdb-form form-lg">
           
                    <input name="author" type="text" id="materialFormNameModalEx2" placeholder="tag/topic" class="form-control form-control-sm">
                 
                </div>

	  <div class="mdb-form form-lg">		
  
<select id="materialFormNameModalEx3" name="tag" style="border: 0px solid white;border-bottom: 1px solid #ddd;" class="form-control form-control-lg mdb-select colorful-select dropdown-primary">
	<option value="" disabled selected>Choose Category</option>
	<option value="created">Created</option>
	<option value="trending">Trending</option>
	<option value="hot">Hot</option>
</select>

</div>


              <div class="mdb-form form-lg">
                   
                    <input name="ratio" type="text" id="materialFormNameModalEx2" placeholder="Vote Percentage" class="mdb-select form-control form-control-lg">
                   
                </div>

              <div class="mdb-form form-lg">
         
                    <textarea name="comment" style="border: 0px solid white;border-bottom: 1px solid #ddd;" id="materialFormNameModalEx2"  placeholder="vote comment" class="form-control form-control-sm"></textarea>
                    
                </div>


                <div class="text-center mt-4 mb-2">
                    <input class="btn btn-primary" name="submit"  type="submit" value="Vote&comment" />
                    </input>
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
	</form>
    <!--/Modal: Contact form-->
</div>
                      
</div>
    <!-- /Start your project here-->
    <!-- SCRIPTS -->
    <!-- JQuery -->

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js"></script>
</body>

</html>
