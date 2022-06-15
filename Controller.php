<?php

require_once "Repository.php";
require_once "Ad.php";
require_once "View.php";

class Controller
{
    private Repository $Repository;
    private View $View;
    private bool $error = false;

    public function __construct()
    {
        $this->View = new View();
        try {
            $this->Repository = new Repository();
        } catch (mysqli_sql_exception $e) {
            $this->error = true;
        }
    }

    public function isError(): bool
    {
        return $this->error;
    }

    public function close()
    {
        $this->Repository->close();
    }

    public function post()
    {
        if (empty($_POST["email"]) or
            empty($_POST["category"]) or
            empty($_POST["heading"]) or
            empty($_POST["text"])) {
            $this->View->fieldEmpty();
            return;
        }
        $ad = new Ad ($_POST["email"], $_POST["category"], $_POST["heading"], $_POST["text"]);
        $this->Repository->createAd($ad);
        $this->View->renderAds($this->Repository->getAds());

    }

    public function get()
    {
        $this->View->renderAds($this->Repository->getAds());
    }

    public function error()
    {
        $this->View->error();
    }
}