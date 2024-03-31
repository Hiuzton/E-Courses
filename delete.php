<?php
require("mysql.php");
$id=$_GET['id'];

$sql = "DELETE FROM cart WHERE id='$id'";
if ($conexiune->query($sql) === TRUE) {
echo "Course was deleted from cart";
header("Location: cart.php");
exit();
} else {
echo "Have some problems with deleting " .mysqli_error($conexiune);
}

?>