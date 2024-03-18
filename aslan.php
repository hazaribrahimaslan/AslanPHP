<?php
/* AslanPHP */
class aslan{
    /* Database Functions */
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
    /* Data Encrypt & Decrypt */
    public function data_encrypt_no_decoded($value, $md5_or_sha1_or_all){
        if($md5_or_sha1_or_all == 32){
            return md5($value);
        }
        else if($md5_or_sha1_or_all == 40){
            return sha1($value);
        }
        else if($md5_or_sha1_or_all == 72){
            return md5($value).sha1($value);
        }
    }
    public function data_encrypt($data, $key){
        $cipher = 'AES-128-ECB';
        return openssl_encrypt($data, $cipher, $key);
    }
    public function data_decrypt($data, $key){
        $cipher = 'AES-128-ECB';
        return openssl_decrypt($data, $cipher, $key);
    }
    /* Time Functions */
    public function day_name(){
        $day_names = array(
            0 => "Pazar",
            1 => "Pazartesi",
            2 => "Salı",
            3 => "Çarşamba",
            4 => "Perşembe",
            5 => "Cuma",
            6 => "Cumartesi"
        );
        return $day_names[date('w')];
    }
    public function month_name($month_number){
        $month_names = array(
            "01" => "January",
            "02" => "February",
            "03" => "March",
            "04" => "April",
            "05" => "May",
            "06" => "June",
            "07" => "July",
            "08" => "August",
            "09" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December"
        );
        if($month_number == 0){
            return $month_names[date("m")];
        }else{
            return $this->month_names[$month_number];
        }

    }
    /* HTML Elements */
    public function page_create($language, $icon, $title){
        return "<html lang=\"$language\"><head><meta charset=\"UTF-8\"><link rel=\"icon\" type=\"image/x-icon\" href=\"$icon\"><title>$title</title><link rel=\"stylesheet\" href=\"aslan.css\"><script src=\"jquery.js\"></script><script src=\"aslan.js\"></script></head><body><main>";
    }
    public function page_close(){
        return "</main></body></html>";
    }
    /* HTML Navigation Elements */
    public function navigation_create($title,$items){
        return "<header><a href=\"\" onclick=\"open_navigation();\">$title</a></header><nav>$items</nav>";
    }
    /* HTML Table Elements */
    public function create_table(){
        return "<table>";
    }
    public function table_column_create($columns){
        for($i=0;$i<count($columns);$i++){
            $column .= "<th>".$columns[$i]["name"]."</th>";
        }
        return "<tr>$column</tr>";
    }
    public function table_row_create($columns, $rows){
        $count_column = count($columns);
        $count_row = count($rows);
        for($i=0;$i<$count_row;$i++){
            $row .= "<tr>";
            for($j=0;$j<$count_column;$j++){
                $row .= "<td>".$columns[$j]["name"]."</td>";
            }
            $row .= "</tr>";
        }
        return $row;
    }
    public function table_close(){
        return "</table>";
    }
    /* HTML Form Elements */
    public function form_create($method,$action){
        return "<form method=\"$method\" action=\"$action\">";
    }
    public function form_close(){
        return "</form>";
    }
    public function form_input_text_create($name,$placeholder){
        return "<input id=\"text\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function form_input_phone_create($name,$placeholder){
        return "<input id=\"phone\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function form_input_email_create($name,$placeholder){
        return "<input id=\"email\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function form_input_select_create($name,$placeholder,$options){
        for($i=0;$i<count($options);$i++){
            $option .= "<option value=\"".$options[$i]['key']."\">".$options[$i]['value']."</option>";
        }
        return "<select name=\"\"></select>";
    }
    public function form_input_file_create($name,$placeholder){
        return "<input id=\"file\" name=\"$name\" type=\"file\">";
    }
}
