<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        View Categories
    </h3>
    <?php
    
    
    $sql = "SELECT * FROM category";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $index = 1;
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $row['category_id']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>
                                  <!--  <td><a href="edit_category.php?category_id=<?php //echo $row['category_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td> --> 
                                  <td>
                                   <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link btnedit" data-toggle="modal" data-target="#myModal<?php echo $index;?>">
                                  <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="myModal<?php echo $index;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                      </div>
                                      <div class="modal-body">
                                         <form id="editForm">
                                            <input type="hidden" id="itemId" name="itemId"> <!-- Hidden field for item ID -->
                                            <div class="form-group">
                                              <label for="itemName">Category name:</label>
                                              <input type="text" class="form-control" id="itemName" name="itemName">
                                            </div>
                                          </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button rel="<?php echo $row['category_id']; ?>" type="button" class="btn btn-primary edit_category" data-dismiss="modal">Edit</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  </td>
                                    <td><a href="delete_category.php?category_id=<?php echo $row['category_id']; ?>"><span style="color:red;" class="glyphicon glyphicon-trash"></span></a></td>
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
            redirect(2,"add_category.php");
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