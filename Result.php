<?php
/**
 * Created by PhpStorm.
 * User: Kamil Koziol
 * Date: 28.04.2019
 * Time: 22:25
 */

require_once "NewRoll.php";
require_once "vendor/autoload.php";
require_once "api/RoundResults.php";

$playerSelect = '';
$nr = new NewRoll();

if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    $playerSelect = $_GET['id'];
    $dbValues = set($playerSelect);
    $nr->saveRolldata($dbValues['result']);
    header("Content-Type: application/json");
    echo json_encode($dbValues);
}else {
    require_once "index.php";
}


