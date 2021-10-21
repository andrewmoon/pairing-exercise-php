<?php

namespace RobotSimulator\Api;

interface DirectionInterface
{
    public function setDirection(string $direction_name);
    public function getCoordinates(): PositionInterface;
    public function getDirectionName(): string;
    public function left();
    public function right();
    public function report(): string;
}
