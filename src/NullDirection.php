<?php

namespace RobotSimulator;

use RobotSimulator\Api\DirectionInterface;
use RobotSimulator\Api\PositionInterface;

class NullDirection implements DirectionInterface
{
    public function setDirection(string $direction_name)
    {
    }

    public function getCoordinates(): PositionInterface
    {
        return new NullPosition();
    }

    public function getDirectionName(): string
    {
        return "";
    }

    public function left()
    {
    }

    public function right()
    {
    }

    public function report(): string
    {
        return "";
    }
}

