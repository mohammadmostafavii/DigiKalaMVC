<?php
//
//$serverName = 'localhost';
//$userName = 'root';
//$pass = '';
//$dbName = 'digi_mvc';
//
////procedural method
////$connection = mysqli_connect($serverName, $userName, $pass, $dbName);
////if(mysqli_connect_errno())
////    echo mysqli_connect_errno();
//
//
//// Object Oriented Method
//$conn = new mysqli($serverName, $userName, $pass, $dbName);
//if($conn -> connect_error)
//    echo $conn->connect_errno;
//
//$conn->set_charset('utf8');
//
///**select*/
//$sql = "select * from tbl_product ";
//$result = $conn->query($sql);
//
//while ($row = $result->fetch_assoc()){
//    print_r($row);
//}
//
///** Update */
//$sql = "update tbl_product set title='گوشی' where id=1";
//$connection->query($sql);
//
///** Delete */
////$sql = "delete from tbl_product where id=2";
////$connection->query($sql);
//
///** Insert */
////$sql = "insert into tbl_product (id, title) VALUES (2, 'تبلت')";
////$connection->query($sql);
//
///** Prepared Statements */
//$product_title = 'شلوار';
//$sql = "insert into tbl_product (title) VALUES (?)";
//$stmt = $connection->prepare($sql);
//$stmt->bind_param('s', $product_title);
//$stmt->execute();
//
//
//
//
//
//
//
//
//
//
//
////$serverName = 'localhost';
////$userName = 'root';
////$password = '';
////$dbName = 'test1';
////
////$connection = new PDO('mysql:host='.$serverName.';dbname='.$dbName, $userName, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"'));
////$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
////
////
/////** INSERT with Prepared Statements */
//////$sql = "select * from tbl_product";
//////$stmt = $connection->prepare($sql);
//////$stmt->execute();
//////$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//////
//////foreach($result as $row){
//////    print_r($row);
//////    echo '<br />';
//////}
////
/////** Way_One */
//////$sql = "update tbl_product set title=:title where id=:id";
//////$stmt = $connection->prepare($sql);
//////$stmt->bindValue(':title', 'پیراهن');
//////$stmt->bindValue(':id', '2');
//////$stmt->execute();
////
/////** Way_Two */
//////$sql = "UPDATE tbl_product SET title=? WHERE id=?";
//////$stmt = $connection->prepare($sql);
//////$stmt->bindValue(1, 'فلفل');
//////$stmt->bindValue(2, 1);
//////$stmt->execute();
////
/////** Way_Three */
////$sql = "UPDATE tbl_product SET title=? WHERE id=?";
////$stmt = $connection->prepare($sql);
////$product_name = 'گوجه';
////$id = 3;
////$stmt->bindParam(1, $product_name);
////$stmt->bindParam(2, $id);
////$stmt->execute();
//




















