<?php
/**
 * User Model
 * Author: Leonardo Otoni
 */
require_once "../database/database.php";
require_once "../util/constants.php";

function registerUser($email, $firstName, $lastName, $hash, $birthday)
{
    global $db;
    $query = "insert into USER (EMAIL, FIRST_NAME, LAST_NAME, PASSWORD, BIRTHDAY, BLOCKED, RECORD_CREATION) " .
        "values(:email, :firstName, :lastName, :password, :birthday, :blocked, :recordCreation )";

    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":firstName", $firstName);
    $statement->bindValue(":lastName", $lastName);
    $statement->bindValue(":password", $hash);
    $statement->bindValue(":birthday", date("Y-m-d"));
    $statement->bindValue(":blocked", "N");
    $statement->bindValue(":recordCreation", date("Y-m-d"));

    try {
        $statement->execute();
    } catch (Excetion $e) {
        throw new Exception($e->getMessage());
    } finally {
        $statement->closeCursor();
    }

}

function authenticateUser($email, $hash)
{

    $userData = getUserPasswordFromDB($email);
    $hashFromDB = $userData["password"];
    unset($userData['password']);
    $isAuthenticated = (isset($hashFromDB) && ($hashFromDB == $hash)) ? true : false;
    if ($isAuthenticated) {
        return $userData;
    } else {
        throw new Exception(INVALID_USER_PASSWORD_EXCEPTION);
    }

}

function getUserPasswordFromDB($email)
{
    $query = "select id, first_name, password from user where email = :email and blocked='N'";
    global $db;
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);

    try {
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $resultSet = $statement->fetch();
            $userArray = array("userId" => $resultSet["id"], "firstName" => $resultSet["first_name"], "password" => $resultSet["password"]);
            return $userArray;

        } else {
            throw new Exception(USER_NOT_FOUND_EXCEPTION);
        }

    } catch (PDOException $e) {
        throw $e->getMessage();
    } finally {
        $statement->closeCursor();
    }

}
