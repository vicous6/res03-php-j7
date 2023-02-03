<?php 
class User {

    // private attribute
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;

    // public constructor
    public function __construct(string $firstName,string $lastName,string $email,string $password)
    {
        $this->id = -1;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    // public getter
     public function getId() : int
    {
        return $this->id;
    }
    public function getFirstName() : string
    {
        return $this->firstName;
    }
     public function getLastName() : string
    {
        return $this->lastName;
    }
     public function getEmail() : string
    {
        return $this->email;
    }
    public function getPassword() : string
    {
        return $this->password;
    }

    // public setter
        public function setId(int $id) : void
    {
        $this->id = $id;
    }
    public function SetFirstName(string $firstName) : void
    {
        $this->firstName= $firstName;
    }
     public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }
       public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
    
       public function setPassword(string $password) : void
    {
        $this->password = $password;
    }
}  

?>