<?php 
$db = new PDO('mysql:dbhost=localhost;dbname=project', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);
// $statement = $db->query("SELECT * FROM users");
// $result = $statement->fetchAll();
// $row1 = $statement->fetch();
// $row2 = $statement->fetch();
// $row3 = $statement->fetch();
// print_r($result);
// print_r("<-------------------------------------------------------------------------------------------------------------------------------------->") ;
// echo "hello world";
// print_r($row1);


// $sql = "INSERT INTO roles (name, value) VALUES ('Supervisor', 4)";
// $db->query($sql);
// echo $db->lastInsertId(); // 4

// $sql = "INSERT INTO roles (name, value) VALUES (:name, :value)";
// $statement = $db->prepare($sql);
// $statement->execute([
//  ':name' => 'God',
//  ':value' => 999
// ]);
// echo $db->lastInsertId();

// $sql = "UPDATE roles SET name=:name WHERE value = 999";
// $statement = $db->prepare($sql);
// $statement->execute([
//  ':name' => 'Superman'
// ]);
// echo $statement->rowCount();

$sql = "DELETE FROM roles WHERE id > :id";
$statement = $db->prepare($sql);
$statement ->execute([
   ':id'  => 3
]);
echo $statement->rowCount();