<?php

namespace RobotSimulator;

use RobotSimulator\Api\PositionInterface;

class Position implements PositionInterface
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function add(PositionInterface $b)
    {
        $this->x += $b->x;
        $this->y += $b->y;
    }

    public function report(): string
    {
        return "{$this->x},{$this->y}";
    }
}

