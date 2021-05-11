<?php

include "DBConfig.php";
class DBConnection
{
    public static function dbConnect(){
        $conn = mysqli_connect(DBConfig::DB_HOST,DBConfig::DB_USER,DBConfig::PASSWORD,DBConfig::DB_NAME);
        if (!$conn){
            echo "Connection failed";
            return null;
        }else{
            return $conn;
        }
    }
}