<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Add Product
    </h3>
    <?php
    
    if(!isset($_POST['submit']))
    {
        ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Category</label>
                    <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($con,$sql);
                        if($result)
                        {
                            if(mysqli_num_rows($result)>0)
                            {
                                ?>
                                    <select name="product_category_id" class="form-control">
                                        <?php
                                            while($row_category = mysqli_fetch_array($result))
                                            {
                                                ?>
                                                    <option value="<?php echo $row_category['category_id']; ?>"><?php echo $row_category['category_name']; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                <?php
                            }
                            else
                            {
                                output_msg("f","There is no category");
                            }
                        }
                        else
                        {
                            output_msg("f","Error! SQL Error");
                        }
                    ?>
                </div>
                
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" name="product_price" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label>Product Desc</label>
                    <textarea name="product_desc" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                
                
                <button type="submit" name="submit" class="btn btn-primary">
                    Add
                </button>
            </form>
        <?php
    }
    else
    {
        $product_name = validate($_POST['product_name']);
        $product_category_id = intval($_POST['product_category_id']);
        $product_price = intval($_POST['product_price']);
        $product_desc = validate($_POST['product_desc']);
        
        $product_image = time().$_FILES['product_image']['name'];
        $product_image_path = $_FILES['product_image']['tmp_name'];
        
        if($product_name!=NULL and $product_category_id!=NULL and $product_price!=NULL and
           $product_desc!=NULL and $product_image_path!=NULL)
        {
            $sql = "INSERT INTO product VALUES(NULL,'$product_name',$product_category_id,
                                               $product_price,'$product_desc','$product_image')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                if(move_uploaded_file($product_image_path,"../imgs/products/$product_image"))
                {
                    output_msg("s","Product Added");
                    redirect(2,"view_product.php");
                }
                else
                {
                    output_msg("f","Error! Unexpected Error. (Upload)");
                }
            }
            else
            {
                output_msg("f","Error! SQL Error");
            }
        }
        else
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"add_product.php");
        }
        
    }
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>