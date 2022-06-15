<?php

class View
{
    public function renderAds(array $ads)
    {
        $index = file_get_contents("index.html");
        $adsTable = "";
        foreach ($ads as $ad) {
            $adsTable .= "<tr>";
            $adsTable .= "<td>" . $ad->getEmail() . "</td>";
            $adsTable .= "<td>" . $ad->getCategory() . "</td>";
            $adsTable .= "<td>" . $ad->getHeading() . "</td>";
            $adsTable .= "<td>" . $ad->getText() . "</td>";
            $adsTable .= "</tr>";
        }
        $response = str_replace("table here pls", $adsTable, $index);
        echo $response;
    }

    public function fieldEmpty()
    {
        echo "the field is empty";
    }

    public function error()
    {
        echo "error";
    }
}