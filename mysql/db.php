<?php
class db{
    public static $conn = NULL;

    public static function loginControl($username,$password){
        $loginCheck= self::query_fetch_assoc("SELECT * FROM users WHERE user_name='".$username."' AND password='".$password."'");
        return (bool)$loginCheck;
    }

    public static function register($name,$username,$password){
        $loginCheck= self::query_insert("users",array("name","user_name","password"),array($name,$username,$password));
        return (bool)$loginCheck;
    }

    public static function query($sql){
        return self::$conn->query($sql);
    }

    public static function query_fetch_assoc($sql,$fetch="fetch"){
        $query = self::$conn->query($sql);
        return $query->$fetch(PDO::FETCH_ASSOC);
    }

    public static  function query_fetch_column($sql){
        $query = self::$conn->query($sql);
        return $query->fetchColumn();
    }

    public static function query_delete($tableName,$params,$values){

        $valuePlaceholders = implode(", ", array_map(function ($value) {
            return $value."=?,";
        }, $params));
        $valuePlaceholders = substr($valuePlaceholders, 0, -1);

        $sql = "DELETE FROM $tableName WHERE $valuePlaceholders";

        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($values);
    }

    public static function query_insert($tableName,$params,$values){

        $paramString = implode(", ", $params);
        $valuePlaceholders = implode(", ", array_map(function () {
            return "?";
        }, $values));

        $sql = "INSERT INTO $tableName ($paramString) VALUES ($valuePlaceholders)";

        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($values);
    }

    public static function query_update($tableName, $params, $values, $condition)
    {
        $setString = implode(" = ?, ", $params) . " = ?";
        $sql = "UPDATE $tableName SET $setString WHERE $condition";

        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($values);
    }

    public static function getSiteSetting($property){
        $query = "SELECT value FROM site_settings where property='$property'";
        return self::query_fetch_column($query);
    }



}