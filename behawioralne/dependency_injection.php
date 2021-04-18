<?php 

/**
 * DEPENDENCY INJECTION
 * luźne powiązania między klasami
 */

/**
 * SimpleUser
 */
class SimpleUser
{
    private int $type;
    
    /**
     * __construct
     *
     * @param  mixed $type
     * @return void
     */
    public function __construct(int $type)
    {
        $this->type = $type;
    }
    
    /**
     * getType
     *
     * @return int
     */
    public function getType(): int{
        return $this->type;
    }
}

/**
 * WelcomeMessage
 */
class WelcomeMessage{

    private SimpleUser $user;
    public const MALE = 1;
    public const FEMALE = 2;
    
    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
    public function __construct(SimpleUser $user)
    {
        $this->user = $user;
    } 
      
    /**
     * getTextByType
     *
     * @return string
     */
    public function getTextByType(): string{

        $text = "";

        switch($this->user->getType()){
            case self::MALE:
                $text = "Hello mr."; 
                break;
            case self::FEMALE:
                $text = "Hello mrs.";
                break;
            default:  
                $text = "Error message...";  
        }

        return $text; 
    }

}

$admin = new SimpleUser(1);
$message = new WelcomeMessage($admin);
echo $message->getTextByType();


