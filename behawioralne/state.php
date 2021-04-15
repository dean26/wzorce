<?php 

/**
 * State - stan. Zmiana zachowania obiektu w momencie gdy zmienimy jego zawartość. 
 * np. Obiekt odpowiadający za zamykanie i otwieranie bramy wjazdowej do domu
 */

/**
 * Context - klasa która śledzi stan obiektu
 */
class Context
{

    private GateState $state;
    
    /**
     * __construct
     *
     * @param  mixed $state
     * @return void
     */
    public function __construct(GateState $state)
    {
        $this->state = $state;
    }

    /**
     * Get the value of state
     */ 
    public function getState(): GateState
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state): void
    {
        $this->state = $state;
    }
    
    /**
     * change
     *
     * @return void
     */
    public function change(): void
    {
        $this->getState()->open_close($this);
    }
}


abstract class GateState{

    abstract public function open_close(Context $context): void;

}

class Open extends GateState{

    public function open_close(Context $context): void{
        echo '<p>Open - switch to close</p>';
        $context->setState(new Close);    
    }

}

class Close extends GateState{

    public function open_close(Context $context): void{
        echo '<p>Close - switch to open</p>';
        $context->setState(new Open);       
    }

}


$first_state = new Open();
$context = new Context($first_state);

$context->change();
$context->change();
$context->change();
$context->change();