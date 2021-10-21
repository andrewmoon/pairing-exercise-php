<?php

namespace RobotSimulator\Api;

interface PositionInterface
{
    public function add(PositionInterface $b);
    public function report(): string;
}
