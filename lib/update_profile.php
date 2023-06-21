<?php
session_start();
$user_id = $_SESSION['user_id']; 


$pdo = new PDO('mysql:host=localhost;dbname=purrfectpets', 'root', '');
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
$birthday_formatted = date('Y-m-d', strtotime($birthday));
    $gender = $_POST['gender'];


    $stmt = $pdo->prepare('UPDATE users SET username = :username, email = :email, address = :address, phone = :phone, birthday = :birthday, gender = :gender WHERE id = :id');
    $stmt->execute([
        'username' => $username,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'birthday' => $birthday,
        'gender' => $gender,
        'id' => $user_id,
    ]);

    header('Location:/profile.php'); 
    exit();
}
?>