<?php

class GuestUser {
    protected $username;


    /**
     * __construct
     *
     * @param  string $username
     */
    
    public function __construct($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }
}