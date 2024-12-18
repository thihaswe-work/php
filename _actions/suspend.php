<?php

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

include("./vendor/autoload.php");
$auth = Auth::check();
$table = new UsersTable(new MySQL());

$id = $_GET["id"];
$table->suspend($id);
HTTP::redirect("/admin.php");