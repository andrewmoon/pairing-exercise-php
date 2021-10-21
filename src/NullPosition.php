<?php

namespace RobotSimulator;

use RobotSimulator\Api\PositionInterface;

class NullPosition implements PositionInterface
{
    public int $x = 0;
    public int $y = 0;

    public function __construct()
    {
    }

    public function add(PositionInterface $b)
    {
    }

    public function report(): string
    {
        return "";
    }
}
