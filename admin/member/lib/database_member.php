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
        return true;
    }else{
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function select_all_member() {
    global $db;

    $sql = "SELECT * FROM `member` ";
    $result = mysqli_query($db, $sql);

    return $result;
}

function delete_member($id) {
    global $db;

    $sql = "DELETE FROM `member` WHERE `memID`='" . $id . "'";
    $result = mysqli_query($db, $sql);
    return checkResult($result);
}

function find_member_by_id($id) {
    global $db;

    $sql = "SELECT * FROM `member` WHERE `memID`='" . $id . "'";
    $result = mysqli_query($db, $sql);
    checkResult($result);
    $member = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $member;
}

?>
