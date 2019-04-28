<?php

require ('vendor/autoload.php');
require "NewRoll.php";
require "api/Round.php";

$view = new \TYPO3Fluid\Fluid\View\TemplateView();
$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename(__DIR__ . '/index.html');
$view->assignMultiple([
    "roundStats" => ""
]);


$output = $view->render();
echo $output;


if(isset($_GET['id'])) {
    $rnd = new Round();
    $roll = new NewRoll();
    switch ($_GET['id']) {
        case 1:
            $rnd->playGame(1);
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];
            $roll->saveRolldata($rnd->getResults()['result']);
            $roll->retrieveRolldata();
            break;
        case 2:
            $rnd->playGame(2);
            $roll->saveRolldata($rnd->getResults()['result']);
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];
            $roll->retrieveRolldata();
            break;
        case 3:
            $rnd->playGame(3);
            $roll->saveRolldata($rnd->getResults()['result']);
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];
            $roll->retrieveRolldata();
            break;
    }
    if($result == 'Victory') {
        echo "<script>swal('$result','Opponent picked $opppick','success');</script>";
    }elseif ($result == 'Defeat'){
        echo "<script>swal('$result','Opponent picked $opppick','error');</script>";
    }else{
        echo "<script>swal('$result','Opponent picked $opppick','warning');</script>";
    }

}


