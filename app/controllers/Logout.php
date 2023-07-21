<?php

class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION['username']);
        unset($_SESSION['login']);
        session_destroy();
        header('location: ' . BASEURL . 'auth/index');
    }
}
