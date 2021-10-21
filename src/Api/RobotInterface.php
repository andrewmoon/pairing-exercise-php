<?php

namespace RobotSimulator\Api;

use TableInterface;

interface RobotInterface
{
    public function place(int $x, int $y, string $direction);
    public function move();
    public function left();
    public function right();
    public function report();
}
