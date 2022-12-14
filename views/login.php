<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="../public/css/alert.css">
    <link rel="stylesheet" href="../public/css/loading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../public/javascript/login.js"></script>
    <title>Login</title>
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
            <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="">
        </div>
        
        <div class="box">
        <form  method="post" role="form" >
        <h1>Login</h1>
        <div class="sub-title">Welcome back. Login to start working</div>
    
        <div class="row">
            <div class="la-bel">Email</div>
    
            <div class="input">
            <input type="text"  name="email" id="" value="<?= isset($_COOKIE['email'])?$_COOKIE['email']:"" ?>" placeholder="Your email" size="20">
        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Password</div>
       
        <div class="input">
        <input type="password"  name="password" id="" value="<?= isset($_COOKIE['password'])?$_COOKIE['password']:"" ?>" placeholder="Your password" size="20">
        </div>
            
        </div>

        <?php  if (isset($_GET['error'])) { ?>
            <p class = "error"> <?php echo $_GET['error'];  ?> </p>
        <?php } ?>
            
        <div class="remmember-me">
        
            <input <?= isset($_COOKIE['check'])?$_COOKIE['check']:"" ?> type="checkbox" name="remember" id="" value = "1">
            <label for="remember">Keep me logged in</label>
            
            <a href="register.php">Đăng ký</a>

        </div>
        
        <div class = "submit">
        <button type="submit" class="button" id="form-submit">Log in to start working</button>
        </div>
        
       
        <div class="footer">

            <span>Or, login via single sign-on</span>

        </div>

    </form>
    
        </div>
    
    </div>
        </div>
   

    <div class="banner">
           <img src="https://static-gcdn.basecdn.net/account/image/background.png" alt="">
    </div>
    </div>
   
    
</body>
</html>


