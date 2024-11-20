<?php
session_start();
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId, Password FROM tblusers WHERE EmailId=:email AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="myModalLabel" style="color:black">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="email" style="color:black">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" style="color:black">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn">
                                    <i class="fa fa-eye" id="showPasswordIcon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="signin" class="btn btn-primary btn-block" style="background: linear-gradient(to right, blue, green); border: none;">SIGN IN</button>
                    <h4 class="text-center my-1"><a href="forgot-password.php" style="font-size: 14px;">Forgot password?</a></h4>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p class="mb-0" style="font-size: 12px; text-align: center;">
                    By logging in you agree to our 
                    <a href="page.php?type=terms">Terms and Conditions</a> and 
                    <a href="page.php?type=privacy">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Add this script at the end of your HTML before the closing body tag -->
<script>
    document.getElementById('showPasswordBtn').onclick = function() {
        const passwordInput = document.getElementById('password');
        const showPasswordIcon = document.getElementById('showPasswordIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showPasswordIcon.classList.remove('fa-eye');
            showPasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            showPasswordIcon.classList.remove('fa-eye-slash');
            showPasswordIcon.classList.add('fa-eye');
        }
    }
</script>

<!-- Include Font Awesome for eye icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f7f7f7; /* Light background for contrast */
    }
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .modal-header {
        border-bottom: none;
    }
    .modal-footer {
        border-top: none;
    }
    .form-control {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
        border-color: green;
    }
    .btn-primary {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(to right, green, blue);
        color: white;
    }
    .text-center {
        text-align: center;
    }
</style>
