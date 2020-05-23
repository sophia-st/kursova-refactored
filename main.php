<?php
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
    // Запит на отримання фотографіі портфоліо
    $qry = "SELECT * FROM kurs.table_content";
    $stmt = $dbh->prepare($qry);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createUser(){
    global $dbh;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $pass = isset($_POST['password'])  ? $_POST['password'] : null;
    if(is_null($name) || is_null($email) || is_null($pass)){
        header("Location: register.php");
    }

    //запит на пошук користувача з іменем  '%name%'
    $qry = "SELECT * FROM kurs.table_content where 'name' = ':name '";
    $stmt = $dbh->prepare($qry);
    $stmt->execute(array(':name' => $name));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($data)){
        return '';
    }
    $pass = md5($pass);
    // Запит на створення нового користувача
    $qry = "INSERT INTO kurs.users (`name`, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES('{$name}', '{$email}', NULL, '{$pass}', NULL, '', '');";
    $stmt = $dbh->query($qry);
    $stmt->execute();
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
    global $dbh;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $pass = isset($_POST['password'])  ? $_POST['password'] : null;
    if(is_null($email) || is_null($pass)){
        header("Location: login.php");
    }


    $pass = md5($pass);
    //запит на пошук користувача з іменем  '%name%'
    $qry = "SELECT * FROM `kurs`.`users` WHERE `email` LIKE '{$email}' AND `password` LIKE '{$pass}'";
    $stmt = $dbh->query($qry);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($data)) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];
    }
    header("Location: index.php");

}

function createTicket(){
    global $dbh;
    $email = isset($_POST['email'])  ? $_POST['email'] : null;
    $name = isset($_POST['name'])  ? $_POST['name'] : null;
    if(is_null($email) || is_null($name)){
        header("Location: login.php");
    }

    //додавання тікета на бронювання
    $qry = "INSERT INTO `ticket` (`name`, `email`, `created_at`, `updated_at`) VALUES ('{$name}', '{$email}', NULL, NULL);";
    $stmt = $dbh->query($qry);
    $stmt->execute();
    header("Location: index.php");

}

function createContent(){
    global $dbh;
    $title = isset($_POST['title'])  ? $_POST['title'] : null;
    $decs = isset($_POST['decs'])  ? $_POST['decs'] : null;
    $photourl = isset($_POST['photourl'])  ? $_POST['photourl'] : null;
    if(is_null($title) || is_null($decs) || is_null($photourl) ){
        header("Location: index.php");
    }

    //додавання фотографіі до портфоліо
    $qry = "INSERT INTO `table_content` (`title`, `decs`, `photourl`) VALUES ( '{$title}', '{$decs}', '{$photourl}');";
    $stmt = $dbh->query($qry);
    $stmt->execute();
}

function logout(){
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header("Location: index.php");
}
