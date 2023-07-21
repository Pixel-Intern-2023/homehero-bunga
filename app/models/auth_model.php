<?php
class Auth_model
{
    private $table = 'tb_admin';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkAdmin($data)
    {
        if (isset($data['username'])) {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
            $this->db->bind('username', $data['username']);
            $this->db->execute();
            $result = $this->db->rowCount();
            $dataFetch = $this->db->single();
            // check username
            if ($result === 1) {
                // check password
                // $pass = $data['password'];
                if (password_verify($data['password'], $dataFetch['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $dataFetch['username'];
                    $_SESSION['id_admin'] = $dataFetch['id_admin'];
                    $_SESSION['img'] = $dataFetch['img_profile'];
                    return 1;
                } else {
                    $_SESSION['alert']['error'] = 'Password anda Salah! Silahkan coba kembali';
                    return 0;
                }
            } else {
                $_SESSION['alert']['error'] = 'Username anda Salah! Silahkan coba kembali';
                return 0;
            }
        } else {
            $_SESSION['alert']['error'] = 'Harap Masukkan Username';
            return 0;
        }
    }

    public function insertAdmin($data)
    {
        // check username
        $check_username = "SELECT * FROM " . $this->table . " WHERE username=:username";
        $this->db->query($check_username);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        $result = $this->db->rowCount();
        if ($result === 0) {
            $query = "INSERT INTO tb_admin 
            VALUES 
            ('',:username,:name,'',:password)";
            $this->db->query($query);
            $this->db->bind('username', $data['username']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
            // execute query
            $this->db->execute();
            return 1;
        } else {
            $_SESSION['alert']['error'] = 'Username Sudah Terdaftar!';
            return 0;
        }
    }
}
