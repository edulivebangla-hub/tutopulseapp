<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // CORS fix

$RAZORPAY_KEY_ID = "rzp_live_TI1dFwgtX10E02"; // TOMAR KEY ID
$RAZORPAY_KEY_SECRET = "zHE4208oEKwLdntSLncI6Mud"; // SECRET

$course_id = $_POST['course_id'] ?? 'c12_sem378';
$amount = 1 * 100; // paise te

$data = [
    "amount" => $amount,
    "currency" => "INR",
    "description" => "Class 12 Course",
    "customer" => ["name" => "Student", "email" => "test@test.com"],
    "callback_url" => "payment-success.html?course_id=$course_id",
    "callback_method" => "get"
];

$ch = curl_init("https://api.razorpay.com/v1/payment_links");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$RAZORPAY_KEY_ID:$RAZORPAY_KEY_SECRET");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
