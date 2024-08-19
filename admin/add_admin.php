<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        Add admin
    </h3>
    <?php
    
    if(!isset($_POST['submit']))
    {
        ?>
            <form method="post" action="">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">
                    Add
                </button>
            </form>
        <?php
    }
    else
    {
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $email    = validate($_POST['email']);
        
        
        if($username==NULL || $password==NULL || $email==NULL)
        {
            output_msg("f","Error! Please fill all data");
            redirect(2,"add_admin.php");
        }
        else
        {
            $password = enc_pass($password);
            
            $sql = "INSERT INTO admin VALUES(NULL,'$username','$password','$email')";
            $result = mysqli_query($con,$sql);
            
            if($result)
            {
                output_msg("s","Addmin added");
                redirect(2,"view_admin.php");
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