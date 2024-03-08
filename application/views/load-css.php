<?php 
echo 'here';
exit;
$conn = mysqli_connect("localhost","root","","ui") or die("Connection failed");
$sql = "select * from countries_m "; 
$query =  mysqli_query($conn,$sql) or die("Query Unseccessful");
$row = mysqli_fetch_assoc($query);
print_r($row);
exit;
$str = ""; 
while ($row = mysqli_fetch_assoc($query)) {
    $str .= "<option value='{$row['country_id']}'>{$row['country_name']}</option>";
}
echo $str;


?>