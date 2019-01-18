<?php
/**
 * User Model
 * Author: Leonardo Otoni
 */
require_once "../database/database.php";

function registerUser($email, $firstName, $lastName, $password, $birthday)
{
    global $db;
    $password = generatePassword($email, $password);

    $query = "insert into USER (EMAIL, FIRST_NAME, LAST_NAME, PASSWORD, BIRTHDAY, BLOCKED, RECORD_CREATION) " .
        "values(:email, :firstName, :lastName, :password, :birthday, :blocked, :recordCreation )";

    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":firstName", $firstName);
    $statement->bindValue(":lastName", $lastName);
    $statement->bindValue(":password", $password);
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

function authenticateUser($email, $password)
{
    $isAuthenticated = false;

    try {
        $passwordFromDB = getUserPasswordFromDB($email);
        $passwordGenerated = generatePassword($email, $password);
        $isAuthenticated = (isset($passwordFromDB) && ($passwordFromDB == $passwordGenerated)) ? true : false;
    } catch (Exception $e) {
        $isAuthenticated = false;
    }

    return $isAuthenticated;

}

function getUserPasswordFromDB($email)
{
    $query = "select password from user where email = :email and blocked='N'";
    global $db;
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);

    try {
        $statement->execute();
        $resultSet = $statement->fetch();
        return $resultSet['password'];
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    } finally {
        $statement->closeCursor();
    }

}

function generatePassword($email, $password)
{
    return sha1($email . $password);
}
