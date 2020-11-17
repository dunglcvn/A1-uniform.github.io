<?php
    define("db_server","localhost");
    define("db_category","root");
    define("db_pass","");
    define("db_name","eproject1");

function db_connect(){
    $connection = mysqli_connect(db_server,db_category,db_pass,db_name);
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
        exit;

    }
}
function selectAll(){
    global $db;
    $sql = "SELECT * FROM `Category`";
    $result = mysqli_query($db,$sql);
    return $result;
}    

function insert_into($category){    
    global $db;
 

    $sql = 'INSERT INTO `Category`';
    $sql .= '(Type) ';
    $sql .= 'VALUES (';
    $sql .= "'" . $category['Type'] . "'";
    $sql .= ')';

    
    
    $result = mysqli_query($db, $sql);
    
    return checkResult($result);



}
function find_category_by_type($type){
    global $db;

    $sql = "SELECT * FROM `Category`";
    $sql .= "WHERE `Type` ='" . $type . "'";
    
    $result = mysqli_query($db,$sql);
    checkResult($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category;

}
function update_category($oldType, $newType){
    global $db;
  
    
    $sql = "UPDATE `Category` SET";
    $sql .= "`Type`='" . $newType . "'";
    $sql .= " WHERE `Type` ='" . $oldType . "'";
    $sql .= " LIMIT 1";
    echo $sql;
  
    $result = mysqli_query($db,$sql);
    return checkResult($result);

}

function delete_category($type){
    global $db;

    $sql = 'DELETE FROM `Category`';
    $sql .= "Where `Type`= '" . $type . "'";
    $sql .= 'LIMIT 1';
   
    $result = mysqli_query($db,$sql);
    return checkResult($result);
}

function check_type_cat($type) {
    global $db;

    $sql = "SELECT * FROM `Category` WHERE `Type`='" . $type . "' LIMIT 1";

    $result = mysqli_query($db, $sql);

    if (mysqli_fetch_array($result)) {
        return true; // ton tai type
    } else {
        return false;
    }
}
     
function check_type_exist_edit($oldType, $newType) {
    global $db;

    $sql1 = "CREATE TABLE `TemporaryTable` SELECT `Type` FROM `Category`";
    $sql2 = "DELETE FROM `TemporaryTable` WHERE `Type`='" . $oldType . "'";
    $sql3 = "SELECT * FROM `TemporaryTable` WHERE `Type` ='" . $newType . "' LIMIT 1";
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
   

   
    

?>
