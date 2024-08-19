<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");



if(isset($_SESSION['admin_login']))
{
    include_once("header.php");
    
    ?>
    <h3 class="bg-primary" style="padding: 1%;border-radius: 5px;margin-bottom: 40px;">
        View admins
    </h3>
    <?php
    
    
    $sql = "SELECT * FROM admin";
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
                            <th>Username</th>
                            <th>Password</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                                    <tr>
                                        <td><?php echo $row['admin_id']; ?></td>
                                        <td><?php echo $row['admin_username']; ?></td>
                                        <td>**********</td>
                                        <td><?php echo $row['admin_email']; ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }
        else
        {
            output_msg("f","There is no data");
            redirect(2,"add_admin.php");
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