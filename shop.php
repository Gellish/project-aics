<?php

$active = 'Shop';


?>

<?php include("layouts/header.php") ?>

<div id="content"><!-- #content Begin -->
    <div class="container-fluid"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->

            <ul class="breadcrumb" bgcolor="dark-blue" font-color="white"><!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Shop
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->

            <?php

            include("layouts/sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9"><!-- col-md-9 Begin -->

            <?php
            $p_cat_id = $_GET['p_cat'];

            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

            $run_p_cat = mysqli_query($con, $get_p_cat);

            $row_p_cat = mysqli_fetch_array($run_p_cat);

            $p_cat_title = $row_p_cat['p_cat_title'];

            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products = "select * from products where p_cat_id='$p_cat_id'";

            $run_products = mysqli_query($con, $get_products);

            $count = mysqli_num_rows($run_products);
            echo "
            
                <div class='box'>
                
                    <h1> $p_cat_title </h1>
                    <p> $p_cat_desc</p>
                </div>
            
            ";

            ?>
        <div type="row">
            <?php

            getpcatpro();
            getcatpro();

            ?>
        </div>

            <?php

            if (!isset($_GET['p_cat'])) {

                if (!isset($_GET['cat'])) {

                    echo "

                       <div class='box'><!-- box Begin -->
                           <h1>Shop</h1>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                           </p>
                       </div><!-- box Finish -->

                       ";

                }

            }

            ?>

            <div type="row"><!-- row Begin -->

                <?php

                if (!isset($_GET['p_cat'])){

                if (!isset($_GET['cat'])){

                $per_page = 6;

                if (isset($_GET['page'])) {

                    $page = $_GET['page'];

                } else {

                    $page = 1;

                }

                $start_from = ($page - 1) * $per_page;

                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";

                $run_products = mysqli_query($con, $get_products);

                while ($row_products = mysqli_fetch_array($run_products)) {

                    $pro_id = $row_products['product_id'];

                    $pro_title = $row_products['product_title'];

                    $pro_price = $row_products['product_price'];

                    $pro_img1 = $row_products['product_img1'];

                    echo "
                                
 <div column='s-12 sm-6 md-6 lg-4'>
        
            <box margin='1rem' shadow='black' bgcolor='dark-blue' font-color='white' data-aos='fade-up' data-aos-duration='1700'>
              
                
                    <img type='image-top' src='admin/product_images/$pro_img1' width='100%' height='250px'>

            
                <bodys>    
                    
                <footer>              
                      <h3>
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                     </h3>
                     
                    <p class='price' font-size='large'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-success' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add to Cart

                        </a>
                    
                    </p>

                </footer>
                </bodys>
               
             </box>
       </div>
                                ";

                }

                ?>

            </div><!-- row Finish -->

            <center>
                <ul class="pagination"><!-- pagination Begin -->
                    <?php

                    $query = "select * from products";

                    $result = mysqli_query($con, $query);

                    $total_records = mysqli_num_rows($result);

                    $total_pages = ceil($total_records / $per_page);

                    echo "
                        
                            <li>
                            
                                <a bgcolor='red' font-color='white' href='shop.php?page=1'> " . 'First Page' . " </a>
                            
                            </li>
                        
                        ";

                    for ($i = 1; $i <= $total_pages; $i++) {

                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=" . $i . "'> " . $i . " </a>
                            
                            </li>
                        
                        ";

                    };

                    echo "
                        
                            <li>
                            
                                <a bgcolor='red' font-color='white' href='shop.php?page=$total_pages'> " . 'Last Page' . " </a>
                            
                            </li>
                        
                        ";

                    }

                    }

                    ?>

                </ul><!-- pagination Finish -->
            </center>


        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("layouts/footer.php");

?>

<!--<script src="js/jquery-331.min.js"></script>-->
<!--<script src="js/bootstrap-337.min.js"></script>-->


</body>
</html>