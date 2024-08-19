<?php
include_once("../framework/site_func.php");
include_once("../framework/config.php");

$category_id = $_POST['category_id'];

$category_name = validate($_POST['category_name']);

 $sql = "UPDATE category SET category_name='$category_name' WHERE category_id=$category_id";
                    
$result = mysqli_query($con,$sql);

if($result)
{
    echo "yes";
}
else
{
    echo "no";
}

?>