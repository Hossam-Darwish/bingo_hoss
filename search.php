<?php

include_once("header.php");

if(isset($_POST['submit']))
{
    $search = validate($_POST['search']);
    
    $sql = "SELECT * FROM product WHERE product_name like '%$search%'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $num_results = mysqli_num_rows($result); 
            
            ?>
            <div class="row">
            <?php
            output_msg("s","Found : [$num_results] Results.");
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
            $num_results = 0 ;
            output_msg("f","Not Found : [ $num_results ] Results.");
        }
    }
}
else
{
    output_msg("f","Unexpected Error");
}

include_once("footer.php");
?>