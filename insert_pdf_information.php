<?php
//if(isset($_POST['next'])){
    $pdf = $_POST["pdf"];
    require "conn.php";

$sql = "INSERT INTO pdf_information_1 VALUES ('', '1', '$pdf', '' );";
$result  = mysqli_query($conn, $sql);
if($result){
echo "Data Inserted";
}
else{
echo "Failed";
}

//}
?>