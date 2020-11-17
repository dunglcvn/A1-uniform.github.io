<?php 
DEFINE("DB_SERVER","localhost");
DEFINE("DB_USER","root");
DEFINE("DB_PASS","");
DEFINE("DB_NAME","eproject1");

function db_connect() {
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    return $connection;
}

$db = db_connect();

function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
        exit;
    }
}

function checkResult($result) {
    global $db;

    if ($result) {
        return true;
    } else {
        return false;
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function select_all_admin() {
    global $db;

    $sql = "SELECT * FROM `admin` ";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM `admin` WHERE AdminID = '" . $id . "'";
    $result = mysqli_query($db, $sql);
    checkResult($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

function find_user_admin_by_username($username){
    global $db;

    $username = mysqli_real_escape_string($db, $username);

    $sql_select="SELECT * FROM `admin` where `Username` = '$username' LIMIT 1";
    $result = mysqli_query($db, $sql_select);
    
    
    if(mysqli_fetch_array($result)){
        return true; //username da ton tai
    }else{
        return false; 
    }
}

function find_user_admin_by_email($email) {
    global $db;

    $email = mysqli_real_escape_string($db, $email);

    $sql = "SELECT * FROM `admin` WHERE `Email` = '$email' LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    if (mysqli_fetch_array($result)) {
        return true; // da ton tai email
    } else {
        return false;
    }
}

function find_user_admin_by_phone($phone) {
    global $db;

    $phone = mysqli_real_escape_string($db, $phone);

    $sql = "SELECT * FROM `admin` WHERE `Phone Number` = '$phone' LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    if (mysqli_fetch_array($result)) {
        return true; // da ton tai phone
    } else {
        return false;
    }
}

function insert_admin($admin) {
    global $db;

    $admin['username'] = mysqli_real_escape_string($db, $admin['username']);
    $admin['password'] = mysqli_real_escape_string($db, $admin['password']);
    $admin['password'] = strtolower($admin['password']);
    $admin['password'] = sha1($admin['password']);
    $admin['email'] = mysqli_real_escape_string($db, $admin['email']);
    $admin['phone'] = mysqli_real_escape_string($db, $admin['phone']);

    $sql = "INSERT INTO `admin` (`Username`,`Password`,`Email`,`Phone Number`) ";
    $sql .= "VALUES(";
    $sql .= "'" . $admin['username'] . "',";
    $sql .= "'" . $admin['password'] . "',";
    $sql .= "'" . $admin['email'] . "',";
    $sql .= "'" . $admin['phone'] . "')";

    $result = mysqli_query($db, $sql);
    return checkResult($result);
}



function update_admin($admin) {
    global $db;

   

    $sql = "UPDATE `admin` SET ";
    $sql .= "`Email` = '" . $admin['Email'] . "', ";
    $sql .= "`Phone Number` = '" . $admin['phone'] . "'";
    $sql .= "WHERE AdminID = '" . $admin['AdminID'] . "' ";
    $sql .= "LIMIT 1";
    echo $sql;

    $result = mysqli_query($db, $sql);
    return checkResult($result);
}

function delete_admin($id) {
    global $db;

    $id = mysqli_real_escape_string($db, $id);

    $sql = "DELETE FROM `admin` WHERE `AdminID` = '" . $id . "'";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return checkResult($result);
}

function check_password_admin_by_username($id,$password){
    global $db;
    $sql="SELECT * FROM admin where `AdminID` = '$id' AND Password = '$password'  LIMIT 1";
        $result = mysqli_query($db, $sql);
		
        if (mysqli_fetch_array($result)){
            return true; // tồn tại password
        }else{
            return false; 
        }  
}

function select_email_edit_admin($oldEmail, $newEmail) {
    global $db;

    $sql1 = "CREATE TABLE `TemporaryTable` SELECT Email FROM `admin`";
    $sql2 = "DELETE FROM `TemporaryTable` WHERE `Email`='" . $oldEmail . "'";
    $sql3 = "SELECT * FROM `TemporaryTable` WHERE `Email` ='" . $newEmail . "' LIMIT 1";
    $sql4 = "DROP TABLE `TemporaryTable`";

    $result1 = mysqli_query($db,$sql1);
    $result2 = mysqli_query($db,$sql2);
    $result3 = mysqli_query($db, $sql3);
    $result4 = mysqli_query($db, $sql4);

    if (mysqli_fetch_array($result3)) {
        return true; // trung email
    } else {
        return false;
    }
}

function select_phone_edit_admin($oldPhone, $newPhone) {
    global $db;

    $sql1 = "CREATE TABLE `TemporaryTable` SELECT `Phone Number` FROM `admin`";
    $sql2 = "DELETE FROM `TemporaryTable` WHERE `Phone Number`='" . $oldPhone . "'";
    $sql3 = "SELECT * FROM `TemporaryTable` WHERE `Phone Number` ='" . $newPhone . "' LIMIT 1";
    $sql4 = "DROP TABLE `TemporaryTable`";

    $result1 = mysqli_query($db,$sql1);
    $result2 = mysqli_query($db,$sql2);
    $result3 = mysqli_query($db, $sql3);
    $result4 = mysqli_query($db, $sql4);

    if (mysqli_fetch_array($result3)) {
        return true; // trung phone
    } else {
        return false;
    }
}

function check_admin($admin_name,$password){
    global $db;
    $sql="SELECT * FROM admin where Username = '$admin_name' AND Password = '$password'  LIMIT 1";
        $result = mysqli_query($db, $sql);
		
        if (mysqli_fetch_array($result)){
            return true; // tồn tại 
        }else{
            return false; 
        }  
}

?>