<?php

function getPro()
{

    global $con;

    $get_products = "select * from products order by 1 DESC LIMIT 0,20";

    $run_products = mysqli_query($con, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_img1 = $row_products['product_img1'];

        echo "
        
        <div column='s-12 sm-6 md-6 lg-4 xl-3'>
        
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

}