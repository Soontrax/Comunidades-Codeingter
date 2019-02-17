<body>

    <div class="container">
        <h2>Formulario Registro</h2>
        <form action=" <?php echo base_url(); ?>index.php/Registro/guardar" method="POST">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Enter name">
            </div>

            <div class="form-group">
                <input type="text" name="dni" class="form-control" placeholder="Enter dni">
            </div>

            <div class="form-group">
                <input type="password" name="pwd" class="form-control" placeholder="Enter password">
            </div>

            <div class="d-flex justify-content-between">


                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                <a href="<?php echo base_url(); ?>cLogin"><small>Ya tienes una cuenta entra aquí</small></a>

            </div>
        </form>
    </div>

</body>
</html>