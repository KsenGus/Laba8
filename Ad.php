<?php

class Ad
{
    private string $category;
    private string $email;
    private string $heading;
    private string $text;

    public function __construct(string $category, string $email, string $heading, string $text)
    {
        $this->email = $email;
        $this->category = $category;
        $this->heading = $heading;
        $this->text = $text;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getHeading(): string
    {
        return $this->heading;
    }

    public function getText(): string
    {
        return $this->text;
    }
}