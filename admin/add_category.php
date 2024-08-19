<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Add category
    </h3>
    <?php
    
    if(!isset($_POST['submit']))
    {
        ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">
                    Add
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
            redirect(2,"add_category.php");
        }
        else
        {
            $sql = "INSERT INTO category VALUES(NULL,'$category_name')";
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                output_msg("s","Category Added");
                redirect(2,"view_category.php");
            }
            else
            {
                output_msg("f","Error! SQL Error");
            }
            
        }
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}

?>