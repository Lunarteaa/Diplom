<?php
session_start();

include 'db_connect.php';


$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];


    $query = "SELECT quantity FROM shopping_cart WHERE user_id = '$userId' AND product_id = '$productId'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];

        if ($quantity > 1) {

            $newQuantity = $quantity - 1;
            $updateQuery = "UPDATE shopping_cart SET quantity = '$newQuantity' WHERE user_id = '$userId' AND product_id = '$productId'";
            mysqli_query($link, $updateQuery);
        } else {

            $deleteQuery = "DELETE FROM shopping_cart WHERE user_id = '$userId' AND product_id = '$productId'";
            mysqli_query($link, $deleteQuery);
        }
    }


    header("Location: /cart.php");
    exit();
} else {
 
    header("Location: /cart.php");
    exit();
}


mysqli_close($link);
?>