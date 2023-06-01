<?php
$key_id = "rzp_test_hHahUzOxPJdtbZ";

$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId)->transfer(array('transfers' => array('account' => $accountId, 'amount' => '1000', 'currency' => 'INR', 'notes' => array('name' => 'Gaurav Kumar', 'roll_no' => 'IEC2011025'), 'linked_account_notes' => array('branch'), 'on_hold' => '1', 'on_hold_until' => '1671222870')));
