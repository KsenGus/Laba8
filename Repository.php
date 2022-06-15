<?php
require_once "Ad.php";

class Repository
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqliOpen();
    }

    private function mysqliOpen()
    {
        $this->mysqli = new mysqli('db', 'root', 'helloworld', 'web');
        if (mysqli_connect_errno()) {
            throw new mysqli_sql_exception();
        }
    }

    public function close()
    {
        $this->mysqli->close();
    }

    public function getAds() : array
    {
        $results = $this->mysqli->query("SELECT*FROM ad");
        $ads = [];
        while($row = $results->fetch_assoc()){
            $ads[] = new Ad(
                $row['email'],
                $row['category'],
                $row['heading'],
                $row['text']
            );
        }
        return $ads;
    }

    public function createAd(Ad $ad)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO ad (email, category, heading, text) VALUES (?,?,?,?)");

        $email = $ad->getEmail();
        $category = $ad->getCategory();
        $heading = $ad->getHeading();
        $text = $ad->getText();

        if($stmt->bind_param("ssss",$email,$category,$heading,$text)===false or
            $stmt->execute()===false or $stmt->close()===false){
            throw new mysqli_sql_exception();
        }
    }
}