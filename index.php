<?php
session_start();
// include_once 'config.php';
if (isset($_GET['mod'])) {
    switch ($_GET['mod']) {
        case 'page':
            $ctrl_name = 'page';
            // echo 'đâfà';
            break;
        case 'user':
            $ctrl_name = 'user';
            break;
        case 'category':
            $ctrl_name = 'category';
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('location: index.php?mod=page&act=home');
            break;
        case 'comment':
            $ctrl_name = 'comment';
            break;
        case 'admin':
            $ctrl_name = 'admin';
            break;
        default:
            header('location: index?mod=page&act=home');
            break;
    }
    include_once "controller/c_" . $ctrl_name . ".php";
} else {
    header('location: index.php?mod=page&act=home');
}
