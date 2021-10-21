<?php

namespace RobotSimulator;

use RobotSimulator\Api\RobotInterface;
use RobotSimulator\Api\TableInterface;
use RobotSimulator\Api\DirectionInterface;
use RobotSimulator\Api\PositionInterface;

class Robot implements RobotInterface
{
    private TableInterface $table;
    private DirectionInterface $direction;
    private PositionInterface $position;

    public function __construct(
        TableInterface $table,
        ?DirectionInterface $direction=null,
        ?PositionInterface $position=null
    ) {
        $this->table = $table;

        $this->direction = $direction ?? new NullDirection();
        $this->position = $position ?? new NullPosition();
    }

    public function place(int $x, int $y, string $direction) {
        if (!$this->table->isValidPosition($x, $y)) {
            return;
        }

        $this->position = new Position($x, $y);
        $this->direction = new Direction();
        $this->direction->setDirection($direction);
    }

    public function move()
    {
        $new_position = new Position($this->position->x, $this->position->y);
        $new_position->add($this->direction->getCoordinates());

        if ($this->table->isValidPosition($new_position->x, $new_position->y)) {
            $this->position = $new_position;
        }
    }

    public function left()
    {
        $this->direction->left();
    }

    public function right()
    {
        $this->direction->right();
    }

    public function report()
    {
        $position = $this->position->report();
        $direction = $this->direction->report();

        if ($position && $direction) {
            return "{$position},{$direction}";
        }

        return "";
    }
}
