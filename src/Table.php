<?php

namespace RobotSimulator;

use RobotSimulator\Api\TableInterface;

class Table implements TableInterface
{
    private int $width;
    private int $height;

    const MIN_X = 0;
    const MIN_Y = 0;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function isValidPosition(int $x, int $y)
    {
        if ($x < self::MIN_X || $y < self::MIN_Y) {
            return false;
        }

        if ($x > $this->width || $y > $this->height) {
            return false;
        }

        return true;
    }
}
