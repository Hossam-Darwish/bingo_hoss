<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        View Products
    </h3>
    <?php
    
    $sql = "SELECT * FROM product";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 15%;">Product Name</th>
                            <th style="width: 10%;">Category</th>
                            <th style="width: 10%;">Price</th>
                            <th style="width: 50%;">Desc</th>
                            <th style="width: 10%;">Image</th>
                            <th style="width: 5%;">Edit</th>
                            <th style="width: 5%;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $index = 1;
                            while($row = mysqli_fetch_array($result))
                            {
                                $sql = "SELECT category_name FROM category WHERE category_id=$row[product_category_id]";
                                $result_category = mysqli_query($con,$sql);
                                if($result_category)
                                {
                                    $row_category = mysqli_fetch_array($result_category);
                                }
                                ?>
                                    <tr>
                                        <td><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row_category['category_name']; ?></td>
                                        <td><?php echo $row['product_price']; ?></td>
                                        <td><?php echo $row['product_desc']; ?></td>
                                        <td><img src="../imgs/products/<?php echo $row['product_image']; ?>" style="width:200px;"></td>
                                        <td><a href="edit_product.php?product_id=<?php echo $row['product_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                        <td>
                                            
                                            
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link btndelete" data-toggle="modal" data-target="#myModal<?php echo $index;?>">
                                                <span style="color:red;" class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    Are you sure you want to delete this product?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button rel="<?php echo $row['product_id']; ?>" type="button" class="btn btn-danger delete_product" data-dismiss="modal">Delete</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            
                                        </td>
                                    </tr>
                                <?php
                                $index++;
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
        else
        {
            output_msg("f","There is no data");
            redirect(2,"add_product.php");
        }
    }
    else
    {
        output_msg("f","Error! SQL Error");
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>