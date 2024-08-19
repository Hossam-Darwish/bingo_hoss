    <?php
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template for Bootstrap</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
        
        <?php
             
             if(!isset($_POST['submit']))
            {
              ?>
            
                <form class="form-signin" method="post" action="">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="inputusername" class="sr-only">Username</label>
                        <input type="text" name="username" id="inputusername" class="form-control" placeholder="Username">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
                </form>
                
             <?php
            
            }
            else
            {
                $username = validate($_POST['username']);
                $password = validate($_POST['password']);
                
                if($username==NULL || $password==NULL)
                {
                    output_msg("f","Error! Please fill all data.");
                    redirect(2,"index.php");
                }
                else
                {
                    $password = enc_pass($password);
                    
                    $sql = "SELECT * FROM admin WHERE admin_username='$username' and admin_password='$password'";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            $row = mysqli_fetch_array($result);
                            
                            $_SESSION['admin_login'] = "yes";
                            $_SESSION['admin_id'] = $row['admin_id'];
                            $_SESSION['admin_username'] = $row['admin_username'];
                            $_SESSION['admin_email'] = $row['admin_email'];
                            
                            
                            output_msg("s","Welcome $username");
                            redirect(2,"index.php");
                        }
                        else
                        {
                            output_msg("f","Error! Wrong username or password");
                            redirect(2,"index.php");
                        }
                    }
                    else
                    {
                        
                        output_msg("f","Error! SQL Error.");
                    }
                    
                }
                
                
            }
            
           
            
            
        
        ?>
  </body>
</html>
