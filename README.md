# AslanPHP
Open source php framework.

## Database Functions
<table>
  <tr>
    <td>Include </td>
    <td>include "aslanphp/database.php";</td>
  </tr>
   <tr>
    <td>Class</td>
    <td>$database = new database();</td>
  </tr>
  <tr>
    <td>Connect</td>
    <td>$connect = $database->database_connect($server_name, $database_name,$user_name, $user_password);</td>
  </tr>
  <tr>
    <td>Disconnect</td>
    <td>$connect = $database->database_disconnect();</td>
  </tr>
  <tr>
    <td>Data Select</td>
    <td>$select = $database->data_select($connect, $query);</td>
  </tr>
  <tr>
    <td>Data Insert</td>
    <td>$database->data_insert($connect, $table, $columns, $values);</td>
  </tr>
  <tr>
    <td>Data Update</td>
    <td>$database->data_update($connect,$table,$colum,$value,$condition);</td>
  </tr>
  <tr>
    <td>Data Delete</td>
    <td>$database->data_delete($connect,$table,$condition);</td>
  </tr>
</table>

## Calendar Functions
<table>
  <tr>
    <td>Today Name</td>
    <td>$today_name = $calendar->today_name();</td>
  </tr>
  <tr>
    <td>Month Name</td>
    <td>$month_name = $calendar->month_name($month_number);</td>
  </tr>
  <tr>
    <td>This Month Name</td>
    <td>$month_name = $calendar->this_month_name();</td>
  </tr>
</table>
