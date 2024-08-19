<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Delete Product
    </h3>
    <?php
    
    if(isset($_GET['product_id']))
    {
        $product_id = intval($_GET['product_id']);
        
        $sql = "DELETE FROM product WHERE product_id=$product_id";
        $result = mysqli_query($con,$sql);
        
        if($result)
        {
            output_msg("s","Product Deleted");
            redirect(2,"view_product.php");
        }
        else
        {
            output_msg("f","Error! SQL Error");
        }
        
    }
    else
    {
        output_msg("f","Error! Unexpected Error");
    }
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>