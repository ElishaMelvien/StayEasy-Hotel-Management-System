<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/flash.css">
    <title>SINAMU LODGE</title>
</head>
<body>
    <!--  carousel -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./image/hos1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hos2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hos5.jpg">
            </div>
        </div>
    </section>
    <!-- main section -->
    <section id="auth_section">
        <div class="logo">
            <p>SINAMU LODGE</p>
        </div>
        <div class="auth_container">
            <div id="Log_in">
                <h2>Log In</h2>
                <div class="role_btn">
                    <div class="btns active">User</div>
                    <div class="btns">Staff</div>
                </div>
                <!-- User login -->
                <?php 
                if (isset($_POST['user_login_submit'])) {
                    
                    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
                    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

                    if (empty($Email) || empty($Password)) {
                        echo "<script>swal({
                            title: 'Email and Password cannot be empty!',
                            icon: 'error',
                        });
                        </script>";
                    } 
                    
                    elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                        echo "<script>swal({
                            title: 'Invalid Email format!',
                            icon: 'error',
                        });
                        </script>";
                    } 
                    
                    elseif (strlen($Password) < 8) {
                        echo "<script>swal({
                            title: 'Password must be at least 8 characters long!',
                            icon: 'error',
                        });
                        </script>";
                    } 
                    else {
                        $sql = "SELECT * FROM users WHERE Email = '$Email'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            $user = mysqli_fetch_assoc($result);
                            $hashedPassword = $user['Password'];

                            if (password_verify($Password, $hashedPassword)) {
                                $_SESSION['usermail'] = $Email;
                                $_SESSION['user_id'] = $user['id'];
                                header("Location: home.php");
                        
                            } else {
                               
                                echo "<script>swal({
                                    title: 'Incorrect Email or Password!',
                                    icon: 'error',
                                });
                                </script>";
                            }
                        } else {
                            
                            echo "<script>swal({
                                title: 'Incorrect Email or Password!',
                                icon: 'error',
                            });
                            </script>";
                        }
                    }
                }
                ?>
                <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type ="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <button type="submit" name="user_login_submit" class="auth_btn">Log in</button>

                    <div class="footer_line">
                        <h6>Don't have an account? <span class="page_move_btn" onclick="signuppage()">sign up</span></h6>
                    </div>
                </form>
                
                <!-------- Admin login ----------->
                <?php
                if (isset($_POST['submit'])) {
                    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
                    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

                    if (empty($Email) || empty($Password)) {
                        echo "<script>swal({
                            title: 'Email and Password cannot be empty!',
                            icon: 'error',
                        });</script>";
                    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                        echo "<script>swal({
                            title: 'Invalid Email format!',
                            icon: 'error',
                        });</script>";
                    } elseif (strlen($Password) < 8) {
                        echo "<script>swal({
                            title: 'Password must be at least 8 characters long!',
                            icon: 'error',
                        });</script>";
                    } else {
                        $sql = "SELECT * FROM admin WHERE Email = '$Email'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            $user = mysqli_fetch_assoc($result);
                            $hashedPassword = $user['Password'];

                            if (password_verify($Password, $hashedPassword)) {
                                $_SESSION['usermail'] = $Email;
                                header("Location: admin/admin.php");
                                exit; 
                            } else {
                                echo "<script>swal({
                                    title: 'Incorrect Email or Password!',
                                    icon: 'error',
                                });</script>";
                            }
                        } else {
                            echo "<script>swal({
                                title: 'Incorrect Email or Password!',
                                icon: 'error',
                            });</script>";
                        }
                    }
                }
                ?>

            <form class="employee_login authsection" id="employeelogin" action="" method="POST">
                <div class="form-floating">
                    <input type="email" class="form-control" name="Email" placeholder="">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="Password" placeholder="">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="submit" class="auth_btn">Log in</button>
            </form>
        </div>

            <!------------------- user signup ---------------->
            <?php
            include 'config.php';
            if (isset($_POST['user_signup_submit'])) {
            $Username = mysqli_real_escape_string($conn, $_POST['Username']);
            $Email = mysqli_real_escape_string($conn, $_POST['Email']);
            $Password = mysqli_real_escape_string($conn, $_POST['Password']);
            $ConfirmPassword = mysqli_real_escape_string($conn, $_POST['ConfirmPassword']);

            if (empty($Email) || empty($Password) || empty($ConfirmPassword)) {
            echo "<script>swal({
                title: 'All fields are required!',
                icon: 'error', 
            });
            </script>";
            } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>swal({
                title: 'Invalid Email format!',
                icon: 'error',
            });
            </script>";
            } elseif ($Password !== $ConfirmPassword) {
            echo "<script>swal({
                title: 'Passwords do not match!',
                icon: 'error',
            });
            </script>";
            }
            elseif (strlen($Password) < 8) {
                echo "<script>swal({
                    title: 'Password must be at least 8 characters long!',
                    icon: 'error',
                });
                </script>";
            } 
             else {
            $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
            $checkEmailSql = "SELECT * FROM users WHERE Email = '$Email'";
            $checkResult = mysqli_query($conn, $checkEmailSql);

            if (mysqli_num_rows($checkResult) > 0) {
                echo "<script>swal({
                    title: 'Email is already in use!',
                    icon: 'error',
                });
                </script>";
            } else {
                $sql = "INSERT INTO users (Username, Email, Password) VALUES ('$Username','$Email', '$hashedPassword')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>swal({
                        title: 'Registration successful!',
                        icon: 'success',
                    }).then(function() {
                        window.location.href = 'index.php';
                    });
                    </script>";
                } else {
                    echo "<script>swal({
                        title: 'Something went wrong, please try again.',
                        icon: 'error',
                    });
                    </script>";
                }
            }
            }
            }
            ?>
            <div id="sign_up">
                <h2>Sign Up</h2>
                <form class="user_signup" id="usersignup" action="" method="POST" style="display: none;">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder="username">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="ConfirmPassword" placeholder=" ">
                        <label for="ConfirmPassword">Confirm Password</label>
                    </div>
                    <button type="submit" name="user_signup_submit" class="auth_btn">Sign up</button>
                    <div class="footer_line">
                        <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span></h6>
                    </div>
                </form>
            </div>
    </section>
</body>
<script src="./javascript/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</html>

