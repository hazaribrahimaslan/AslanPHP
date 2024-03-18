# AslanPHP
Open source php framework.

## Database Functions
<table>
  <tr>
    <td>Include </td>
    <td>include "aslan.php";</td>
  </tr>
   <tr>
    <td>Using</td>
    <td>$aslan = new aslan();</td>
  </tr>
  <tr>
    <td>Connect</td>
    <td>$connect = $aslan->database_connect($server_name, $database_name,$user_name, $user_password);</td>
  </tr>
  <tr>
    <td>Disconnect</td>
    <td>$connect = $aslan->database_disconnect();</td>
  </tr>
  <tr>
    <td>Data Select</td>
    <td>$select = $aslan->data_select($connect, $query);</td>
  </tr>
  <tr>
    <td>Data Insert</td>
    <td>$aslan->data_insert($connect, $table, $columns, $values);</td>
  </tr>
  <tr>
    <td>Data Update</td>
    <td>$aslan->data_update($connect,$table,$colum,$value,$condition);</td>
  </tr>
  <tr>
    <td>Data Delete</td>
    <td>$aslan->data_delete($connect,$table,$condition);</td>
  </tr>
  <tr>
    <td>Form Create</td>
    <td>$aslan->form_create($method,$action);</td>
  </tr>
  <tr>
    <td>Text Input</td>
    <td>$aslan->form_input_text();</td>
  </tr>
  <tr>
    <td>Email Input</td>
    <td>$aslan->form_input_email();</td>
  </tr>
  <tr>
    <td>Phone Number Input</td>
    <td>$aslan->form_input_phone();</td>
  </tr>
  <tr>
    <td>Password Input</td>
    <td>$aslan->form_input_password();</td>
  </tr>
  <tr>
    <td>File Input</td>
    <td>$aslan->form_input_file($file_type,$file_size);</td>
  </tr>
  <tr>
    <td>File Button</td>
    <td>$aslan->form_input_button($button_text);</td>
  </tr>
  <tr>
    <td>Form Close</td>
    <td>$aslan->form_close();</td>
  </tr>
</table>
