<?php

$discography = [
    "Atom Heart Mother" => [
        "Year" => 1970,
        "Label" => ["Harvest", "Capitol"],
        "Format" => ["LP", "CS", "CD"],
        "Status" => [
            "UK" => "Gold",
            "US" => "Gold",
            "FR" => "Gold"
        ]
    ],
    "The Dark Side of the Moon" => [
        "Year" => 1973,
        "Label" => ["Harvest", "Capitol"],
        "Format" => ["LP", "CS", "CD", "Digital"],
        "Status" => [
            "UK" => "15x Platinum",
            "US" => "Diamond",
            "FR" => "4x Platinum"
        ]
    ]
];

echo "<pre>";
print_r($discography);
echo "</pre>";
?>
