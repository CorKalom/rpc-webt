<?php
class Settings
{
protected $connectionParams;
public function __construct()
{
    $this->connectionParams = array(
        'dbname' => '', //Insert databasename here
        'user' => '',
        'password' => '',
        'host' => '',
        'driver' => ''
    );
    }
    public function getConnParams(){
    return $this->connectionParams;
    }
};