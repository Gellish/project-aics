<?php

function total_price()
{

    global $con;

    $ip_add = getRealIpUser();

    $total = 0;

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($con, $select_cart);

    while ($record = mysqli_fetch_array($run_cart)) {

        $pro_id = $record['p_id'];

        $pro_qty = $record['qty'];

        $get_price = "select * from products where product_id='$pro_id'";

        $run_price = mysqli_query($con, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_total = $row_price['product_price'] * $pro_qty;

            $total += $sub_total;

        }

    }

    echo "$" . $total;

}