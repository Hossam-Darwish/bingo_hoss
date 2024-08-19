<?php

include_once("header.php");

if(isset($_GET['product_id']))
{
    $product_id = intval($_GET['product_id']);
    
    $sql = "SELECT * FROM product WHERE product_id=$product_id";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_array($result);
            $sql_category = "SELECT * FROM category WHERE category_id=$row[product_category_id]";
            $result_category = mysqli_query($con,$sql_category);
            if($result_category)
            {
                if(mysqli_num_rows($result_category)>0)
                {
                    $row_category = mysqli_fetch_array($result_category);
                }
            }
            ?>
                <div class="container-fliud">
                    <div class="wrapper row"  style="margin: 5% 0px;">
                        <div class="preview col-md-4">
                            <div class="preview-pic tab-content">
                              <div class="tab-pane active" id="pic-1"><img src="imgs/products/<?php echo $row['product_image']; ?>" /></div>
                            </div>
                        </div>
                        <div class="details col-md-8">
                            <h3 class="product-title"><?php echo $row['product_name']; ?></h3>
                            <h5 style="color: brown;">Category : <?php echo $row_category['category_name']; ?></h5>
                            <p class="product-description">
                                <?php
                                    echo $row['product_desc'];
                                ?>
                            </p>
                            <p class="badge" style="font-size: 14px;padding: 1%;">Current price: EGP<?php echo " ".$row['product_price'].".00"; ?></p>
                        </div>
                    </div>
               </div>
            <?php
        }
        else
        {
            output_msg("f","Unexpected Error");
        }
    }
    
}
else
{
    output_msg("f","Unexpected Error");
}


include_once("footer.php");
?>