<html>
<script src="//cdn.steemjs.com/lib/latest/steem.min.js"></script>	
<header>
</header>
<body>

<form method="GET">
<input type="text" name="author" placeholder="Author"> 
<input type="number" min="0" name="ratio" placeholder="% ?"> ratio
<input type="submit" name="submit" placeholder="Vote">
</form>


<?php
error_reporting(0);
// variables //
$steemit = 'https://steemit.com/';
$weight = trim($_GET['ratio']);
// ratio calculator //
$weight = 100 * $weight;

// Get latest posts by author //

if(isset($_GET['submit']))
{
 $author_input = trim($_GET['author']);
 $author_posts = 'https://api.steemjs.com/get_discussions_by_blog?query={"tag":"'.$author_input.'","limit":"1"}';
 $file_get_author = file_get_contents($author_posts);
 $json_author = json_decode($file_get_author, true);
 
foreach ($json_author as $author_latest_post)
{   
    $author_perm_link = $author_latest_post['permlink'];
    $get_link = $steemit.'@'.$author_input.'/'.$author_perm_link;
	// debug //
	echo $get_link;
	
}
 
}
    // type your own post key and the name of account//
    $post_key = ""; // post key //
    $voter = "omeratagun"; // account name //
    $author = $author_input; // author your want to upvote //
    $permlink = $get_link; // perm link of author // 
    
?>

<script>
var post = '<?php echo $post_key; ?>';
var voter =  '<?php echo $voter; ?>';
var author = '<?php echo $author; ?>';
var permlink = '<?php echo $author_perm_link; ?>';
var weight = <?php echo $weight; ?>;

steem.broadcast.vote(
    post,
    voter, // Voter
    author, // Author
    permlink, // Permlink
    weight, // Weight (10000 = 100%)
    function(err, result) {
      console.log(err, result);
    }
  );
</script>
</body>
</html>
