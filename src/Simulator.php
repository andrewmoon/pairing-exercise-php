<?php

namespace RobotSimulator;

use RobotSimulator\Robot;
use RobotSimulator\Table;

class Simulator
{
    const WIDTH = 5;
    const HEIGHT = 5;

    public static function run(string $input)
    {
        $commands = explode("\n", $input);

        $table = new Table(self::WIDTH, self::HEIGHT);
        $robot = new Robot($table);

        $output = '';

        foreach ($commands as $i => $line) {
            $command = preg_replace("/ .*/", "", $line);
            $arguments = explode(",", preg_replace("/[^ ]* /", "", $line));

            switch ($command) {
            case "PLACE":
                $robot->place((int)$arguments[0], (int)$arguments[1], (string)$arguments[2]);

                break;

            case "MOVE":
                $robot->move();

                break;

            case "LEFT":
                $robot->left();

                break;

            case "RIGHT":
                $robot->right();

                break;

            case "REPORT":
                $output .= "Output: " . $robot->report() . "\n";

                break;
            }
        }

        return $output;
    }
}

