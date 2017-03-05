<?php

class Robot
{
    /**
     * The position of the robot
     *
     * @var array
     */
    public $position;

    /**
     * The direction of the robot
     *
     * @var int
     */
    public $direction;

    const DIRECTION_NORTH = 0;
    const DIRECTION_EAST = 1;
    const DIRECTION_SOUTH = 2;
    const DIRECTION_WEST = 3;

    public function __construct(array $position, int $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * Turn the robot right
     *
     * @return Robot
     */
    public function turnRight() { return $this; }

    /**
     * Turn the robot left
     *
     * @return Robot
     */
    public function turnLeft() { return $this; }

    /**
     * Move the robot forward
     *
     * @return Robot
     */
    public function advance() { return $this; }

    /**
     * Move the robot forward
     *
     * @return Robot
     */
    public function instructions() {}
}