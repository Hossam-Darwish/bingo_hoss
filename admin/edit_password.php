<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Edit Password
    </h3>
    <?php
    if(!isset($_POST['submit']))
    {
        ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Password : </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Edit</button>
            </form>
        <?php
    }
    else
    {
        $password = validate($_POST['password']);
        
        if($password==NULL)
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"edit_password.php");
        }
        else
        {
            $password = enc_pass($password);
            
            $sql = "UPDATE admin SET admin_password='$password' WHERE admin_id=$_SESSION[admin_id]";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                output_msg("s","Password updated");
                redirect(2,"index.php");
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