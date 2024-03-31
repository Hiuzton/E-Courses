<?php
require("mysql.php");
$question=$_POST["ques"];
$name=$_POST["name"];

$sql = "INSERT INTO user_question (name, question, ques_time) VALUES ('$name', '$question', now())";
$result= mysqli_query($conexiune, $sql);
if($result){
    echo 1;
}else{
    echo 0;
}
?>