<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: dashboard.php');
    exit();
}

$order_food= $_POST['order_food'];
$customer_name = $_POST["customer_name"];
$phone_no = $_POST["phone_no"];





include 'db-con.php';

$query = "INSERT INTO orders (order_food, customer_name, phone_no) VALUES (?, ?, ?)";
$abc = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($abc, 'sss', $order_food, $customer_name, $phone_no);
mysqli_stmt_execute($abc);


header("Location: dashboard.php?path=add-order");