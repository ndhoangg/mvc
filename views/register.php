<!-- <?php
use app\core\Router;
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo Router::getAsset('css/register.css') ?>">
    <link rel="stylesheet" href="<?php echo Router::getAsset('css/alert.css') ?>">
    <link rel="stylesheet" href="<?php echo Router::getAsset('css/loading.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo Router::getAsset('javascript/register.js') ?>"></script>
    <title>Register</title>
      
</head>
<body>
<div id='alert-wrap' style='display:none'>
        <div id='alert'>
            <div id='alert-close' onclick="$('#alert-wrap').hide()">
                <span>x</span>
            </div>
            <div id='alert-content'>
                Invalid whatever
            </div>
            <div id='alert-button' onclick="$('#alert-wrap').hide()">
                OK
            </div>
        </div>
    </div>
    <div id='loading-wrap' style='position:fixed; height:100%; width:100%; overflow:hidden; top:0; left:0; display:none'>
        <div id='loading-message'>
            <div class='loader'>
            </div>
            <div class='message'>Loading, please wait</div>
        </div>
    </div>
 <div class = "container">
        <div class="left-container">
        <div class="box-wrap">
        <div class="logo">
            <img src="<?php echo Router::getAsset('image/logo.png') ?>" alt="">
        </div>

        <div class = "register-title">
            <h1>Sign Up</h1>
        </div>
        
        <div class="box">
        <form  method="post" role="form" action ="" >
       
    
        <div class="row">
            <div class="la-bel">Your Name</div>
    
            <div class="input">
            <input type="text"  name="name" id="" value="<?= $name ?>" placeholder="Your Name">
            

        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Email</div>
       
        <div class="input">
        <input type="text"  name="email" id="" value="" placeholder="Email">
             

        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Password</div>
       
        <div class="input">
        <input type="password" name="password" id="" value="" placeholder="Password">
            
        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Repeat Password</div>
       
        <div class="input"> 
        <input type="password" name="passwordconfirm" id="" value="" placeholder="Repeat Password">

        </div>
            
        </div>

        
        <div class = "submit">
        <button type="submit" class="button" id="submit-button">Sign up</button>
        </div>
       
        <div class="footer">

            <span>Or, login via single sign-on</span>

        </div>

    </form>
        </div>
    
    </div>
        </div>
   

    <div class="banner">
           <img src="<?php echo Router::getAsset('image/background.png') ?>" alt="">
    </div>
    </div>

    
</body>
</html>