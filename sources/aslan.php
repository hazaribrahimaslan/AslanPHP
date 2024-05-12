<?php
#AslanPHP - Developed by Hazar İbrahim Aslan
class aslan{
    private $connect;
    public function database_connect(){
        $server_name = "localhost";
        $database_name = "";
        $user_name = "";
        $user_password = "";
        try {
            $this->connect = new PDO("mysql:host=$server_name;dbname=$database_name", $user_name, $user_password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    public function database_disconnect(){
        $this->connect = null;
    }
    public function data_select($table,$columns,$conditions,$groups,$orders){
        self::database_connect();
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->setFetchMode(PDO::FETCH_ASSOC);
        self::database_disconnect();
    }
    public function data_insert($table,$columns,$values){
        self::database_connect();
        try {
            $this->connect->exec("INSERT INTO $table($columns)VALUES($values)");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
        self::database_disconnect();
    }
    public function data_update($table,$data_column,$new_data,$condition){
        self::database_connect();
        try {
            $this->connect->exec("UPDATE $table $column = '$value' WHERE $condition ");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
        self::database_disconnect();
    }
    public function data_delete($table,$condition){
        self::database_connect();
        try {
            $this->connect->exec("DELETE FROM $table WHERE $condition ");
            return 1;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
        self::database_disconnect();
    }
    public function data_hash($value){
        return md5($value).sha1($value);
    }
    public function data_encrypt($data, $key){
        $cipher = 'AES-128-ECB';
        return openssl_encrypt($data, $cipher, $key);
    }
    public function data_decrypt($data, $key){
        $cipher = 'AES-128-ECB';
        return openssl_decrypt($data, $cipher, $key);
    }
    public function page_create($language, $icon, $title, $body){
        return "<html lang=\"$language\"><head><meta charset=\"UTF-8\"><link rel=\"icon\" type=\"image/x-icon\" href=\"$icon\"><title>$title</title><link rel=\"stylesheet\" href=\"aslan.css\"><script src=\"jquery.js\"></script><script src=\"aslan.js\"></script></head><body>$body</body></html>";
    }
    public function table($id,$class,$columns,$rows){
        return "<table></table>";
    }
    public function form($id,$class,$method,$action,$inputs){
        return "<form id=\"$id\" class=\"$class\" method=\"$method\" action=\"$action\">$inputs</form>";
    }
    public function input_text($id,$class,$placeholder,$value,$readonly,$required){
        return "<input id=\"$id\" class=\"$class\" type=\"text\" placeholder=\"$placeholder\" value=\"$value\" $readonly $required>";
    }
    public function input_email($id,$class,$placeholder,$value,$readonly,$required){
        return "<input id=\"$id\" class=\"$class\" type=\"email\" placeholder=\"$placeholder\" value=\"$value\" $readonly $required>";
    }
    public function input_password($id,$class,$placeholder,$value,$readonly,$required){
        return "<input id=\"$id\" class=\"$class\" type=\"password\" placeholder=\"$placeholder\" value=\"$value\" $readonly $required>";
    }
    public function input_button($id,$class,$type, $value){
        return "<button id=\"$id\" class=\"$class\" type=\"$type\">$value</button>";
    }
}
