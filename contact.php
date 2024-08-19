<?php

include_once("header.php");
?>
   <div class="container-contact100">
        <div class="wrap-contact100">
           <?php
            if(!isset($_POST['submit']))
            {
                ?>
                    <form method="post" action="">
                        <span class="contact100-form-title">
                           Get in Touch
                        </span>
                        <div class="wrap-input100">
                           <input class="input100" id="name" type="text" name="name" placeholder="Name">
                           <label class="label-input100" for="name">
                              <span class="lnr lnr-user"></span>
                           </label>
                        </div>
                        <div class="wrap-input100">
                           <input class="input100" id="email" type="text" name="email" placeholder="Email">
                           <label class="label-input100" for="email">
                              <span class="lnr lnr-envelope"></span>
                           </label>
                        </div>
                        <div class="wrap-input100">
                           <input class="input100" id="phone" type="text" name="phone" placeholder="Phone">
                           <label class="label-input100" for="phone">
                              <span class="lnr lnr-phone-handset"></span>
                           </label>
                        </div>
                        <div class="wrap-input100">
                           <textarea class="input100" name="message" placeholder="Your message..."></textarea>
                        </div>
                        <div class="text-center">
                           <button class="btn btn-danger" type="submit" name="submit">
                           <span class="glyphicon glyphicon-send"></span>
                           </button>
                        </div>
                     </form>
                <?php
            }
            else
            {
                $name = validate($_POST['name']);
                $email = validate($_POST['email']);
                $phone = validate($_POST['phone']);
                $msg = validate($_POST['message']);
                
                
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                
                $to = "hossamd512@gmail.com";
                $subject = "Message From $name";
                
                $msg = "<b>Name is :</b> $name <br>
                        <b>E-mail is :</b> $email <br>
                        <b>Phone is :</b> $phone <br>
                        <b>Message :</b> $msg";
                        
                if(mail($to,$subject,$msg,$headers))
                {
                    output_msg("s","E-mail Sent");
                    redirect(2,"contact.php");
                }
                else
                {
                    output_msg("f","Unexpected Error");
                }
            }
           ?>
        </div>
     </div>
<?php
include_once("footer.php");
?>