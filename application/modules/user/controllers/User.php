<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');

    }

    // view
    function index(){
    $this->load->view('v_login');
    }

      function logout(){
    session_destroy();
      redirect(site_url().'/user/login');
    }

    function login(){
      // periksa method
      // apabila post -> insert data, get -> halaman view
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $this->input->post('f_username');
        $password = $this->input->post('f_password');
        // echo sha1(md5($password));
        // die;
      $login = $this->M_user->auth($username,sha1(md5($password)));

        if (!$login) {
        $this->session->set_flashdata('msg', 'Username / password salah');
      $this->load->view('v_login');
        } else{
          $newdata = array(
                  'username'  => $login[0]['username'],
                  'tipe_user'  => $login[0]['tipe_user'],
                  'logged_in' => TRUE
          );
          //
          $this->session->set_userdata($newdata);
        redirect('dashboard');
        }
      }else{
        $this->load->view('v_login');
      }
    }
}
?>
