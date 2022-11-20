<?php 
//get the file path
$file = basename($_SERVER['PHP_SELF']);

//remove the file extension from the file name
$filename = basename($file,".php");

//capitalise first letter
$title =  ucfirst($filename);

//display the page title
echo "<title>Tech Gadget - $title Page</title>"; 

session_start();
error_reporting(0);
include ('database/config.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $FirstName=$_POST['firstName'];
    $LastName=$_POST['lastName'];
    $Email=$_POST['email'];
    $Password=md5($_POST['password']);
    $Phone=$_POST['phone'];
    $BirthDate=$_POST['birthday'];

    // check if email or username is already registered
	$check = mysqli_query($con, "SELECT * FROM customer WHERE Email='$Email' OR username='$username'");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('This email or username is taken, please login or try another one');</script>";
    } else {
        $query=mysqli_query($con,"INSERT INTO customer(username,FirstName,LastName,Email,Password,Phone,BirthDate) values('$username','$FirstName','$LastName','$Email','$Password','$Phone','$BirthDate')");

        if($query)
        {
            echo "<script>alert('Successfully register! ');</script>";
            header('Location: login.php?register=success');
        } else {
            echo "<script>alert('Not register, please try again');</script>";
        }
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS -->
    <link rel="stylesheet" href="page.css">

    <!-- Title Icon -->
    <link rel="icon" href="assets/logo_free-file.png" type="image/png">
</head>

<body>
    <main>
        <div class='start'>
            <div class='container'>
                <div class='row'>
                    <div class='col text-center'>
                        <form action='register.php' method='post' enctype='multipart'>
                            <h1 class='title'>Register</h1>

                            <p class="validation-feedback text-danger" hidden></p>
                            <div class="text_field">
                                <input type="text" id="username" name="username" autocomplete="user-name" required autofocus>
                                <span></span>
                                <label>Username</label>
                            </div>

                            <div class="text_field">
                                <input type="text" id="firstname" name="firstName" autocomplete="first-name" required autofocus>
                                <span></span>
                                <label>First Name</label>
                            </div>

                            <div class="text_field">
                                <input type="text" id="lastname" name="lastName" autocomplete="last-name"required>
                                <span></span>
                                <label>Last Name</label>
                            </div>

                            <div class="text_field">
                                <input type="email" id="email" name="email" autocomplete="e-mail" required>
                                <span></span>
                                <label>Email</label>
                            </div>

                            <div class="text_field">
                                <input type="password" id="password" name="password" autocomplete="new-password" required>
                                <span></span>
                                <label>Password</label>
                            </div>

                            <div class="text_field">
                                <input type="tel" id="phone" name="phone" autocomplete="contact-num" required>
                                <span></span>
                                <label>Phone Number</label>
                            </div>

                            <div class="text_date">
                                <label>Birthday Date</label> 
                                <input type="date"  id="birthday" name="birthday" autocomplete="birth-day" required>
                            </div>

                            <input type="submit" name="submit" class="button-1" value="Sign Up">
                        </form>

                        <div class="signBtn">
                            Already have account?
                            <a href='login.php' class="text-purple text-decoration-none fw-bold"> Sign In</a>
                        </div>

                    </div>
                </div>
            </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>