<?php

class employee_model
{
    private $table = 'tb_employee';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function countEmployee()
    {
        $this->db->query("SELECT * FROM " . $this->table . " LEFT JOIN tb_status ON tb_employee.id_employee = tb_status.id_status WHERE tb_employee.id_status = 1");
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function countFiredEmployee()
    {
        $this->db->query("SELECT * FROM " . $this->table . " LEFT JOIN tb_status ON tb_employee.id_employee = tb_status.id_status WHERE tb_employee.id_status = 2");
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAllEmployee()
    {
        $this->db->query("SELECT * FROM tb_employee left JOIN tb_Occupation ON tb_employee.id_Occupation = tb_Occupation.id_Occupation left JOIN tb_status ON tb_employee.id_status = tb_status.id_status");
        return $this->db->resultSet();
    }
    public function getOccupation()
    {
        $this->db->query("SELECT * FROM tb_occupation");
        return $this->db->resultSet();
    }
    public function getEmployeeById($id)
    {
        $this->db->query("SELECT * FROM tb_employee left JOIN tb_Occupation ON tb_employee.id_Occupation = tb_Occupation.id_Occupation left JOIN tb_status ON tb_employee.id_status = tb_status.id_status WHERE id_employee=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function AddEmployee($data)
    {
        $query = "INSERT INTO tb_employee 
        VALUES 
        ('',:name,:id_Occupation,:salary,:description,:created_at,'',:img_profile,'1')";
        $created_at = date('Y-m-d h:i:s');
        $img = $this->uploadImage();
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('id_Occupation', $data['occupation']);
        $this->db->bind('salary', $data['salary']);
        $this->db->bind('description', $data['desc']);
        $this->db->bind('created_at', $created_at);
        $this->db->bind('img_profile', $img);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function statusEmployee($data, $id)
    {
        $query = "UPDATE tb_employee SET id_status=:id_status WHERE tb_employee.id_employee=:id_employee";
        $this->db->query($query);
        $this->db->bind('id_employee', $id);
        $this->db->bind('id_status', $data['id_status']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updateEmployee($data, $id)
    {
        $query = "UPDATE tb_employee SET name=:name, id_Occupation=:id_Occupation, salary=:salary, description=:description, img_profile=:img_profile WHERE tb_employee.id_employee=:id_employee";
        if ($_FILES['img']['error'] === 4) {
            $img = $data['old_img'];
        } else {
            unlink('assets/images/profile/' . $data['old_img']);
            $img = $this->uploadImage();
        }
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('id_Occupation', $data['occupation']);
        $this->db->bind('salary', $data['salary']);
        $this->db->bind('description', $data['desc']);
        $this->db->bind('img_profile', $img);
        $this->db->bind('id_employee', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function uploadImage()
    {
        if ($_FILES['img']['error'] === 4) {
            return null;
            exit;
        }
        $fileName = $_FILES['img']['name'];
        $tmpName = $_FILES['img']['tmp_name'];
        $validEx = ['jpeg', 'png', 'jpg'];
        $img_ex = explode('.', $fileName);
        $img_ex = strtolower(end($img_ex));
        if (!in_array($img_ex, $validEx)) {
            // $errors['img'] = "Maaf Hanya dapat mengupload Gambar";
            return false;
        }
        $fileNameNew = uniqid();
        $fileNameNew .= '.';
        $fileNameNew .= $img_ex;
        $dir = "assets/images/profile/";

        move_uploaded_file($tmpName, $dir . $fileNameNew);
        return $fileNameNew;
    }
    public function delete($id)
    {
        $img = $this->getEmployeeById($id);
        $query = "DELETE FROM tb_employee WHERE id_employee=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        if (!empty($img['img_profile'])) {
            unlink('assets/images/profile/' . $img['img_profile']);
        }
        return $this->db->rowCount();
    }
}
