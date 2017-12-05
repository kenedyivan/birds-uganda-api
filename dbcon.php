<?php
date_default_timezone_set ("Africa/Kampala");
session_start();
class dbcon{
    
    public function db_properties(){
        
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "birds";
        
        return new mysqli($host, $user, $password, $database);
    }
    
}