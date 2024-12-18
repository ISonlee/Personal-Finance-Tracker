<?php
// Prevent any output before headers
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable HTML error output
ini_set('log_errors', 1);     // Enable error logging

session_start();
require_once 'db_connect.php';

// Set JSON header immediately
header('Content-Type: application/json');

if (!isset($_SESSION['username_email'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

try {
    // Get the raw POST data
    $jsonData = file_get_contents('php://input');
    if (!$jsonData) {
        throw new Exception('No data received');
    }

    $data = json_decode($jsonData, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data');
    }

    $username_email = $_SESSION['username_email'];
    
    $conn->begin_transaction();

    // Get user data
    $stmt = $conn->prepare("SELECT id, bdo_balance, gcash_balance FROM users WHERE username_email = ?");
    if (!$stmt) {
        throw new Exception('Database prepare error: ' . $conn->error);
    }
    
    $stmt->bind_param("s", $username_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        throw new Exception('User not found');
    }

    $balance_field = $data['paymentMethod'] === 'bdo' ? 'bdo_balance' : 'gcash_balance';
    $current_balance = floatval($user[$balance_field]);
    $amount = floatval($data['amount']);

    // Calculate new balance
    switch ($data['transactionType']) {
        case 'Transfer Money':
            if ($current_balance < $amount) {
                throw new Exception('Insufficient balance');
            }
            $new_balance = $current_balance - $amount;
            break;
        case 'Deposit':
            $new_balance = $current_balance + $amount;
            break;
        case 'Withdraw':
            if ($current_balance < $amount) {
                throw new Exception('Insufficient balance');
            }
            $new_balance = $current_balance - $amount;
            break;
        default:
            throw new Exception('Invalid transaction type');
    }

    // Update balance
    $update_sql = "UPDATE users SET $balance_field = ? WHERE username_email = ?";
    $update_stmt = $conn->prepare($update_sql);
    if (!$update_stmt) {
        throw new Exception('Database prepare error: ' . $conn->error);
    }
    
    $update_stmt->bind_param("ds", $new_balance, $username_email);
    if (!$update_stmt->execute()) {
        throw new Exception('Failed to update balance');
    }

    // Insert transaction record
    $insert_sql = "INSERT INTO transactions (user_id, transaction_type, payment_method, amount, recipient_name, recipient_account, recipient_email, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    if (!$insert_stmt) {
        throw new Exception('Database prepare error: ' . $conn->error);
    }
    
    $insert_stmt->bind_param("issdssss", 
        $user['id'],
        $data['transactionType'],
        $data['paymentMethod'],
        $amount,
        $data['recipient_name'] ?? null,
        $data['recipient_account'] ?? null,
        $data['recipient_email'] ?? null,
        $data['description'] ?? null
    );
    
    if (!$insert_stmt->execute()) {
        throw new Exception('Failed to save transaction');
    }

    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Transaction completed successfully']);

} catch (Exception $e) {
    if (isset($conn)) {
        $conn->rollback();
    }
    error_log("Transaction error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?> 