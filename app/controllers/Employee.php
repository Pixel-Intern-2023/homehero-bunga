<?php

class Employee extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Employee';
        $data['employee'] = $this->model('Employee_model')->getAllEmployee();
        $data['occupation'] = $this->model('Employee_model')->getOccupation();
        $this->view('templates/header', $data);
        $this->view('employee/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Employee';
        $data['employee'] = $this->model('Employee_model')->getEmployeeById($id);
        $data['occupation'] = $this->model('Employee_model')->getOccupation();
        $this->view('templates/header', $data);
        $this->view('employee/detail', $data);
        $this->view('templates/footer');
    }
    public function add()
    {
        if ($this->model('Employee_model')->AddEmployee($_POST) > 0) {
            Alert::setAlert('add', 'Berhasil', 'Data added successfully', 'success');
            header('location:' . BASEURL . 'employee/');
            exit;
        } else {
            Alert::setAlert('add', 'Gagal', 'data failed to add', 'error');
            header('location:' . BASEURL . 'employee/');
            exit;
        }
    }
    public function delete($id)
    {

        if ($this->model('Employee_model')->delete($id) > 0) {
            Alert::setAlert('add', 'Success', 'Data successfully deleted!', 'success');
            header('location:' . BASEURL . 'employee/');
            exit;
        } else {
            Alert::setAlert('add', 'Failed', 'Failed to Delete!', 'error');
            header('location:' . BASEURL . 'employee/');
            exit;
        }
    }
    public function status($id)
    {
        if ($this->model('Employee_model')->statusEmployee($_POST, $id) > 0) {
            Alert::setAlert('add', 'Success', 'Employee Status Changed Successfully', 'success');
            header('location:' . BASEURL . 'employee/detail/' . $id);
        } else {
            Alert::setAlert('add', 'Failed', 'Employee Status failed to Change!', 'error');
            header('location:' . BASEURL . 'employee/detail/' . $id);
        }
    }
    public function edit($id)
    {
        if ($this->model('Employee_model')->updateEmployee($_POST, $id) > 0) {
            Alert::setAlert('add', 'Success!', 'Data successfully updated', 'success');
            header('location:' . BASEURL . 'employee/detail/' . $id);
            exit;
        } else {
            Alert::setAlert('add', 'Failed!', 'Data Failed to update', 'error');
            header('location:' . BASEURL . 'employee/detail/' . $id);
            exit;
        }
    }
}
