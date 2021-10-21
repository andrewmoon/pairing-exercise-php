<?php

use PHPUnit\Framework\TestCase;

use RobotSimulator\Robot;
use RobotSimulator\Table;

class RobotTest extends TestCase
{
    public function setupRobot()
    {
        $table = new Table(5, 5);
        $robot = new Robot($table);

        return $robot;
    }

    public function testRobotCanBeCreated()
    {
        $robot = $this->setupRobot();

        $this->assertInstanceOf(Robot::class, $robot);
    }

    public function testRobotCanMove()
    {
        $robot = $this->setupRobot();

        $robot->place(0, 0, "NORTH");
        $robot->move();

        $this->assertEquals("0,1,NORTH", $robot->report());
    }

    public function testRobotWontPlaceOffTable()
    {
        $robot = $this->setupRobot();

        $robot->place(-1, -1, "NORTH");

        $this->assertEquals("", $robot->report());
    }

    public function testRobotWontMoveUntilPlaced()
    {
        $robot = $this->setupRobot();

        $robot->move();

        $this->assertEquals("", $robot->report());
    }

    public function testRobotWontOverrunTableNorth()
    {
        $robot = $this->setupRobot();

        $robot->place(0, 0, "NORTH");
        $robot->move();
        $robot->move();
        $robot->move();
        $robot->move();
        $robot->move();

        $this->assertEquals("0,5,NORTH", $robot->report());
    }

    public function testRobotWontOverrunTableWest()
    {
        $robot = $this->setupRobot();

        $robot->place(0, 0, "NORTH");
        $robot->left();
        $robot->move();

        $this->assertEquals("0,0,WEST", $robot->report());
    }

    public function testRobotWontOverrunTableEast()
    {
        $robot = $this->setupRobot();

        $robot->place(5, 0, "EAST");
        $robot->move();

        $this->assertEquals("5,0,EAST", $robot->report());
    }

    public function testRobotWontOverrunTableSouth()
    {
        $robot = $this->setupRobot();

        $robot->place(0, 0, "SOUTH");
        $robot->move();

        $this->assertEquals("0,0,SOUTH", $robot->report());
    }
}

