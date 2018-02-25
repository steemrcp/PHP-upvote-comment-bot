<html>
<script src="//cdn.steemjs.com/lib/latest/steem.min.js"></script>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<header>
</header>
<body>

<form method="GET">
<input type="text" class="form-control input-lg" name="author" placeholder="Author"><br>
<input type="number" class="form-control input-lg" min="0" name="ratio" placeholder="% ?"><br>
<textarea class="form-control" rows="5" name="comment"></textarea>
<input type="submit" name="submit" class="btn btn-primary" value="Vote&comment">
</form>

<?php
error_reporting(0);
$error = false;
// variables //
$steemit = 'https://steemit.com/';
$weight = trim($_GET['ratio']);
// ratio calculator //
$weight_final = 100 * $weight;
$author_input = trim($_GET['author']);
$comment = trim($_GET['comment']);

if(isset($_GET['submit']))
{
	// if inputs are empty, print error //
if(empty($weight && $author_input && $comment ))
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
 $author_posts = 'https://api.steemjs.com/get_discussions_by_blog?query={"tag":"'.$author_input.'","limit":"1"}';
 $file_get_author = file_get_contents($author_posts);
 $json_author = json_decode($file_get_author, true);
 
foreach ($json_author as $author_latest_post)
{   
    $title_post = $author_latest_post['title'];
	$author_perm_link = $author_latest_post['permlink'];
	$get_link = $steemit.'@'.$author_input.'/'.$author_perm_link;
	
}
    // type your own post key and the name of account// 
    $post_key = ""; // post key //
    $voter = "omeratagun"; // account name //
    $author = $author_input; // author your want to upvote //
    $permlink = $get_link; // perm link of author // 
    
	echo '
	<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
    <div class="card-header">You are so successfull</div>
    <div class="card-body">
    <h4 class="card-title">You upvoted '.$author.' with %'.$weight.'</h4>
    <p class="card-text">Authors latest link: <a href="'.$get_link.'" target="_blank">'.$title_post.'</a><br>
	'; 
	echo '<br>';
	echo 'Your comment to authors post; <br>';
	echo $comment;
}
}	
?>

<script>
var postWif = '<?php echo $post_key; ?>';
var voter =  '<?php echo $voter; ?>';
var author = '<?php echo $author; ?>';
var permlink = '<?php echo $author_perm_link; ?>';
var weight = <?php echo $weight_final; ?>;
var comment = '<?php echo $comment; ?>';

steem.broadcast.vote(
    postWif,
    voter, // Voter
    author, // Author
    permlink, // Permlink
    weight, // Weight (10000 = 100%)
    function(err, result) {
      console.log(err, result);
    }
  );
  
  var permlink_comment = new Date().toISOString().replace(/[^a-zA-Z0-9]+/g, '').toLowerCase();
  steem.broadcast.comment(
    postWif,
    author, // Parent Author
    permlink, // Parent Permlink
    voter, // Author
    permlink_comment, // Permlink
    '', // Title
    comment, // Body
	{ tags: [''], app: 'steemjs/examples' }, // Json Metadata
    function(err, result) {
      console.log(err, result);
    }
  );
</script>
</body>
</html>
