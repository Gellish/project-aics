<?php

function add_cart()
{

    global $con;

    if (isset($_GET['add_cart'])) {

        $ip_add = getRealIpUser();

        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];

        $product_size = $_POST['product_size'];

        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        $run_check = mysqli_query($con, $check_product);


        if (mysqli_num_rows($run_check) > 0) {

            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        } else {

            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";

            $run_query = mysqli_query($con, $query);

            echo "<script>alert('your product has now add your cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }

    }

}
