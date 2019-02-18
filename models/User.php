<?php

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function guardar($post) {
        $campos = array(
            'email' => $post['email'],
            'nombre' => $post['nombre'],
            'dni' => $post['dni'],
            'password' => $post['password'],
        );

        $this->db->insert('propietario', $campos);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {

        $this->db->select('nombre', 'email', 'password');
        $this->db->from('propietario');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $resultado = $this->db->get();

        if ($resultado->num_rows() == 1) {
            $registro = $resultado->row();

            //Le decimos a codeingter que inicie session con los valores que hay en la array.
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('nombre', $registro->nombre);
            //Con esto generamos una tabla de las comunidades
            $this->load->library('table');

            $query = $this->db->query('SELECT * FROM propietario');
            //$this->table->add_row('Fred', '<strong>Blue</strong>', 'Small');

            echo $this->table->generate($query);

            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($pwd_old, $pwd_new) {
        $this->db->select('email', 'password');
        $this->db->from('propietario');
        $this->db->where('password', $pwd_old);

        $resultado = $this->db->get();

        if ($resultado->num_rows() == 1) {
            $this->db->query("UPDATE propietario SET password = '$pwd_new' WHERE email = (SELECT email WHERE password = '$pwd_old')");
            return true;
        } else {
            return false;
        }
    }

    public function forgotPassword($email) {
        $this->db->select('email');
        $this->db->from('propietario');
        $this->db->where('email', $email);

        $resultado = $this->db->get();

        if ($resultado->num_rows() == 1) {

            $token = rand(1000, 9999);

            $message = "<h2>Please click on password reset link</h2> <br> <a href = ''></a>";
            //$this->db->query("UPDATE propietario SET password = '$pwd_new' WHERE email = (SELECT email WHERE password = '$pwd_old')");
            return true;
        } else {
            return false;
        }
    }

}
