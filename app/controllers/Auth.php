<?php

class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';
        $this->view('auth/index', $data);
        if (isset($_POST['signin'])) {
            // $this->model('auth_model')->checkAdmin($_POST);
            if ($this->model('auth_model')->checkAdmin($_POST) > 0) {
                header('location: ' . BASEURL . 'index/');
                exit;
            } else {
                Alert::setAlert('add', 'Gagal!', $_SESSION['alert']['error'], 'error');
                header('location:' . BASEURL . 'auth/');
                exit;
            }
        }
    }
    public function register()
    {
        $data['title'] = 'Register';
        $this->view('auth/register', $data);
        if (isset($_POST['signup'])) {
            if ($this->model('auth_model')->insertAdmin($_POST) > 0) {
                Alert::setAlert('add', 'Berhasil!', 'Silahkan Login', 'success');
                header('location: ' . BASEURL . 'auth/');
                exit;
            } else {
                Alert::setAlert('add', 'Gagal!', $_SESSION['alert']['error'], 'error');
                header('location: ' . BASEURL . 'auth/');
                exit;
            }
        }
    }
}
