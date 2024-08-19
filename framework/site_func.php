<?php
    function enc_pass($password)
    {
        $password = md5($password);
        $password = substr($password,5,5);
        $password = sha1($password);
        $password = substr($password,7,5);
        
        return $password;
    }
    
    
    function validate($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        
        return $data;
    }
    
    
    
    function output_msg($status,$msg)
    {
        if($status=="s")
        {
            ?>
                <div class="alert alert-success">
                    <?php
                        echo $msg;
                    ?>
                </div>
            <?php
        }
        else
        {
            ?>
                <div class="alert alert-danger">
                    <?php
                        echo $msg;
                    ?>
                </div>
            <?php
        }
    }

    
    
    
    
    function redirect($sec,$url)
    {
        header("refresh:$sec;url=$url");
    }
    
    
    
    function get_page_name()
    {
        $page_url = $_SERVER['PHP_SELF'];
        $slash_pos = strrpos($page_url,"/");
        $page_name = substr($page_url,$slash_pos+1);
        
        return $page_name;
    }
    
    
    

?>