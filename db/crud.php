<?php
    class crud{
        private $db;

        //constructor to initialize value of db
        function __construct($conn){
            $this->db = $conn;
        }

        public function insert($firstName, $lastName, $birthdate, $specialty, $email, $contactNumber){
            try {
                //code...
                $sql = "INSERT INTO attendees (firstName, lastName, birthdate, specialty_id, email, contactNumber) VALUES (:firstName, :lastName, :birthdate, :specialty, :email, :contactNumber)";
                $statement = $this->db->prepare($sql);

                //bind parameters to sql statement
                $statement->bindparam(':firstName', $firstName);
                $statement->bindparam(':lastName', $lastName);
                $statement->bindparam(':birthdate', $birthdate);
                $statement->bindparam(':specialty', $specialty);
                $statement->bindparam(':email', $email);
                $statement->bindparam(':contactNumber', $contactNumber);
                
                //execute the sql command 
                $statement -> execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function editAttendee($id, $firstName, $lastName, $birthdate, $specialty, $email, $contactNumber){
            try {
                $sql = "UPDATE attendees SET firstName=:firstName, lastName=:lastName, birthdate=:birthdate, specialty_id=:specialty, email=:email, contactNumber=:contactNumber WHERE attendee_id =:id";
                $statement = $this->db->prepare($sql);
    
                //bind parameters to sql statement
                $statement->bindparam(':id', $id);
                $statement->bindparam(':firstName', $firstName);
                $statement->bindparam(':lastName', $lastName);
                $statement->bindparam(':birthdate', $birthdate);
                $statement->bindparam(':specialty', $specialty);
                $statement->bindparam(':email', $email);
                $statement->bindparam(':contactNumber', $contactNumber);

                $statement -> execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }

        }
        public function getAttendees(){
            try{
                $sql = "SELECT * FROM attendees a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM attendees a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);
                $result = $statement->execute();
                //fetch() gives us the one thing we are asking for
                $result = $statement->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function deleteAttendees($id){
            try {
                $sql = "DELETE FROM attendees WHERE attendee_id = :id";
                $statement = $this->db->prepare($sql);
                $statement->bindparam(':id', $id);
                $result = $statement->execute();
                return true;
            }  catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

        public function getSpecialties(){
            try{
                $sql = "SELECT * FROM specialties";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
                //throw $th;
            }
        }

    }
?>