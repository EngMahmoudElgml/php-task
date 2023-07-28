<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="../Public/bootstrap.css" rel="stylesheet" >
</head>
<body>

<div class="container-fluid">
    <h1 class="text-center">
        Registration Form
    </h1>
</div>

<?php
$success = $_SESSION['success'] ?? '';
if ($success) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>



<?php
$errors = $_SESSION['errors'] ?? [];
if (count($errors) > 0) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="alert alert-danger" role="alert">
                    <?php
                    foreach ($errors as $error) {
                        echo $error . '<br>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<div class="container">
    <div class="row">
        <form action="../Actions/register.php" method="post">
            <div class="col-8 offset-2">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Mahmoud Ahmed">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Your Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="*******">
                </div>

                <div class="mb-3">
                     <input type="submit"  class="btn btn-primary" value="Register" >
                </div>
            </div>
        </form>

    </div>
</div>
<script src="../Public/bootstrap.js" ></script>
</body>
</html>