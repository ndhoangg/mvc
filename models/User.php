<?php
namespace app\models;
use app\core\DB;

class User {
    private $db;
    public function __construct(){
        $this->db = new DB;
    }


      //Find user by email or username
      public  function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
        

    //Register User
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, password) 
        VALUES (:name, :email,:password)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute
        $this->db->execute();
        
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmail($nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->usersPwd;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    
    
}

    






?>
