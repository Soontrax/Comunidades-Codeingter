<body>

    <div class="container">
        <h2>Reset Password</h2>
        <form action=" <?php echo base_url(); ?>index.php/cLogin/forgotPassword" method="POST">

            <div class="form-group">
                <input type="password" name="pwd" class="form-control" placeholder="Put the password to change">
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>