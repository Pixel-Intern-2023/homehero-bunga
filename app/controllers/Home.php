<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['countEmployee'] = $this->model('Employee_model')->countEmployee();
        $data['countFiredEmployee'] = $this->model('Employee_model')->countFiredEmployee();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
