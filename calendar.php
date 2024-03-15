<?php
/* AslanPHP - Takvim Fonksiyonları
 * Bugünün adı : $today = $calendar->today_name();
 * Bu ayın adı : $month_name = $calendar->this_month_name();
 * Ay adı : $this_month_name = $calendar->month_name($month_number);
 * */
class calendar{
    private array $day_names,$month_names;
    public function __construct(){
        $this->day_names = array(
            0 => "Pazar",
            1 => "Pazartesi",
            2 => "Salı",
            3 => "Çarşamba",
            4 => "Perşembe",
            5 => "Cuma",
            6 => "Cumartesi"
        );
        $this->month_names = array(
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
    }
    public function today_name(){
        return $this->day_names[date('w')];
    }
    public function this_month_name(){
        return $this->month_names[date("m")];
    }
    public function month_name($month_number){
        return $this->month_names[$month_number];
    }
}
