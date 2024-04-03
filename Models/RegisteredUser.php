<?php

require_once('GuestUser.php');

class RegisteredUser extends GuestUser {
    protected $discount;
    protected $email;

    public function __construct($username, $email, $discount) {
        parent::__construct($username);
        $this->discount = $discount;
        $this->email = $email;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getEmail() {
        return $this->email;
    }
}