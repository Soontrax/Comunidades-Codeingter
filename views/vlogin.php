<!DOCTYPE html>
<html>
    <head>
        <title>Login Usuario</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Formulario Login</h2>
            <form action=" <?php echo base_url(); ?>index.php/cLogin/login" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <input type="password" name="pwd" class="form-control" placeholder="Enter password">
                </div>

                <div class="d-flex justify-content-between">

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    <a href="<?php echo base_url(); ?>cLogin/ForgotPasswordview"><small>Forgot Password?</small></a>

                </div>
            </form>

        </div>

    </body>
</html>