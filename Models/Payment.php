<?php 

$creditCardExpiry = '2022-12-12';

$currentDate = new DateTime(date('Y-m-d'));
$expiryDate = new DateTime($creditCardExpiry);

if ($expiryDate < $currentDate) {
    $paymentApproved = false;
} else {
    $paymentApproved = true;
}