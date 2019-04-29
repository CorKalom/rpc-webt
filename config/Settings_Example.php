<?php
class Settings_Example
{
protected $connectionParams;
public function __construct()
{
    $this->connectionParams = array(
        'dbname' => '', //Insert databasename here
        'user' => '', // Paste your predefined Username here
        'password' => '', //
        'host' => '',
        'driver' => ''
    );
    }
    public function getConnParams(){
    return $this->connectionParams;
    }
};