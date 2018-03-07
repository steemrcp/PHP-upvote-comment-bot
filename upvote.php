<?php
error_reporting(0);
$error = false;
// variables //
$steemit = 'https://steemit.com';
$weight = $_COOKIE['ratio'];
// ratio calculator //
$weight_final = 100 * $_COOKIE['ratio'];
$author_input = trim(strtolower($_COOKIE['author']));
$comment = trim($_COOKIE['comment']);
$voter = trim(strtolower($_COOKIE['voter']));
$post_key = trim($_COOKIE['post_key']);
$author_perm_link = $_GET['a'];
$get_link = $steemit.'/@'.$author_input.'/'.$author_perm_link;


//Unset previously made cookies
setcookie("verror", "", time() - 3600);
setcookie("vresult", "", time() - 3600);
setcookie("cerror", "", time() - 3600);
setcookie("cresult", "", time() - 3600);


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
	?>
    


<script src="//cdn.steemjs.com/lib/latest/steem.min.js"></script>	
<script>
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}


var postWif = '<?php echo $post_key; ?>';
var voter =  '<?php echo $voter; ?>';
var author = '<?php echo $author_input; ?>';
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
	
	setCookie('verror',err,7);
	setCookie('vresult',result,7);
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
	setCookie('cerror',err,7);
	setCookie('cresult',result,7);
    }
  );
</script>


<?php
	echo '
	<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
    <div class="card-header">You are so successfull</div>
    <div class="card-body">
    <h4 class="card-title">You upvoted '.$author_input.' with %'.$weight.'</h4>
    <p class="card-text">Authors latest link: <a href="'.$get_link.'" target="_blank">'.$get_link.'</a><br>
	'; 
	echo '<br>';
	echo 'Your comment to authors post; <br>';
	echo $comment;
	
	print_r($_COOKIE['cerror']); echo '<br>';
	print_r($_COOKIE['cresult']); echo '<br>';
	print_r($_COOKIE['verror']); echo '<br>';
	print_r($_COOKIE['vresult']); echo '<br>';
	
	
} ?>

