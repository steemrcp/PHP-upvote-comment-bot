<?php
error_reporting(0);
$error = false;
// variables //
$steemit = 'https://steemit.com/';
$weight = trim($_POST['ratio']);
// ratio calculator //
$weight_final = 100 * $weight;
$author_input = trim(strtolower($_POST['author']));
$comment = trim($_POST['comment']);
$voter = trim(strtolower($_COOKIE['voter']));
$post_key = trim($_COOKIE['post_key']);

if(isset($_POST['submit']))
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
   if ($author_input == $author_latest_post["author"]){
    $title_post = $author_latest_post['title'];
	$author_perm_link = $author_latest_post['permlink'];
	$get_link = $steemit.'@'.$author_input.'/'.$author_perm_link;
   }
}
    // type your own post key and the name of account// 

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
<script src="//cdn.steemjs.com/lib/latest/steem.min.js"></script>	
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