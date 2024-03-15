<?php
/* AslanPHP - Database Functions
 * Connect : $connect = $database->database_connect($server_name, $database_name,$user_name, $user_password);
 * Disconnect : $connect = $database->database_disconnect();
 * Select : $database->data_select($connect, $query);
 * Insert : $database->data_insert($connect, $table, $columns, $values);
 * Update : $database->data_update($connect,$table,$colum,$value,$condition);
 * Delete : $database->data_delete($connect,$table,$condition);
 * */
class database{
    public function database_connect($server_name,$database_name,$user_name,$user_password){
        try {
            $connect = new PDO("mysql:host=$server_name;dbname=$database_name", $user_name, $user_password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function database_disconnect(){
        return null;
    }
    public function data_select($connect, $query){
        $stmt = $connect->prepare($query);
        $stmt->execute();
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }
    public function data_insert($connect,$table,$columns,$values){
        try {
            $connect->exec("INSERT INTO $table($columns)VALUES($values)");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function data_update($connect,$table,$column,$value,$condition){
        try {
            $connect->exec("UPDATE $table $column = '$value' WHERE $condition ");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function data_delete($connect,$table,$condition){
        try {
            $connect->exec("DELETE FROM $table WHERE $condition ");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
}
