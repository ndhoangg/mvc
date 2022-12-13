
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/register.css">
</head>
<body>
 <div class = "container">
        <div class="left-container">
        <div class="box-wrap">
        <div class="logo">
            <img src="https://share-gcdn.basecdn.net/brand/logo.full.png" alt="">
        </div>

        <div class = "register-title">
            <h1>Sign Up</h1>
        </div>
        
        <div class="box">
        <form  method="post" role="form" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
       
    
        <div class="row">
            <div class="la-bel">Your Name</div>
    
            <div class="input">
            <input type="text"  name="name" id="" value="<?= $name; ?>" placeholder="Your Name">
              <span class = "error"><?= $nameErr; ?></span>  

        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Email</div>
       
        <div class="input">
        <input type="text"  name="email" id="" value="<?= $email; ?>" placeholder="Email">
              <span class = "error"><?= $emailErr; ?></span> 

        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Password</div>
       
        <div class="input">
        <input type="password" name="password" id="" value="<?= $password; ?>" placeholder="Password">
              <span class = "error"><?= $passwordErr; ?></span>  
        </div>
            
        </div>

        <div class="row">
        <div class="la-bel">Repeat Password</div>
       
        <div class="input"> 
        <input type="password" name="repeatpassword" id="" value="<?= $repeatpassword; ?>" placeholder="Repeat Password">

        </div>
            
        </div>

        
        <div class = "submit">
        <button type="submit" class="button">Sign up</button>
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