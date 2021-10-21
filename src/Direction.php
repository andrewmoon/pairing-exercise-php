<?php

namespace RobotSimulator;

use RobotSimulator\Api\DirectionInterface;
use RobotSimulator\Api\PositionInterface;

class Direction implements DirectionInterface
{
    const DIRECTION_NAMES = [
        "NORTH",
        "EAST",
        "SOUTH",
        "WEST"
    ];

    const DIRECTIONS = [
        [ 0, 1 ],
        [ 1, 0 ],
        [ 0, -1 ],
        [ -1, 0 ],
    ];

    private $index = 0;

    public function setDirection(string $direction_name)
    {
        $index = array_search($direction_name, self::DIRECTION_NAMES);

        $this->index = $index;
    }

    public function getCoordinates(): PositionInterface
    {
        $coordinates = self::DIRECTIONS[$this->index];

        $position = new Position($coordinates[0], $coordinates[1]);

        return $position;
    }

    public function getDirectionName(): string
    {
        return self::DIRECTION_NAMES[$this->index];
    }

    public function left()
    {
        $this->index -= 1;

        if ($this->index < 0) {
            $this->index = count(self::DIRECTIONS) - 1;
        }
    }

    public function right()
    {
        $this->index += 1;

        if ($this->index >= count(self::DIRECTIONS)) {
            $this->index = 0;
        }
    }

    public function report(): string
    {
        return self::DIRECTION_NAMES[$this->index];
    }
}

