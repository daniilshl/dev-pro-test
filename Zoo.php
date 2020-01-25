<?php
interface SoundBehaviour
{
    function makeSound();
}
interface MovementBehaviour
{
    function makeMove();
}


abstract class Animal
{
    protected $soundBehaviour;
    protected $movementType;
    protected $soundType;

    /**
     * @param object $soundType
     * @return object
     */
    public function setSoundType(object $soundType)
    {
        return $this->soundType = $soundType;
    }

    /**
     * @return mixed
     */
    public function performSound()
    {
        return $this->soundBehaviour->makeSound();
    }

    /**
     * @param object $movement
     * @return object
     */
    public function setMovement(object $movement)
    {
        return $this->movementType = $movement;
    }

    /**
     * @return mixed
     */
    public function performMovement()
    {
        return $this->careTaker->takeCare();
    }

    abstract function display();
}

class Roar implements SoundBehaviour
{
    /**
     * @return string
     */
    function makeSound()
    {
        return "Roar!!";
    }
}

class Tweet implements SoundBehaviour
{
    /**
     * @return string
     */
    function makeSound()
    {
        return "Tweet!!";
    }
}

class Walk implements MovementBehaviour
{
    /**
     * @return string
     */
    public function makeMove()
    {
        return "I walk.";
    }
}

class Fly implements MovementBehaviour
{
    /**
     * @return string
     */
    public function makeMove()
    {
        return "I fly.";
    }
}


class Lion extends Animal
{
    protected $soundBehaviour;
    protected $movementType;

    public function __construct()
    {
        $this->soundBehaviour = new Roar();
        $this->movementType = new Walk();
        $this->display();
    }

    public function display()
    {
        echo "I'm a " . get_class($this) . " and I ".$this->soundBehaviour->makeSound()." Also, " . $this->movementType->makeMove() . "\n";
    }

}

class Bird extends Animal
{
    protected $soundBehaviour;
    protected $movementType;

    public function __construct()
    {
        $this->soundBehaviour = new Tweet();
        $this->movementType = new Fly();
        $this->display();
    }

    public function display()
    {
        echo "I'm a " . get_class($this) . " and I " . $this->soundBehaviour->makeSound() . " Also, " . $this->movementType->makeMove() . "\n";
    }

}

class Zoo
{
    public function __construct(string $animal)
    {
        new $animal();
    }
}

$zoo = new Zoo("Bird");
$zoo = new Zoo("Lion");
?>