<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    $issue = $_POST['issue'];
    $description = $_POST['description'];
    $email = $_SESSION['login'];
    $sql = "INSERT INTO tblissues(UserEmail, Issue, Description) VALUES(:email, :issue, :description)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':issue', $issue, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['msg'] = "Info successfully submitted.";
        echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
    } else {
        $_SESSION['msg'] = "Something went wrong. Please try again.";
        echo "<script type='text/javascript'> document.location = 'thankyou.php'; </script>";
    }
}
?>

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black; font-weight: bold;">How Can We Help You?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="help" method="post">
                    <div class="form-group">
                        <label for="issue" style="color: black; font-weight: 600;">Select Issue</label>
                        <select id="issue" name="issue" class="form-control" required>
                            <option value="">Select Issue</option>
                            <option value="Booking Issues">Booking Issues</option>
                            <option value="Cancellation">Cancellation</option>
                            <option value="Refund">Refund</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description" style="color: black; font-weight: 600;">Description</label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="Brief description" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap CSS (if not already included) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include jQuery and Bootstrap JS (if not already included) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
