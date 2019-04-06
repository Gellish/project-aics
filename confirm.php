<?php

session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";

} else {

    include("layouts/header.php");


    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];

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
                        My Account
                    </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->

            <div class="col-md-3"><!-- col-md-3 Begin -->

                <?php

                include("includes/sidebar_user.php");

                ?>

            </div><!-- col-md-3 Finish -->

            <div class="col-md-9"><!-- col-md-9 Begin -->

                <div class="box"><!-- box Begin -->

                    <h1 align="center"> Please confirm your payment</h1>

                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post"
                          enctype="multipart/form-data"><!-- form Begin -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Invoice No: </label>

                            <input type="text" class="form-control" name="invoice_no" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Amount Sent: </label>

                            <input type="text" class="form-control" name="amount_sent" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Select Payment Mode: </label>

                            <select name="payment_mode" class="form-control"><!-- form-control Begin -->

                                <option> Select Payment Mode</option>
                                <option> Back Code</option>
                                <option> Paypall</option>
                                <option> Payoneer</option>
                                <option> Western Union</option>

                            </select><!-- form-control Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Transaction / Reference ID: </label>

                            <input type="text" class="form-control" name="ref_no" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Paypall / Payoneer / Western Union Code: </label>

                            <input type="text" class="form-control" name="code" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label> Payment Date: </label>

                            <input type="text" class="form-control" name="date" required>

                        </div><!-- form-group Finish -->

                        <div class="text-center"><!-- text-center Begin -->

                            <button class="btn btn-primary btn-lg" name="confirm_payment">
                                <!-- tn btn-primary btn-lg Begin -->

                                <i class="fa fa-user-md"></i> Confirm Payment

                            </button><!-- tn btn-primary btn-lg Finish -->

                        </div><!-- text-center Finish -->

                    </form><!-- form Finish -->

                    <?php

                    if (isset($_POST['confirm_payment'])) {

                        $update_id = $_GET['update_id'];

                        $invoice_no = $_POST['invoice_no'];

                        $amount = $_POST['amount_sent'];

                        $payment_mode = $_POST['payment_mode'];

                        $ref_no = $_POST['ref_no'];

                        $code = $_POST['code'];

                        $payment_date = $_POST['date'];

                        $complete = "Complete";

                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                        $run_payment = mysqli_query($con, $insert_payment);

                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                        $run_customer_order = mysqli_query($con, $update_customer_order);

                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                        $run_pending_order = mysqli_query($con, $update_pending_order);

                        if ($run_pending_order) {

                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";

                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";

                        }

                    }

                    ?>

                </div><!-- box Finish -->

            </div><!-- col-md-9 Finish -->

        </div><!-- container Finish -->
    </div><!-- #content Finish -->

    <?php

    include("layouts/footer.php");

    ?>


    </body>
    </html>
<?php } ?>