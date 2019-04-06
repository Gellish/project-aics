<div type="modal" font-color="green" modal="backdrop-transparent" id="modal-signup">
    <div modal="sm dialog-center" margin="auto">
        <div modal="content">
            <div modal="header" bgcolor="dark">
                <div modal="close" font-size="large" bgcolor="red" margin-bottom="5px" data-dismiss="modal">
                    close
                </div>
            </div>
            <div modal="body">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div type="form-inline">
                        <label>Username:</label>
                        <input name="c_name" type="text" class="form-control" require>
                    </div>
                    <div type="form-inline">
                        <label>Email:</label>
                        <input name="c_email" type="email" class="form-control" require>
                    </div>
                    <div type="form-inline" margin-bottom="1rem">
                        <label>Password:</label>
                        <input name="c_pass" type="password" class="form-control" require>
                    </div>
<!--                    <div type="form-inline" margin-bottom="1rem">-->
<!--                        <label>Country:</label>-->
<!--                        <input name="c_country" type="text" class="form-control" require>-->
<!--                    </div>-->
<!--                    <div type="form-inline" margin-bottom="1rem">-->
<!--                        <label>City:</label>-->
<!--                        <input name="c_city" type="text" class="form-control" require>-->
<!--                    </div>-->
<!--                    <div type="form-inline" margin-bottom="1rem">-->
<!--                        <label>Contact:</label>-->
<!--                        <input name="c_contact" type="text" class="form-control" require>-->
<!--                    </div>-->
<!--                    <div type="form-inline" margin-bottom="1rem">-->
<!--                        <label>Address:</label>-->
<!--                        <input name="c_address" type="text" class="form-control" require>-->
<!--                    </div>-->
<!--                    <div type="form-inline" margin-bottom="1rem">-->
<!--                        <label>Profile Picture:</label>-->
<!--                        <input name="c_image" type="file" class="form-control form-height-custom" require>-->
<!--                    </div>-->
                    <div modal="footer">
                        <a href="customer_register.php" font-color="green">
                            <span>Terms & Condition</span>
                        </a>
                        <button name="register" value="login" type="submit" bgcolor="green" font-color="white"
                                font-size="large">
                            <i class="fa fa-user"></i>
                            Signup
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

if (isset($_POST['register'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = md5($_POST['c_pass']);
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();
    /// If register leave a black ///
    if ($c_name == "" || $c_email == "" || $c_pass == "") {
        echo "<script>alert('you need to enter the value')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else {
        /// If register  not leave a black ///
        move_uploaded_file($c_image_tmp, "users/users_profile/$c_image");
        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
        $run_customer = mysqli_query($con, $insert_customer);
        $sel_cart = "select * from cart where ip_add='$c_ip'";
        $run_cart = mysqli_query($con, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if ($check_cart > 0) {
            /// If register have items in cart ///
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been Registered Sucessfully')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";

        } else {
            /// If register without items in cart ///
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have been Registered Sucessfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

?>