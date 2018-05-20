<?php
    include 'include/header.php';
?>

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

                    <?php include 'action/singleaction.php'; ?>

                </div>
            <!--/.Content-->
        </div>
    	</form>
        <!--/Modal: Contact form-->
    </div>

    </div>

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
