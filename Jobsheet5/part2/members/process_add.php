<?php
session_start();
require __DIR__ . '/../includes/connection.php';

$name = trim($_POST['name'] ?? '');
$memberId = trim($_POST['member_id'] ?? '');
$address = trim($_POST['address'] ?? '');
$phone = trim($_POST['phone'] ?? '');

$errors = [];
if ($name === '') {
    $errors[] = "Name is required.";
}
if ($memberId === '') {
    $errors[] = "Member ID is required.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO members (name, member_id, address, phone)
     VALUES (:name, :member_id, :address, :phone)
     RETURNING id"
);
try {
    $stmt->execute([
        'name' => $name,
        'member_id' => $memberId,
        'address' => $address,
        'phone' => $phone,
    ]);
} catch (PDOException $e) {
    // 23505 = unique_violation: member_id is UNIQUE, so the same number cannot be saved twice.
    if ($e->getCode() === '23505') {
        $message = "Member ID " . $memberId . " is already in use, please use a different number.";
    } else {
        $message = "Failed to save the member data, please try again.";
    }
    $_SESSION['flash'] = ['type' => 'error', 'message' => $message];
    header('Location: add.php');
    exit;
}

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Member added successfully.'];
header('Location: list.php');
exit;
