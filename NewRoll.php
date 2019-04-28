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

    public function getEntityManager(){
        return $this->entityManager;
    }

    public function saveRolldata($result){
        $roll = new Roll();
        $roll->setResult($result);
        $roll->setDate();

        $this->getEntityManager()->persist($roll);
        $this->getEntityManager()->flush();

        //echo "Created Roll Entry No. ".$roll->getId(). " dated ".$roll->getDate()->format('d/m/Y h:i:s')." with the following Result: ".$roll->getResult();
    }

    public function retrieveRolldata(){

            $rollRepo = $this->getEntityManager()->getRepository('kk\\orm\\Roll');
            $rolls = $rollRepo->findAll();
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Result</th>
                    <th>Date</th>
                </tr>";
                foreach ($rolls as $roll){
                    $result = $roll->getResult();
                    $id = $roll->getId();
                    $date = $roll->getDate()->format('y-m-d h:i:s');
                    echo "<tr>
                            <th>$id</th>
                            <th>$result</th>
                            <th>$date</th>
                    </tr>";
                }
                echo "</table>";
            }
        }