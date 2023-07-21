<?php

class Alert
{
    public static function setAlert($act, $title, $msg, $type)
    {
        $_SESSION['alert'] = [
            'action' => $act, // Action can be delete , update , add
            'type' => $type, // type can be error or success
            'title' => $title, // title
            'message' => $msg // message
        ];
    }
    public static function Alert()
    {
        if (isset($_SESSION['alert'])) {
            if ($_SESSION['alert']['action'] === 'add') {
                echo "<script>
                Swal.fire({
                    icon: '" . $_SESSION['alert']['type'] . "',
                    title: '"  . $_SESSION['alert']['title'] . "',
                    text: '" . $_SESSION['alert']['message'] . "',
                })</script>";
                unset($_SESSION['alert']);
            }
        }
    }
}
