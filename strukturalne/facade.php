<?php 

/**
 * Fasada -> zazwyczaj to jedna klasa, z której mamy dostęp do innych klas w systemie.
 * np. system zarządzanie uzytkownikami, jego plikami i wiadomościami
 */

/**
 * User
 */
class User {
    
    /**
     * name
     *
     * @var mixed
     */
    private string $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }


    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name): void
    {
        $this->name = $name;
    }
}

/**
 * UserMessage
 */
class UserMessage{
    
    /**
     * getAllMessages
     *
     * @return void
     */
    public function getAllMessages(): string
    {
        return "list with all messages to user\n";
    }

}

/**
 * UserFiles
 */
class UserFiles{
    
    /**
     * getAllFiles
     *
     * @return void
     */
    public function getAllFiles(): string
    {
        return "list with all files belongs to user\n";
    }
}


/**
 * UserFacade
 */
class UserFacade{
    
    private User $user;
    private UserMessage $user_message;
    private UserFiles $user_file;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(string $user_name)
    {
        $this->setUser(new User($user_name));
        $this->setUser_file(new UserFiles());
        $this->setUser_message(new UserMessage());
    }

    /**
     * Get the value of user
     */ 
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * Get the value of user_message
     */ 
    public function getUser_message(): UserMessage
    {
        return $this->user_message;
    }

    /**
     * Set the value of user_message
     *
     * @return  self
     */ 
    public function setUser_message($user_message): void
    {
        $this->user_message = $user_message;
    }

    /**
     * Get the value of user_file
     */ 
    public function getUser_file(): UserFiles
    {
        return $this->user_file;
    }

    /**
     * Set the value of user_file
     *
     * @return  self
     */ 
    public function setUser_file($user_file): void
    {
        $this->user_file = $user_file;
    }
}

$user = new UserFacade("Jan Kowalski");
echo $user->getUser()->getName();
echo $user->getUser_file()->getAllFiles();
echo $user->getUser_message()->getAllMessages();