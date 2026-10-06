<?php
session_start();

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
} elseif (!preg_match('/^[A-Za-z0-9-]{1,50}$/', $memberId)) {
    // Letters, digits and hyphens only (e.g. AGT-001), max 50 characters.
    $errors[] = "Member ID may only contain letters, digits and hyphens (max 50 characters).";
} else {
    // The same Member ID must not be registered twice in this session.
    foreach ($_SESSION['members'] ?? [] as $member) {
        if ($member['member_id'] === $memberId) {
            $errors[] = "Member ID " . $memberId . " is already in use.";
            break;
        }
    }
}
// Phone is optional, but when it is filled: digits only (may start with +), 10-15 digits.
if ($phone !== '' && !preg_match('/^\+?[0-9]{10,15}$/', $phone)) {
    $errors[] = "Phone must contain 10-15 digits (may start with +).";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => implode(' ', $errors)];
    header('Location: add.php');
    exit;
}

if (!isset($_SESSION['members'])) {
    $_SESSION['members'] = [];
}

$_SESSION['members'][] = [
    'name' => $name,
    'member_id' => $memberId,
    'address' => $address,
    'phone' => $phone,
];

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Member added successfully.'];
header('Location: list.php');
exit;
