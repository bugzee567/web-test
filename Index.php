 <?php
    include_once 'php/connection.php';
    if (isset($_POST['submit'])) {
        $err = "";
        $email = $_POST['email'];
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        //checks if email is valid
        if (!preg_match($regex, $email)) {
            $err = 'Please provide a valid e-mail address';
        }
        //checks if checkbox is checked
        if (!isset($_POST['checkbox'])) {
            $err = "You must accept the terms and conditions";
        }
        //checks for colombian email
        if (hasEnding($email, '.co')) {
            $err = "We are not accepting subscriptions from Colombia emails";
        }

        //checks if email is provided
        if (empty($email)) {
            $err = "Email address is required";
        }

        if ($err == "") {
            $query = "insert into email(email) values('$email')";

            $run = mysqli_query($conn, $query);
            if ($run && $err == "") {
                header("Location:../Success.html");
            }
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
     <script src="https://kit.fontawesome.com/be62be56a9.js" crossorigin="anonymous"></script>
 </head>

 <body>
     <div id="container">
         <div id="div-content">
             <header>
                 <img class="logo" src="img/logo_pineapple_desk.svg" alt="desktop logo">
                 <div class=small-header-logo> <img src="img/logo_pineapple_mob.svg" alt="mobile logo" /> </div>
                 <nav>
                     <ul class="nav_links">
                         <li><a href="#">About</a></li>
                         <li><a href="#">How it works</a></li>
                         <li><a href="#">Contact</a></li>
                 </nav>
             </header>
         </div>
         <div id="div-bg">
             <img src="img/image_summer-desk.png" alt="" id="bg">
         </div>
         <div id="subscribe">
             <h1 id="subscribe-heading">Subscribe to newsletter</h1>
             <p id="subscribe-paragraph">Subscribe to our newsletter to get 10% discount on pineapple glasses</p>
             <form method="post">
                 <label id="email-field">
                     <input type="email" name="email" placeholder="Type your email address here" id="email">
                     <button onClcik="emailValidation()" name="submit" id="button"><i class="fas fa-arrow-right"></i></button>
                 </label>
                 <span id="message"><?php echo $err ?></span>
                 <div>
                     <label id="TOS" for="TOS"><input type="checkbox" id="check" name="checkbox">I agree to&nbsp;<a href="#">terms of service</a></label>
                 </div>
             </form>
             <br>
             <br>
             <hr>
             <div id="icons">
                 <a class="rounded-button fb" href="#"><i class="fab fa-facebook-f"></i></a>
                 <a class="rounded-button ig" href="#"><i class="fab fa-instagram"></i></a>
                 <a class="rounded-button tw" href="#"><i class="fab fa-twitter"></i></a>
                 <a class="rounded-button yt" href="#"><i class="fab fa-youtube"></i></a>
             </div>
         </div>
     </div>
     <script type="text/javascript" src="js/app.js"></script>
 </body>

 </html>