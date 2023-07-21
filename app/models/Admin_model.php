<?php

class admin_model
{
    private $table = 'tb_admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllAdmin()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }
    public function getAdminProfile($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . ' WHERE id_admin=:id_admin');
        $this->db->bind('id_admin', $id);
        $this->db->execute();
        return $this->db->single();
    }
    public function editPhoto($data, $id)
    {
        $query = "UPDATE tb_admin SET img_profile=:img_profile WHERE tb_admin.id_admin=:id_admin";
        if ($_FILES['img']['error'] === 4) {
            $img = $data['old_img'];
        } else {
            unlink('assets/images/profile/' . $data['old_img']);
            $img = $this->uploadImage();
        }
        $this->db->query($query);
        $this->db->bind('id_admin', $id);
        $this->db->bind('img_profile', $img);
        $this->db->execute();
        $this->db->rowCount();
    }
    public function uploadImage()
    {
        $fileName = $_FILES['img']['name'];
        $errors = $_FILES['img']['error'];
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
}
