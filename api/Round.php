<?php
/**
 * Created by PhpStorm.
 * User: Kamil Koziol
 * Date: 27.04.2019
 * Time: 13:36
 */

class Round {
    protected $results;

    public function playGame($playerInput)
    {
        $com_value = 0;
        try {
            $com_value = random_int(1, 3);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if($playerInput==1&&$com_value==1) {
            $this->results['result'] = "Tie";
            $this->results['playerPick'] = "Rock";
            $this->results['opponentPick'] = "Rock";}
        elseif($playerInput==2&&$com_value==2){
            $this->results['result'] = "Tie";
            $this->results['playerPick'] = "Paper";
            $this->results['opponentPick'] = "Paper";}
        elseif($playerInput==3&&$com_value==3){
            $this->results['result'] = "Tie";
            $this->results['playerPick'] = "Scissors";
            $this->results['opponentPick'] = "Scissors";
        }elseif($playerInput==1&&$com_value==3){
            $this->results['result'] = "Victory";
            $this->results['playerPick'] = "Rock";
            $this->results['opponentPick'] = "Scissors";
        }elseif ($playerInput==2&&$com_value==1) {
            $this->results['result'] = "Victory";
            $this->results['playerPick'] = "Paper";
            $this->results['opponentPick'] = "Rock";
        }elseif ($playerInput==3&&$com_value==2) {
            $this->results['result'] = "Victory";
            $this->results['playerPick'] = "Scissors";
            $this->results['opponentPick'] = "Paper";
        }elseif($playerInput==1&&$com_value==2) {
            $this->results['result'] = "Defeat";
            $this->results['playerPick'] = "Rock";
            $this->results['opponentPick'] = "Paper";
        }elseif($playerInput==2&&$com_value==3){
            $this->results['result'] = "Defeat";
            $this->results['playerPick'] = "Paper";
            $this->results['opponentPick'] = "Scissors";
        }else{
            $this->results['result'] = "Defeat";
            $this->results['playerPick'] = "Scissors";
            $this->results['opponentPick'] = "Rock";
        }
    }
    public function getResults(){
        return $this->results;
    }
}

