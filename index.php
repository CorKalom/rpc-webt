<?php

require ('vendor/autoload.php');
require "api/Round.php";

//Define your Html-Template with Fluid, then assign Values that can be used to be inserted
//into the html code.

$view = new \TYPO3Fluid\Fluid\View\TemplateView();
$paths = $view->getTemplatePaths();
$paths->setTemplatePathAndFilename(__DIR__ . '/index.html');
$view->assignMultiple([

]);

//Render the html output and store it in a variable for eventual use. Then return it using echo,
//the html code will be passed onto the screen.
$output = $view->render();
echo $output;

//Old deprecated solution.
//Reasons for deprecation:
// - Hasn't used ajax to be retrieved by javascript
// - Several bed practices in this code, including echoing a script tag from the server-side
//
/**
$resultF = NULL;
$rolldata = NULL;

if(isset($_GET['id'])) {
    $rnd = new Round();
    $roll = new NewRoll();
    $alrt = new Alert();
    switch ($_GET['id']) {
        case 1:
            $rnd->playGame(1);
            $resultF = $rnd->getResults();
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];
            $roll->saveRolldata($result['result']);

            $rolldata = $roll->retrieveRolldata();
            break;
        case 2:
            $rnd->playGame(2);
            $resultF = $rnd->getResults();
            $result = $rnd->getResults()['result'];
            $roll->saveRolldata($result['result']);
            $opppick = $rnd->getResults()['opponentPick'];

            $rolldata = $roll->retrieveRolldata();
            break;
        case 3:
            $rnd->playGame(3);
            $resultF = $rnd->getResults();
            $result = $rnd->getResults()['result'];
            $roll->saveRolldata($result['result']);
            $opppick = $rnd->getResults()['opponentPick'];

            $rolldata = $roll->retrieveRolldata();
            break;
    }
    if($result == 'Victory') {
        //$alrt->sendSwal($result['result'],$result['opponentPick'],'success');
        echo "<script>swal('$result','Opponent picked $opppick','error');</script>";
    }elseif ($result == 'Defeat'){
        //$alrt->sendSwal($result['result'],$result['opponentPick'],'success');
        echo "<script>swal('$result','Opponent picked $opppick','error');</script>";
    }else{
        //$alrt->sendSwal($result['result'],$result['opponentPick'],'success');
        echo "<script>swal('$result','Opponent picked $opppick','warning');</script>";
    }
    $test = "hello";
*/




