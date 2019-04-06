<?php

function items()
{

    global $con;

    $ip_add = getRealIpUser();

    $get_items = "select * from cart where ip_add='$ip_add'";

    $run_items = mysqli_query($con, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;

}