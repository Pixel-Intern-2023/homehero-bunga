<?php

class Admin extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Admin';
        $data['admin'] = $this->model('Admin_model')->getAllAdmin();
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }
    public function profile($id)
    {
        $data['title'] = 'Admin Profile';
        $data['admin'] = $this->model('Admin_model')->getAdminProfile($id);
        $this->view('templates/header', $data);
        $this->view('admin/profile', $data);
        $this->view('templates/footer');
    }
    public function editProfile($id)
    {
        if ($this->model('Admin_model')->editPhoto($_POST, $id) > 0) {
            echo "<script>alert('Berhasil diubah')</script>";
            header('location:' . BASEURL . 'admin/profile/' . $id);
        } else {
            echo "<script>alert('gagal Dihapus')</script>";
            header('location:' . BASEURL . 'admin/profile/' . $id);
        }
    }
}
