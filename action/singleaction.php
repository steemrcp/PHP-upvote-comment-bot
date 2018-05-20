<?php
    error_reporting(0);
    include('parsedown.php');
    $error = false;

    // variables //
    $steemit = 'https://busy.org';

    // ratio calculator //
    $author = trim(strtolower($_POST['author']));

    if(isset($_POST['submit']))
    {
        // if inputs are empty, print error //
      if(empty($author)) {
        $error = true;
        echo '
        <div class="alert alert-danger">
        <strong>HELLO ? </strong> You have to fill all inputs.
        </div>
        ';
      }else{

      // Get latest posts by author //
       $author_posts = 'https://api.steemjs.com/get_discussions_by_blog?query={"tag":"'.$author.'","limit":"30"}';
       $file_get_author = file_get_contents($author_posts);
       $posts = json_decode($file_get_author, true);

       $parsedown = new Parsedown;

       $n = 0;

      foreach ($posts as $data)
      {
          $n++;

          if ($author == $data["author"]) {

              $title_post = $data['title'];
              $author_perm_link = $data['permlink'];

              // Lets make use of steemconnect api
              $api = 'https://v2.steemconnect.com/sign/vote?';

              // Get username of voter from cookie and store in $voter variable
              $voter = $_COOKIE['voter'];

                // Get username of author whose post is to be voted from resources
              $author = $data["author"];

              //  Store permlink in variable
              $permlink = $author_perm_link;

              // Lets concatenate all variables to form our link
              $linkout = $api."voter=".$voter."&author=".$author."&permlink=".$permlink;

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

          <h2 class="h1 text-center my-5 font-weight-bold"><?=$title_post ?> <br/>Author: <a target="_BLANK" href="https://steemit.com/@<?=$author_input?>"><?=$author_input ?></a> </h2>

          <!--Section description-->
          <p class="grey-text pb-5" style="word-wrap: break-word;"><?=$body_part ?></p>

          <div class="col-md-1"></div>

          <a target="_BLANK" href="<?=$linkout?>" class="btn btn-secondary col-md-3">VOTE</a>
          <a target="_BLANK" href="<?=$get_link?>" style="margin: 2px;" class="btn btn-secondary col-md-3">Go to Post</a>
          <a data-toggle="modal" data-target="#exampleModal<?=$n?>" style="margin: 2px;" class="btn btn-secondary col-md-3">View Post</a>


          <hr>

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
                          <a target="_BLANK" href="<?=$linkout?>" class="btn btn-secondary">VOTE</a>
                      </div>

                  </div>
              </div>
          </div>
      </section>
      <!--/Section: Magazine v.1-->

        <?php

         }
      }

  }
}
?>
