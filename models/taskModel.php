<?php
namespace models;
use models\baseModel;
use \PDO;

class taskModel extends baseModel {
    const tableName = 'general';
    public function rules(){
        return ['Id','UserName','Email','Role','TaskId','Name','Description','Status','UserId'];
    }
    public function taskInsert(){
        try 
        {
            $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO `".self::tableName."` (`Name`,`Description`,`UserId`)
                                    VALUES (:Name, :Description, :UserId)");
                    $Name = trim(htmlspecialchars($this->Name));
                    $Description = trim(htmlspecialchars($this->Description));
                    $UserId = trim(htmlspecialchars($_SESSION['Id']));
                $stmt->bindParam(':Name', $Name);
                $stmt->bindParam(':Description', $Description);
                $stmt->bindParam(':UserId', $UserId);
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
    public function selectAll($key, $direction){
        try
        {
            $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM `".self::tableName."`
                                    ORDER BY $key $direction");
            $stmt->execute();
            $resArray = [];
            foreach($stmt as $array){
                $model = new taskModel;
                $model->tryMap($array);
                array_push($resArray, $model);
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
        finally
        {
            $conn = NULL;
            return $resArray;
        }
    }
    public function selectSingleTask($Id){
        $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM `".self::tableName."`
                                WHERE `TaskId` = :TaskId");
                $TaskId = trim(htmlspecialchars($Id));
            $stmt->bindParam(':TaskId', $TaskId);
        $stmt->execute();
        $resArray = [];
        foreach($stmt as $array){
            $model = new taskModel;
            $model->tryMap($array);
            array_push($resArray, $model);
        }
        return $resArray;
    }
    public function addAModifiedTask($Id){
        $conn = new PDO("mysql:host=".self::ServerName.";dbname=".self::DBName, self::UserName, self::Password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE `".self::tableName."`
                                SET `Name` = :Name, `Description` = :Description
                                WHERE `TaskId` = :TaskId");
                $TaskId = trim(htmlspecialchars($Id));
                $Name = trim(htmlspecialchars($this->Name));
                $Description = trim(htmlspecialchars($this->Description));
            $stmt->bindParam(':TaskId', $TaskId);
            $stmt->bindParam(':Name', $Name);
            $stmt->bindParam(':Description', $Description);
        $stmt->execute();
    }
}