<?php

class DAO {

    private $HOST = "tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $USER = "s1l4w062bsqkrvj2";
    private $PASS = "e9d216hrz14pllhl";
    private $DB = "uoa9syytcbaph7b3";

    getConnection() {
       return new PDO("mysql:host={$this->HOST};dbname={$this->DB}", $this->USER, $this->PASS);
    }

    createUser() {
        
    }

}
