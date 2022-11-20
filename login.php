<?php
//get the file path
$file = basename($_SERVER['PHP_SELF']);

//remove the file extension from the file name
$filename = basename($file,".php");

//capitalise first letter
$title =  ucfirst($filename);

//display the page title
echo "<title>Tech Gadget - $title Page</title>"; 

include ('database/config.php');

// Code for User login
if(isset($_POST['login'])){
   $Email=$_POST['email'];
   $Password=md5($_POST['password']);
   $result=mysqli_query($con,"SELECT * FROM customer WHERE Email='$Email' and Password='$Password'");
   //$number=mysqli_fetch_array($result);
   $row = mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result) > 0)
    {
        $extra="Home.php";
        $_SESSION['login']=$_POST['email'];
        $_SESSION['id']=$row['CustomerID'];
        $_SESSION['username']=$row['username'];
        $uip=$_SERVER['REMOTE_ADDR'];
        
        $_SESSION['status'] = "Login Successfully";
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
else
    {
        $extra="login.php";
        $email=$_POST['email'];
        $uip=$_SERVER['REMOTE_ADDR'];
        $_SESSION['status'] = "Login Fail";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Icon -->
    <link rel="icon" href="assets/logo_free-file.png" type="image/png">

    <!----CSS--->
    <link rel="stylesheet" href="page.css" />

    <!-- Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class='login'>
        <div class="all">
            <div class="me-container">
                <div class="row ">
                    <div class="col text-center mx-auto">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <h1 class='title'>Sign In</h1>

                            <p class="validation-feedback text-danger" hidden></p>
                            <div class="text_field_login">
                                <input type="email" id="email" name="email" required autofocus>
                                <span></span>
                                <label>Email</label>
                            </div>

                            <div class="text_field_login">
                                <input type="password" id="password" name="password" autocomplete="new-password"
                                    required>
                                <span></span>
                                <label>Password</label>
                            </div>

                            <input type="submit" name="login" class="button-1" value="Sign In">

                        </form>    
                        <?php                             
                            if(isset($_SESSION['status']))
                            {
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hey !</strong> <?= $_SESSION['status']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php 
                                unset($_SESSION['status']);
                            }

                        ?>   

                        <div class="signBtn">
                            Not a member?
                            <a href="register.php" class="text-purple text-decoration-none fw-bold"> Sign Up </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>