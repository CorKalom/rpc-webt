<?php
// cli-config.php
require_once "NewRoll.php";
require ('vendor/autoload.php');

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet((new NewRoll())->getEntityManager());