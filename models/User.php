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
        $this->db->query('INSERT INTO users (name, email, password,user_name,first_name,last_name) 
        VALUES (:name, :email,:password,:user_name,:first_name,:last_name)');
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        
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

    //

    public function update($data){
        if($data['avatar']){
            $this->db->query('UPDATE users SET first_name=:first_name,last_name=:last_name,job_title=:job_title,avatar=:avatar,date_of_birth=:date_of_birth,phone_number=:phone_number,address=:address WHERE email=:email' );
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':avatar', $data['avatar']);
            $this->db->bind(':date_of_birth', $data['date_of_birth']);
            $this->db->bind(':phone_number', $data['phone_number']);
            $this->db->bind(':address', $data['address']);
    
        }
        else{
            $this->db->query('UPDATE users SET first_name=:first_name,last_name=:last_name,job_title=:job_title,date_of_birth=:date_of_birth,phone_number=:phone_number,address=:address WHERE email=:email' );
        
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':date_of_birth', $data['date_of_birth']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':address', $data['address']);
        }
        $this->db->execute();
       
    }
   

    
    
}

    






?>
