<?php
    namespace models;
    use models\baseModel;
    use \PDO;
    session_start();
    
    class userModel extends baseModel {
        const tableName = "users";
        const soult = "qwerty dvcde";

        public function rules(){
            return ['Id','UserName','Email','Password','Role'];
        }
        public function varification($Email){
            try 
            {
                $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM `".self::tableName."` WHERE `Email` = :Email");
                    $stmt->bindParam(':Email', $Email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row)
                {
                    $userVarification = new userModel;
                    $userVarification->tryMap($row);
                    return $userVarification;
                }
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
            finally
            {
                $conn = NULL;
            }
        }
        public function insert(){
            try 
            {
                $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO `".self::tableName."` (`UserName`, `Email`, `Password`)
                                VALUES (:UserName, :Email, :Password)");
                    $UserName = trim(htmlspecialchars($this->UserName));
                    $Email = trim(htmlspecialchars($this->Email));
                    $Password = self::passwordHasher();
                $stmt->bindParam(':UserName', $UserName);
                $stmt->bindParam(':Email', $Email);
                $stmt->bindParam(':Password', $Password);
                $stmt->execute();
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
            finally
            {
                $conn = NULL;
            }
        }
        public function selectRole(){
            try 
            {
                $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT `Role` FROM `".self::tableName."`
                                        WHERE `Id` = :Id ");
                        $Id = trim(htmlspecialchars($_SESSION['Id']));
                    $stmt->bindParam(':Id', $Id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row)
                {
                    $userRole = new userModel;
                    $userRole->tryMap($row);
                    return $userRole;
                }
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
            finally
            {
                $conn = NULL;
            }
            
        }
        public static function passwordHasher(){
            return sha1(self::soult.trim(htmlspecialchars(self::Password)).self::soult);
        }
    }