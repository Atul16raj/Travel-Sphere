<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Management System</title>
    
    <!-- In-page Bootstrap and Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Additional Styles */
        body {
            font-family: Arial, sans-serif;
        }
        .top-header {
            background-color: #007bff; /* Background color for the header */
            color: white; /* Text color */
        }
        .top-header a {
            color: Black;
            text-decoration: none;
        }
        /* .top-header a:hover {
            text-decoration: underline;
        } */
        .header {
            background-color: #4CAF50; /* Header background */
            color: white;
            padding: 20px 0;
        }
        .footer-btm {
            background-color: #343a40; /* Footer background */
            padding: 10px 0;
        }
        .footer-btm a {
            color: #fff;
        }
        .footer-btm a:hover {
            color: #ddd;
        }
        .securetxt {
            display: inline-block;
            margin-left: 10px;
            font-weight: bold;
        }
        .clearfix {
            clear: both;
        }
        /* Custom styles for changes */
        .top-header .tol {
            font-size: 14px; /* Slightly larger font size */
        }
        .top-header .sigi {
            margin-left: 20px; /* Space between toll number and Sign Up/Sign In links */
        }
        .header {
            background-color: white; /* White background for the header */
        }
        .navbar-nav .nav-link:hover {
            color: #f8f9fa; /* Dark white on hover */
        }
        /* Flex container for Sign Up and Sign In */
        .auth-links {
            display: flex;
            justify-content: space-around; /* Equal spacing */
            align-items: center; /* Center alignment */
            margin-left: 20px; /* Margin to separate from the toll number */
        }
    </style>
</head>
<body>

<?php if ($_SESSION['login']) { ?>
    <div class="top-header py-2">
        <div class="container">
            <ul class="tp-hd-lft d-flex justify-content-start">
                <li class="prnt"><a href="index.php"><i class="fa fa-home"></i></a></li>
                <li class="prnt"><a href="profile.php">My Profile</a></li>
                <li class="prnt"><a href="change-password.php">Change Password</a></li>
                <li class="prnt"><a href="tour-history.php">My Tour History</a></li>
                <li class="prnt"><a href="issuetickets.php">Raised Tickets</a></li>
            </ul>
            <ul class="tp-hd-rgt d-flex justify-content-end">
                <li class="tol">Welcome :</li>
                <li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
                <li class="sigi"><a href="logout.php">/ Logout</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } else { ?>
    <div class="top-header py-2">
        <div class="container">
            <ul class="tp-hd-lft d-flex justify-content-start">
                <li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
                <li class="hm"><a href="admin/index.php">Admin Login</a></li>
            </ul>
            <ul class="tp-hd-rgt d-flex justify-content-end align-items-center">
                <li class="tol pr-4">Toll Number : 0000000001</li>
                <div class="auth-links">
                    <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                    <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">Sign In</a></li>
                </div>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } ?>

<!-- Header -->
<div class="header py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php" class="navbar-brand text-dark">Travel <span>Sphere</span></a>
        </div>
        <div class="lock d-flex align-items-center">
            <i class="fa fa-lock"></i>
            <div class="securetxt">SAFE &amp; SECURE</div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Footer Navigation -->
<div class="footer-btm py-2">
    <div class="container">
        <div class="navigation">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="page.php?type=aboutus" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="package-list.php" class="nav-link">Tour Packages</a></li>
                        <li class="nav-item"><a href="page.php?type=privacy" class="nav-link">Privacy Policy</a></li>
                        <li class="nav-item"><a href="page.php?type=terms" class="nav-link">Terms of Use</a></li>
                        <li class="nav-item"><a href="page.php?type=contact" class="nav-link">Contact Us</a></li>
                        <?php if ($_SESSION['login']) { ?>
                            <li class="nav-item"><a href="#" data-toggle="modal" data-target="#myModal3" class="nav-link">Need Help? / Write Us</a></li>
                        <?php } else { ?>
                            <li class="nav-item"><a href="enquiry.php" class="nav-link">Enquiry</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- In-page JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
