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
            "01" => "Ocak",
            "02" => "Şubat",
            "03" => "Mart",
            "04" => "Nisan",
            "05" => "Mayıs",
            "06" => "Haziran",
            "07" => "Temmuz",
            "08" => "Ağustos",
            "09" => "Eylül",
            "10" => "Ekim",
            "11" => "Kasım",
            "12" => "Aralık"
        );
        if($month_number == 0){
            return $month_names[date("m")];
        }else{
            return $this->month_names[$month_number];
        }

    }
    /* HTML Table Elements */
    public function create_table(){
        return "<table>";
    }
    public function create_column($columns){
        for($i=0;$i<count($columns);$i++){
            $column .= "<th>".$columns[$i]["name"]."</th>";
        }
        return "<tr>$column</tr>";
    }
    public function create_row($columns, $rows){
        $count_column = count($columns);
        $count_row = count($rows);
        $row = "<tr>";
        for($i=0;$i<$count_row;$i++){
            for($j=0;$j<$count_column;$j++){
                $row .= "<td>".$columns[$j]["name"]."</td>";
            }
        }
        $row .= "</tr>";
    }
    public function close_table(){
        return "</table>";
    }
    /* HTML Form Elements */
    public function form_create($method,$action){
        return "<form method=\"$method\" action=\"$action\">";
    }
    public function form_close(){
        return "</form>";
    }
    public function input_text($name,$placeholder){
        return "<input id=\"text\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function input_phone($name,$placeholder){
        return "<input id=\"phone\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function input_email($name,$placeholder){
        return "<input id=\"email\" name=\"$name\" type=\"text\" placeholder=\"$placeholder\">";
    }
    public function input_select($name,$placeholder,$options){
        for($i=0;$i<count($options);$i++){
            $option .= "<option value=\"".$options[$i]['key']."\">".$options[$i]['value']."</option>";
        }
        return "<select name=\"\"></select>";
    }
    public function input_file($name,$placeholder){
        return "<input id=\"file\" name=\"$name\" type=\"file\">";
    }
}
