<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Edit category
    </h3>
    <?php
    
    if(isset($_GET['category_id']))
    {
        $category_id = intval($_GET['category_id']);
        
        $sql = "SELECT * FROM category WHERE category_id=$category_id";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $row_old = mysqli_fetch_array($result);
                
                if(!isset($_POST['submit']))
                {
                    ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input value="<?php echo $row_old['category_name']; ?>" type="text" name="category_name" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                    <?php
                }
                else
                {
                    $category_name = validate($_POST['category_name']);
                    
                    if($category_name==NULL)
                    {
                        output_msg("f","Error! Please fill all data");
                        redirect(2,"edit_category.php?category_id=$category_id");
                    }
                    else
                    {
                        $sql = "UPDATE category SET category_name='$category_name' WHERE category_id=$category_id";
                        $result = mysqli_query($con,$sql);
                        
                        if($result)
                        {
                            output_msg("s","Category Updated");
                            redirect(2,"view_category.php");
                        }
                        else
                        {
                            output_msg("f","Error! SQL Error");
                        }
                    }
                    
                }
                
            }
            else
            {
                output_msg("f","Error! Unexpected Error");
            }
        }
        else
        {
            output_msg("f","Error! SQL Error");
        }
        
        
    }
    else
    {
        output_msg("f","Unexpected Error!");
    }
    
    
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>