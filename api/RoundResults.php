<?php
/**
 * Created by PhpStorm.
 * User: Kamil Koziol
 * Date: 27.04.2019
 * Time: 17:10
 */


 function set($pi){
    $com_value = 0;
    $opponentAttribute = '';

    try {
        $com_value = random_int(1, 3);
    }catch (Exception $e){
        echo $e->getMessage();
    }

    switch ($com_value){
        case 1: $opponentAttribute = 'Rock';
            break;
        case 2: $opponentAttribute = 'Paper';
            break;
        case 3: $opponentAttribute = 'Scissors';
            break;
    }



    if($pi==$com_value){
        return $results = ['result' => 'Tie','oppHand' => $opponentAttribute, 'animation' => 'warning'];
    }elseif (($pi==2&&$com_value==1)||($pi==1&&$com_value==3)||($pi==3&&$com_value==2)){
        return $results = ['result' => 'Victory','oppHand' => $opponentAttribute, 'animation' => 'success'];
    }else{
        return $results = ['result' => 'Defeat','oppHand' => $opponentAttribute, 'animation' => 'error'];
    }
}
/**if(isset($_GET['id'])) {
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
            $roll->saveRolldata($result['result']);
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];

            $rolldata = $roll->retrieveRolldata();
            break;
        case 3:
            $rnd->playGame(3);
            $resultF = $rnd->getResults();
            $roll->saveRolldata($result['result']);
            $result = $rnd->getResults()['result'];
            $opppick = $rnd->getResults()['opponentPick'];

            $rolldata = $roll->retrieveRolldata();
            break;
    }
}
 * */
