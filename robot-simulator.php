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
    public function turnRight()
    {
        $this->incrementDirection();
        return $this;
    }

    /**
     * Turn the robot left
     *
     * @return Robot
     */
    public function turnLeft() {
        $this->decrementDirection();
        return $this;
    }

    /**
     * Move the robot forward
     *
     * @return Robot
     */
    public function advance() {
        switch ($this->direction) {
            // If the direction is North then y++
            case 0:
                $this->incrementY();
                break;
            // If the direction is East then x++
            case 1:
                $this->incrementX();
                break;
            // If the direction is South then y--
            case 2:
                $this->decrementY();
                break;
            // If the direction is West then x--
            case 3:
                $this->decrementX();
                break;
        }
        return $this;
    }

    /**
     * Move the robot forward
     *
     * @return Robot
     */
    public function instructions() {}

    /**
     * Increment direction
     *
     * Makes sure that once $direction is 3, we restart back at 0
     * Otherwise, increment $direction by 1.
     *
     * @return void
     */
    private function incrementDirection()
    {
        $this->direction === 3 ? $this->direction = 0 : $this->direction++;
    }

    /**
     * Decrement direction
     *
     * Makes sure that once $direction is 0, we restart back at 3
     * Otherwise, decrement $direction by 1.
     *
     * @return void
     */
    private function decrementDirection()
    {
        $this->direction === 0 ? $this->direction = 3 : $this->direction--;
    }

    /**
     * Increment position
     *
     * First of all... if we were to represent this in a GUI context,
     * northward movements should be decrementing y not incrementing it,
     * but ok...
     * This function decides which coordinate to update, and how.
     *
     * @return void
     */
    private function updatePosition()
    {
        // If the direction is North y++
    }

    private function decrementX()
    {
        $this->position[0]--;
    }

    private function incrementX()
    {
        $this->position[0]++;
    }

    private function decrementY()
    {
        $this->position[1]--;
    }

    private function incrementY()
    {
        $this->position[1]++;
    }
}