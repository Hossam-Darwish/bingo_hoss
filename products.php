<?php
include_once("header.php");

if(isset($_GET['category_id']))
{
    $category_id = intval($_GET['category_id']);
    
    $sql = "SELECT * FROM product WHERE product_category_id=$category_id";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
            <div class="row">
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <img src="imgs/products/<?php echo $row['product_image']; ?>" style="width: 60%; height: 250px;">
                          <div class="caption">
                            <h3><?php echo $row['product_name']; ?></h3>
                            <p>
                               <?php
                                echo substr($row['product_desc'],0,60)."......";
                               ?>
                            </p>
                            <p><a href="product_details.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                          </div>
                        </div>
                  </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
        else
        {
            output_msg("f","There is no data to view");
        }
    }
    
}
else
{
    
    // All products
    
    
    $sql = "SELECT * FROM product";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
            <div class="row">
            <?php
            while($row=mysqli_fetch_array($result))
            {
                ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                          <img src="imgs/products/<?php echo $row['product_image']; ?>" style="width: 60%; height: 250px;">
                          <div class="caption">
                            <h3><?php echo $row['product_name']; ?></h3>
                            <p>
                               <?php
                                echo substr($row['product_desc'],0,50)."......";
                               ?>
                            </p>
                            <p><a href="product_details.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                          </div>
                        </div>
                  </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
        else
        {
            output_msg("f","There is no data to view");
        }
    }
    
}

include_once("footer.php");
?>