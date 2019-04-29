<?php
/**
 * Created by PhpStorm.
 * User: Kamil Koziol
 * Date: 26.04.2019
 * Time: 08:42
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use kk\orm\Roll;


require ('vendor/autoload.php');
require "config/Settings.php";
require "api/RoundResults.php";

class NewRoll
{
    protected $entityManager;

    public function __construct()
    {
        $connP = new Settings();
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode);


        $this->entityManager = EntityManager::create($connP->getConnParams(), $config);
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }

    public function getResults($playerSelection){
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



        if($playerSelection==$com_value){
            return $results = ['result' => 'Tie','oppHand' => $opponentAttribute, 'animation' => 'warning'];
        }elseif (($playerSelection==2&&$com_value==1)||($playerSelection==1&&$com_value==3)||($playerSelection==3&&$com_value==2)){
            return $results = ['result' => 'Victory','oppHand' => $opponentAttribute, 'animation' => 'success'];
        }else{
            return $results = ['result' => 'Defeat','oppHand' => $opponentAttribute, 'animation' => 'error'];
        }
    }

    public function saveRolldata($result)
    {
        $roll = new Roll();
        $roll->setResult($result);
        $roll->setDate();

        $this->getEntityManager()->persist($roll);
        $this->getEntityManager()->flush();

        //echo "Created Roll Entry No. ".$roll->getId(). " dated ".$roll->getDate()->format('d/m/Y h:i:s')." with the following Result: ".$roll->getResult();
    }

    public function retrieveRolldata()
    {

        $rollRepo = $this->getEntityManager()->getRepository('kk\\orm\\Roll');
        $rolls = $rollRepo->findAll();
        $return = [];
        $counter = 0;
        foreach ($rolls as $roll) {
            $result = $roll->getResult();
            $id = $roll->getId();
            $date = $roll->getDate()->format('y-m-d h:i:s');

            $return[$counter] = ['result' => $result,'id' => $id,'date' => $date];
            $counter++;
        }
        return $return;
    }
}