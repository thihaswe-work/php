<?php 

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$email = $_POST["email"];
$password = md5($_POST["password"]);
$table = new UsersTable(new MySQL());

session_start();

    $user = $table->findByEmailAndPassword($email,$password);

    if($user){
        // if($table->suspend($user->id)){
        //     HTTP::redirect("/index.php","suspended=1");

        // }
        $_SESSION['user'] = $user;
        HTTP::redirect("/profile.php");

    }else{
        HTTP::redirect("/index.php","incorrect=1");
    }


    // if($email === "john.doe@gmail.com" and $password === "jd123pwd"){

    //    $_SESSION["user"] =["username"=>"john doe"];
    //    header("location: ../profile.php");
    // }else{
    //     header("location: ../index.php?incorrect=1");
    // }

