<div type="modal" font-color="green" modal="backdrop-transparent" id="modal-login">
    <div modal="sm dialog-center" margin="auto">
        <div modal="content">

            <div modal="header" border="dark" text-align="center">
                <button modal="close" font-size="large" bgcolor="red" margin-bottom="5px" data-dismiss="modal">
                    close
                </button>
            </div>
            <div modal="body">
                <form method="post" action="index.php">
                    <div type="form-inline">
                        <label>Email:</label>
                        <input name="c_email" type="email" class="form-control" require>
                    </div>
                    <div type="form-inline" margin-bottom="1rem">
                        <label>Password:</label>
                        <input name="c_pass" type="password" class="form-control" require>
                    </div>
                    <label>Remember me</label>
                    <input type="checkbox" class="form-check">
                    <button name="login" type="submit" value="login" bgcolor="green" margin-left="40px"
                            font-color="white" font-size="large">
                        Login
                    </button>
            </div>
            <div modal="footer">
                <a href="customer_register.php" font-color="pink">
                    Dont have account..?
                </a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php

if (isset($_POST['login'])) {
    $customer_email = mysqli_real_escape_string($con,$_POST['c_email']);
    $customer_pass =  mysqli_real_escape_string($con,md5($_POST['c_pass']));
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con, $select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($con, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if ($check_customer == 0) {
        echo "<script>alert('Your email or password is wrong')</script>";
        exit();
    }
    if ($check_customer == 1 AND $check_cart == 0) {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('You are Logged in')</script>";
        echo "<script>window.open('account.php?my_orders','_self')</script>";

    } else {
        $_SESSION['customer_email'] = $customer_email;
        echo "<script>alert('You are Logged in')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

}













?>