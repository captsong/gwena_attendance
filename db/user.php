<?php

    class user{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($username, $password){
            try{
                $result = $this->getUserByUsername($username);
                if(!$result['num'] > 0){
                    return false;
                }else{
                    $new_password = md5($password . $username);

                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                    $statement = $this->db->prepare($sql);

                    //bind parameters to sql statement
                    $statement->bindparam(':username', $username);
                    $statement->bindparam(':password', $password);
                    
                    //execute the sql command 
                    $statement -> execute();
                    return true;
                }
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getUser($username, $password){
            try{
                $sql = "SELECT * FROM users WHERE username = :username AND password=:password";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':username', $username);
                $statement->bindparam(':password', $password);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }
        public function getUserByUsername($username){
            try{
                $sql = "SELECT COUNT(*) AS NUM FROM users WHERE username = :username";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':username', $username);

                $statement->execute();
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }


    }
?>