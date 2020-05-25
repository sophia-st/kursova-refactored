<?php
//ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']."/session") ));

error_reporting(E_ERROR | E_PARSE);
require "config.php";

$dbh = '';

try {
    $dbh = new PDO('mysql:host='. $config['dbhost'] .';dbname=' . $config['dbname'], $config['dbusername'], $config['dbpass']);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


function getALLPosts(){
    global $dbh;
    global $config;
    // Запит на отримання фотографіі портфоліо
    $qry = "SELECT * FROM ". $config['dbname'] .".table_content";
    $stmt = $dbh->prepare($qry);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createUser(){
    global $dbh;global $config;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $pass = isset($_POST['password'])  ? $_POST['password'] : null;
    if(is_null($name) || is_null($email) || is_null($pass)){
        header("Location: register.php");
    }

    //запит на пошук користувача з іменем  '%name%'
    $qry = "SELECT * FROM ". $config['dbname'] .".users where 'name' = ':name '";
    $stmt = $dbh->prepare($qry);
    $stmt->execute(array(':name' => $name));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($data)){
        return '';
    }
    $pass = md5($pass);

    $date = date('Y-m-d H:i:s');
    // Запит на створення нового користувача
    $qry = "INSERT INTO ". $config['dbname'] .".users (`name`, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES('{$name}', '{$email}', NULL, '{$pass}', NULL, '{$date}', '{$date}');";
    $stmt = $dbh->query($qry);
    $result = $stmt->fetchAll();
    header("Location: index.php");
}

function getUserInfo(){
    session_start();
    $isAdmin = $_SESSION['name'] == 'admin';
    $arr = ['id' => isset($_SESSION['id']) ? $_SESSION['id'] : null, 'isAdmin' => $isAdmin];
    return $arr;
}

function doLogin(){
    global $dbh;global $config;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $pass = isset($_POST['password'])  ? $_POST['password'] : null;
    if(is_null($email) || is_null($pass)){
        header("Location: login.php");
    }


    $pass = md5($pass);
    //запит на пошук користувача з іменем  '%name%'
    $qry = "SELECT * FROM `". $config['dbname'] ."`.`users` WHERE `email` LIKE '{$email}' AND `password` LIKE '{$pass}'";
    $stmt = $dbh->query($qry);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($data)) {
        ob_start();
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
    }
    header("Location: index.php");

}

function createTicket(){
    global $dbh;global $config;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $name = isset($_POST['name'])  ? $_POST['name'] : null;
    if(is_null($email) || is_null($name)){
        header("Location: login.php");
    }

    //шукаемо юзера з вказаним id
    $qry1 = "SELECT * FROM `". $config['dbname'] ."`.`users` WHERE `name` LIKE 'admin'";
    $stmt = $dbh->query($qry1);
    $stmt->execute();
    $data1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUser = $data1['id'];
    $date = date('Y-m-d H:i:s');

    //додавання тікета на бронювання
    $qry = "INSERT INTO `". $config['dbname'] ."`.`ticket` (`name`, `email`, `created_at`, `updated_at`, `user_id`) VALUES ('{$name}', '{$email}', '{$date}', '{$date}', {$idUser});";
    $stmt = $dbh->query($qry);
    header("Location: index.php?res=true");

}

function createContent(){
    global $dbh;global $config;
    $title = isset($_POST['title'])  ? $_POST['title'] : null;
    $decs = isset($_POST['decs'])  ? $_POST['decs'] : null;
    $photourl = isset($_POST['photourl'])  ? $_POST['photourl'] : null;
    if(is_null($title) || is_null($decs) || is_null($photourl) ){
        header("Location: index.php");
    }

    session_start();
    //якшо юзер не авторизований то перенаправляємо на головну сторінку
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }


    //шукаемо юзера з вказаним id
    $qry1 = "SELECT * FROM `". $config['dbname'] ."`.`users` WHERE `id`=".$_SESSION['id'];
    $stmt = $dbh->query($qry1);
    $stmt->execute();
    $data1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $idUser = $data1['id'];

    //додавання фотографіі до портфоліо
    $qry = "INSERT INTO `". $config['dbname'] ."`.`table_content` (`title`, `decs`, `photourl`, `created_by`) VALUES ( '{$title}', '{$decs}', '{$photourl}', {$idUser});";
    $stmt = $dbh->query($qry);

    header("Location: index.php");
}

function logout(){
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header("Location: index.php");
}
