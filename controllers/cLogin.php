<?php

class cLogin extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('User');
    }

    public function index() {
        $this->load->view('vlogin');
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('pwd');

        //Llamamos al metodo de la BBDD para enviarlo al modelo.
        $existe = $this->User->login($email, $password);

        if ($existe == true) {
            $success['mensaje'] = "<div class='alert alert-success' role='alert'>
                Te has logueado correctamente
            </div>";

            $this->load->view('head');
            $this->load->view('vindex');
        } else {
            $failed['mensaje'] = "<div class='alert alert-danger' role='alert'>
                El usuario o contraseña no son correctos
            </div>";
            /* echo "<div class='alert alert-danger' role='alert'>
              El usuario o contraseña no son correctos
              </div>"; */

            $this->load->view('vlogin', $failed);
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        $this->load->view('vlogin');
        echo "Sesion cerrada correctamente";
    }

    public function forgotPasswordview() {
        $this->load->view('head');
        $this->load->view('body_password');
    }

    public function forgotPassword() {
        $pwd_old = $this->input->post('pwd_old');
        $pwd_new = $this->input->post('pwd_new');

        $confirm = $this->User->resetPassword($pwd_old, $pwd_new);

        if ($confirm == true) {
            $this->load->view('vlogin');
            echo "contraseña cambiada correctamente";
        } else {
            $this->load->view('head');
            $this->load->view('body_password');
            echo 'contraseña erronea no se cambio FALLO';
        }
    }

}
