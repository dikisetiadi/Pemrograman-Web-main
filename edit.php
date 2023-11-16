<?php
require './config/db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = mysqli_query($db_connect, "SELECT * FROM products WHERE id='$id'");
    $data = mysqli_fetch_assoc($product);

    if(isset($_POST['update'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price' WHERE id='$id'");
        header("location: show.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form action="" method="post">
        <label for="name">Nama Produk:</label>
        <input type="text" name="name" value="<?=$data['name'];?>" required>
        <br>
        <label for="price">Harga:</label>
        <input type="text" name="price" value="<?=$data['price'];?>" required>
        <br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
