<?php

use PHPUnit\Framework\TestCase;

use RobotSimulator\Simulator;

class SimulatorTest extends TestCase
{
    public function testSimulatorProcessesCommands()
    {
        $command = <<<COMMAND
PLACE 0,0,NORTH
MOVE
REPORT
COMMAND;

        $output = Simulator::run($command);

        $this->assertEquals("Output: 0,1,NORTH", $output);
    }
}

