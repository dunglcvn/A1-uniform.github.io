<?php
    define("db_server","localhost");
    define("db_user","root");
    define("db_pass","");
    define("db_name","eproject1");

function db_connect(){
    $connection = mysqli_connect(db_server,db_user,db_pass,db_name);
    return $connection;
}
$db = db_connect();

function db_disconnect($connection){
    if(isset($connection)){
        mysqli_close($connection);
        exit;
    }
}

function checkResult($result){
    global $db;
    if($result){
        return $result;
    }else{
        echo mysqli_error($db);
        exit;

    }
}

function check_member( $username, $password) {
    global $db;
    
    $sql_select="SELECT * FROM `member` where `Username` = '$username' AND `Password` = '$password'  LIMIT 1";

    $result = mysqli_query($db, $sql_select);
    
    if (mysqli_fetch_array($result)){
         return true;
    }else{
        return false; //Khong co dong nao co thong tin username va password nhu tren
    }
}
function check_username($username){
    global $db;
    $sql_select="SELECT * FROM member where Username = '$username' limit 1";
        $result = mysqli_query($db, $sql_select);
		
        if (mysqli_fetch_array($result)){
            return true; //username da ton tai
        }else{
            return false; 
        }  
}

function check_email($email){
    global $db;

    $sql = "SELECT * FROM `member` WHERE `Email` = '$email' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if (mysqli_fetch_array($result)) {
        return true; // email da ton tai
    } else {
        return false;
    }
}

function insert_member($member){
    global $db;
    
    $sql = 'INSERT INTO `member`';
    $sql .= '(Username,Password,Name,Phone,Email,Address) ';
    $sql .= 'VALUES (';
    $sql .= "'" . $member['username'] . "',";
    $sql .= "'" . $member['password'] . "',";
    $sql .= "'" . $member['name'] . "',";
    $sql .= "'" . $member['phone'] . "',";
    $sql .= "'" . $member['email'] . "',";
    $sql .= "'" . $member['address'] . "'";
    $sql .= ')';

    
    $result = mysqli_query($db, $sql);
    
    return checkResult($result);
       
}

function find_member_by_username($username) {
    global $db;

    $sql = "SELECT * FROM `member` WHERE `Username` ='" . $username . "'";
    $result = mysqli_query($db, $sql);
    checkResult($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member;
}

function update_member($member) {
    global $db;

    $sql = "UPDATE `member` SET ";
    $sql .= "`Name`='" . $member['name'] . "',";
    $sql .= "`Phone`='" . $member['phone'] . "',";
    $sql .= "`Email`='" . $member['email'] . "',";
    $sql .= "`Address`='" . $member['address'] . "' ";
    $sql .= "WHERE `memID`='" . $member['memID'] . "' LIMIT 1";

    $result = mysqli_query($db, $sql);
    return checkResult($result);
}

function select_all_catalog(){
    global $db;
    
    $sql = "SELECT * FROM `Category`";
    $result = mysqli_query($db,$sql);
    return $result;
}

function select_all_product(){
    global $db;
    $sql = "SELECT * FROM `product`";
    $result = mysqli_query($db,$sql);
    return $result;           
}

function sort_product_by_price_asc() {
    global $db;
    
    $sql = "SELECT * FROM `product` ORDER BY `Price` ASC";

    $result = mysqli_query($db, $sql);
    return $result;
}

function sort_product_by_price_des() {
    global $db;
    
    $sql = "SELECT * FROM `product` ORDER BY `Price` DESC";

    $result = mysqli_query($db, $sql);
    return $result;
}

function select_product_by_type($type){
    global $db;
    $sql = "SELECT * FROM `product`";
    $sql .= "WHERE `Type` ='" . $type . "'";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function sort_search_product_by_price_asc($type) {
    global $db;
    $sql = "SELECT * FROM `product`";
    $sql .= "WHERE `Type` ='" . $type . "' ORDER BY `Price` ASC";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function sort_search_product_by_price_des($type) {
    global $db;
    $sql = "SELECT * FROM `product`";
    $sql .= "WHERE `Type` ='" . $type . "' ORDER BY `Price` DESC";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function find_product_by_name($product_name){
    global $db;
    $product_name = addslashes($product_name);
    $sql = "Select * from `product` WHERE Name like '%$product_name%' ";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function sort_search_product_name_by_price_asc($product_name) {
    global $db;
    $product_name = addslashes($product_name);
    $sql = "Select * from `product` WHERE `Name` like '%$product_name%' ORDER BY `Price` ASC";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function sort_search_product_name_by_price_des($product_name) {
    global $db;
    $product_name = addslashes($product_name);
    $sql = "Select * from `product` WHERE `Name` like '%$product_name%' ORDER BY `Price` DESC";
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

?>

 