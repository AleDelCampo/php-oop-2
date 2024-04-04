<?php 

$creditCardExpiry = '2022/12/12';

try {
    if (empty($creditCardExpiry)) {
        throw new Exception("Non hai inserito la scadenza della tua carta.");
    }

    $currentDate = new DateTime(date('Y-m-d'));
    $expiryDate = new DateTime($creditCardExpiry);

    if ($expiryDate < $currentDate) {
        $paymentApproved = false;
    } else {
        $paymentApproved = true;
    }
} catch (Exception $e) {
    $error = 'Errore: ' . $e->getMessage();
}