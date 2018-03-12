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
		
    <div class="modal-dialog cascading-modal" role="document" style="max-width: 800px;">

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
			 <ul class="list-group">
	<li class="list-group-item">Author: <?=$_COOKIE['author'] ?> </li>
	<li class="list-group-item">Ratio: <?=$_COOKIE['ratio'] ?> </li>
	<li class="list-group-item">Comment: <?=$_COOKIE['comment'] ?> </li>
</ul>
			<?php
error_reporting(0);
include('parsedown.php');
$error = false;
// variables //
$steemit = 'https://busy.org';
// ratio calculator //
$author_input = trim(strtolower($_POST['author']));

if(isset($_POST['submit']))
{
	// if inputs are empty, print error //
if(empty($author_input))
{
	$error = true;
	echo '
	<div class="alert alert-danger">
	<strong>HELLO ? </strong> You have to fill all inputs.
	</div>
	';
}
else{
// Get latest posts by author //

 $hour = time() + 3600 * 24 * 30;
setcookie('author', $_POST['author'], $hour);
setcookie('comment', $_POST['comment'], $hour);
setcookie('ratio', $_POST['ratio'], $hour);


 $author_posts = 'https://api.steemjs.com/get_discussions_by_blog?query={"tag":"'.$author_input.'","limit":"30"}';
 $file_get_author = file_get_contents($author_posts);
 $json_author = json_decode($file_get_author, true);
 $parsedown = new Parsedown;


 $n = 0;
foreach ($json_author as $data)
{   $n++;
   if ($author_input == $data["author"]){
    $title_post = $data['title'];
	$author_perm_link = $data['permlink'];
	$linkout = 'localhost/steemvote/upvote.php?a='.$author_perm_link;
	$get_link = $steemit.'/@'.$author_input.'/'.$author_perm_link;
	$body = $data['body'];
	$body = $parsedown->text($body);
	
	
	libxml_use_internal_errors(true);

$dom = new DOMDocument;
$dom->loadHTML($body);


foreach ($dom->getElementsByTagName('img') as $node) {

    $node->setAttribute('class','img-responsive col-sm-6 col-lg-7');

}

$body =$dom->saveHTML();

	$body_part = substr($data['body'],0,300);	
	?>
	

<!--Section: Magazine v.1-->

    <!--Section heading-->
    <h2 class="h1 text-center my-5 font-weight-bold"><?=$title_post ?> <br/>Author: <a target="_BLANK" href="https://steemit.com/@<?=$author_input?>"><?=$author_input ?></a> </h2>

    <!--Section description-->
    <p class="grey-text pb-5" style="word-wrap: break-word;"><?=$body_part ?></p>

    <!--Grid row-->
    <div class="row text-left">

    <!--Grid column-->
    <div class="col-lg-6 col-md-12">

	 <a target="_BLANK" href="http://<?=$linkout?>" class="btn btn-secondary">VOTE</a>
       <a target="_BLANK" href="<?=$get_link?>" style="margin: 2px;" class="btn btn-secondary">VIEW LINK</a>
     
  
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary"  style="margin: 2px;" data-toggle="modal" data-target="#exampleModal<?=$n?>">
    View Post
</button>


     

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$n?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
           
            <div class="modal-body">
			 <h2 class="modal-title text-center" id="exampleModalLabel"><?=$title_post ?><br/>Author: <a target="_BLANK" href="https://steemit.com/@<?=$author_input?>"><?=$author_input ?></a></h2><br/>
<?=$body ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a target="_BLANK" href="http://<?=$linkout?>" class="btn btn-secondary">VOTE</a>
            </div>
		
        </div>
    </div>
</div>
                                


    </div>
    <!--Grid column-->
    </div>
    <!--Grid row-->

</section>
<!--/Section: Magazine v.1-->
	
	<?php
	
	
	
	
	
	
   }
}
   
}
}	
?>

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
	
	