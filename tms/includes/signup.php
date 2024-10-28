<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mnumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO tblusers(FullName, MobileNumber, EmailId, Password) VALUES(:fname, :mnumber, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['msg'] = "You are successfully registered. Now you can login.";
        header('location:thankyou.php');
    } else {
        $_SESSION['msg'] = "Something went wrong. Please try again.";
        header('location:thankyou.php');
    }
}
?>

<!-- Javascript for checking email availability -->
<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}
</script>

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="myModalLabel">Create Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="signup" method="post">
                    <div class="form-group">
                        <label for="fname">Full Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="Full Name" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="mobilenumber">Mobile Number</label>
                        <input type="text" class="form-control" name="mobilenumber" maxlength="10" placeholder="Mobile Number" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" onBlur="checkAvailability()" required autocomplete="off">
                        <span id="user-availability-status" style="font-size: 12px;"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block" style="background: linear-gradient(to right, #007bff, #28a745); border: none;">CREATE ACCOUNT</button>
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="mb-0" style="font-size: 12px; width: 100%; color: #6c757d;">By signing up, you agree to our <a href="page.php?type=terms" style="color: #007bff;">Terms and Conditions</a> and <a href="page.php?type=privacy" style="color: #007bff;">Privacy Policy</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- Include Font Awesome for icons -->
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
        background-color: #ffffff; /* White background for modal */
    }
    .modal-header {
        border-bottom: none;
    }
    .modal-footer {
        border-top: none;
    }
    .form-group label {
        font-weight: 500; /* Slightly bold labels */
    }
    .form-control {
        border-radius: 8px;
        transition: all 0.3s ease;
        background-color: #f8f9fa; /* Light grey input background */
        border: 1px solid #ced4da; /* Border color */
    }
    .form-control:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Blue focus effect */
        border-color: #007bff; /* Change border color on focus */
    }
    .btn-primary {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background: linear-gradient(to right, #28a745, #007bff); /* Green to blue gradient on hover */
        color: white;
    }
    .text-center {
        text-align: center;
    }
    .modal-footer p {
        color: #6c757d; /* Muted text color */
        margin-bottom: 0; /* No margin for footer text */
    }
</style>
