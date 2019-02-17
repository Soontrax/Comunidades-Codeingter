<body>

    <div class="container">

        <h2>Bienvenido  <?php
            echo $this->session->userdata('nombre');
            ?>
        </h2>

        <form action=" <?php echo base_url(); ?>index.php/cLogin/cerrarSesion" method="POST">
            <button class="btn btn-primary" type="submit">Cerrar Sesión</button>
        </form>
        
    </div>

</body>
</html>