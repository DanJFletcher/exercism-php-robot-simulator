<?php

class Robot
{
    /**
     * @var array $position X and Y position of the robot
     */
    public $position;

    /**
     * @var int $direction a number corrosponding the direction of the robot
     */
    public $direction;

    /**
     * @var int DIRECTION_NORTH corrosponding number for North
     * @var int DIRECTION_EAST corrosponding number for East
     * @var int DIRECTION_SOUTH corrosponding number for South
     * @var int DIRECTION_WEST corrosponding number for West
     */
    const DIRECTION_NORTH = 0;
    const DIRECTION_EAST = 1;
    const DIRECTION_SOUTH = 2;
    const DIRECTION_WEST = 3;

    /**
     * Available instructions for the robot and associated functions
     *
     * @var array INSTRUCTIONS
     */
    const INSTRUCTIONS = [
        'R' => 'turnRight',
        'L' => 'turnLeft',
        'A' => 'advance',
    ];


    public function __construct(array $position, int $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * Turn the robot right
     *
     * @return Robot the current instance is returned
     */
    public function turnRight()
    {
        $this->incrementDirection();
        return $this;
    }

    /**
     * Turn the robot left
     *
     * @return Robot the current instance is returned
     */
    public function turnLeft() {
        $this->decrementDirection();
        return $this;
    }

    /**
     * Move the robot forward
     *
     * @return Robot the current instance is returned
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
     * Execute a string of instructions
     *
     * @param string $instructions
     * @return void
     */
    public function instructions(string $instructions)
    {
        // TODO: The name of cleanInstructions doesn't match
        // the intent. Consider changing, or remove the method all
        // together.
        $instructions = $this->cleanInstructions($instructions);

        // if the instructions are ok, we can tokenize them 
        $tokens = str_split($instructions);

        foreach($tokens as $token) {
            // call the function associated with the current token
            $this->{Robot::INSTRUCTIONS[$token]}();
        }

    }
    /**
     * Check instructions for invalid characters
     *
     * @param string $instructions
     * @throws InvalidArgumentException
     * @return string $instructions
     */
    private function cleanInstructions(string $instructions)
    {
        // TODO: Generalize the regex so that we can add more instructions
        // without needing to update this
        $badMatches = preg_match('/[^LRA]/', $instructions);

        if ($badMatches) { throw new InvalidArgumentException; }

        return $instructions;
    }

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
        // TODO: This will eventually generalize some of the logic
        // when the robot can move both forward and back
    }

    /*
    |--------------------------------------------------------------------------
    | Position helpers
    |--------------------------------------------------------------------------
    | These functions simply make incrementing and decrementing x and y
    | positions easier to read. Normally, I would make $position an object
    | for a problem like this, with properties like $x and $y so that I can
    | simply do $position->x and $position->y. I think that syntax is 
    | has a clearer intent.
    |
    | However, the test expects $position to return an array like [0, 1].
    | And so I simply wrote this class to meet those requirements.
    */
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