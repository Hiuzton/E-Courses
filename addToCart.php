<?php
require("mysql.php");
$id=$_GET['id'];

$ssql = "SELECT * FROM courses WHERE id='$id'";
$result = mysqli_query($conexiune, $ssql);

          
if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name=$row['name'];
        $categorie=$row['categorie'];
        $description=$row['description'];
        $price=$row['price'];
        $images=$row['images'];
    }
    
    $sql = "INSERT INTO cart (name, categorie, price, description, images)
    VALUES ('$name', '$categorie', '$price', '$description', '$images')";
    if (mysqli_query($conexiune, $sql)) {
        echo "<script>
        alert(\"Item added succsesfully!\");
      </script>";
        header("Location: cart.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexiune);
    }
?>