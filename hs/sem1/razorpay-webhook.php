<?php
$WEBHOOK_SECRET = "tutogenius123"; // TOMAR WEBHOOK SECRET
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'];

// Verify signature
$expected_signature = hash_hmac('sha256', $payload, $WEBHOOK_SECRET);
if($expected_signature !== $signature) { die("Invalid Signature"); }

$data = json_decode($payload, true);

if($data['event'] == 'payment_link.paid'){
    $payment_id = $data['payload']['payment_link']['entity']['id'];
    $course_id = "c12_sem378"; // ekhane theke dhorte gele description e pathate hobe
    
    // File e save kore rakhbo. Real app e DB use korbe
    file_put_contents("paid_$payment_id.txt", "paid");
}
http_response_code(200);
?>
