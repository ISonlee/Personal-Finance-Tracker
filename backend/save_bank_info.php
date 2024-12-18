<?php
session_start();
require_once 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Get JSON data from request
$data = json_decode(file_get_contents('php://input'), true);
$username_email = $_SESSION['username_email'];

// Validate the data
if (!isset($data['bdoAccount']) && !isset($data['gcashAccount'])) {
    echo json_encode(['success' => false, 'message' => 'No account data provided']);
    exit;
}

// Prepare SQL statement to save bank accounts
$sql = "UPDATE users SET 
        bdo_account = CASE WHEN ? = '' THEN bdo_account ELSE ? END,
        gcash_account = CASE WHEN ? = '' THEN gcash_account ELSE ? END
        WHERE username_email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", 
    $data['bdoAccount'],
    $data['bdoAccount'],
    $data['gcashAccount'],
    $data['gcashAccount'],
    $username_email
);

if ($stmt->execute()) {
    $response = ['success' => true, 'message' => 'Bank accounts saved successfully'];
} else {
    $response = ['success' => false, 'message' => 'Error saving bank accounts'];
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?> 