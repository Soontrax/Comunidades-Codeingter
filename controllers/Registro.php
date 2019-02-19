<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Propietario
 *
 * @author Alvaro
 */
class Registro extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model('User');
    }

    public function index() {
        $this->load->view('head');
        $this->load->view('body_register');
    }

    public function guardar() {
        $post['email'] = $this->input->post('email');
        $post['nombre'] = $this->input->post('nombre');
        $post['dni'] = $this->input->post('dni');
        $post['password'] = password_hash($this->input->post('pwd'), PASSWORD_BCRYPT);

        //Llamamos al metodo de la BBDD para enviarlo al modelo.
        $result = $this->User->guardar($post);

        if ($result == true) {
            $this->load->view('head');
            $this->load->view('body_register');
            echo "datos insertados correctamente";
        } else {
            $this->load->view('head');
            $this->load->view('body_register');
            echo "datos insertados de forma erronea";
        }
    }

}
