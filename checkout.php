<?php

$active = 'Account';

session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>alert('you need to login your acount')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();

}else {

    include("layouts/header.php");

}

?>





<div id="content"><!-- #content Begin -->
    <div class="container-fluid"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->

            <ul class="breadcrumb" bgcolor="dark-blue" font-color="white"><!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Register
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->

            <?php

            include("layouts/sidebar_user.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9"><!-- col-md-9 Begin -->

            <?php

            if (!isset($_SESSION['customer_email'])) {

                include("index.php");


            } else {

                include("payment_options.php");

            }

            ?>

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("layouts/footer.php");

?>

