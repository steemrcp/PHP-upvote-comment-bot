<?php

if(isset($_POST['submit']))
{
 $hour = time() + 3600 * 24 * 30;
 setcookie('voter', $_POST['voter'], $hour);
setcookie('post_key', $_POST['post_key'], $hour);

header('Location: index.php');

}
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
                <h4 class="title">
                    <i class="fa fa-pencil"></i> Steem Vote</h4>
                
            </div>
            <!--Body-->
            <div class="modal-body">
<form action="login.php" method="POST">
			<div class="md-form form-sm">
                    <i class="fa fa-user prefix"></i>
                    <input name="voter" type="text" id="materialFormNameModalEx1" class="form-control form-control-sm">
                    <label for="materialFormNameModalEx1">Your Username</label>
                </div>

                <!-- Material input subject -->
                <div class="md-form form-sm">
                    <i class="fa fa-key prefix"></i>
                    <input name="post_key" type="text" id="materialFormKeyModalEx1" class="form-control form-control-sm">
                    <label for="materialFormKeyModalEx1">Your Posting Key (WIF)</label>
                </div>

                <div class="text-center mt-4 mb-2">
                    <input class="btn btn-primary" name="submit" type="submit" value="Vote&comment" />
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


