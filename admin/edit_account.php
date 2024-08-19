<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Edit Account
    </h3>
    <?php
    if(!isset($_POST['submit']))
    {
        ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Username : </label>
                    <input value="<?php echo $_SESSION['admin_username']; ?>" type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>E-mail : </label>
                    <input value="<?php echo $_SESSION['admin_email']; ?>" type="email" name="email" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Edit</button>
            </form>
        <?php
    }
    else
    {
        $username = validate($_POST['username']);
        $email = validate($_POST['email']);
        
        if($username==NULL || $email==NULL)
        {
            output_msg("f","Error! Please fill all data.");
            redirect(2,"edit_account.php");
        }
        else
        {
            $sql = "UPDATE admin SET admin_username='$username', admin_email='$email' WHERE admin_id=$_SESSION[admin_id]";
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                $_SESSION['admin_username'] = $username;
                $_SESSION['admin_email'] = $email;
                
                output_msg("s","Account updated");
                redirect(2,"edit_account.php");
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