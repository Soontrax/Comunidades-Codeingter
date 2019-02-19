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
            $this->load->view('head');
            $this->load->view('vindex');
        } else {
            echo 'contraseña incorrecta';
            $this->load->view('vlogin');
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        $this->load->view('vlogin');
        echo "Sesion cerrada correctamente";
    }

    public function changePasswordview() {
        $this->load->view('head');
        $this->load->view('body_password');
    }

    public function ForgotPasswordview() {
        $this->load->view('head');
        $this->load->view('password_forgot');
    }

    public function changePassword() {
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

    public function forgotPassword() {
        $email = $this->input->post('email');

        $confirm = $this->User->forgotPassword($email);
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
