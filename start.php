<?php

include("vendor/autoload.php");

$commands = <<<OUTPUT
PLACE 0,0,NORTH
MOVE
REPORT
OUTPUT;

$output = RobotSimulator\Simulator::run($commands);

echo $output;
