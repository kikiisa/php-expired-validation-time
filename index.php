<?php

require "vendor/autoload.php";
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

function repairDate($date)
{
    if(strpos($date,"/"))
    {
        $part = explode("/",$date);
        $transormation = $part[2] . "-" . $part[1] . "-" . $part[0];
        return $transormation;
    }else{
        return $date;
    }
}
function convertToYMD($dateString, $dateFormat = null) {
    try {
        // Convert date to Carbon instance with given format or default to parse
        if ($dateFormat) {
            $date = Carbon::createFromFormat($dateFormat, $dateString);
        } else {
            $date = Carbon::parse($dateString);
        }
        
        // Return the date in 'Y-m-d' format
        return $date->format('Y-m-d');
    } catch (InvalidFormatException $e) {
        return "Format tanggal tidak valid: " . $dateString;
    } catch (Exception $e) {
        return "Terjadi kesalahan: " . $e->getMessage();
    }
}
function isExpired($issueDate, $validityYears) {
    // check 
    // Convert issue date to Carbon instance
    $issueDate = Carbon::parse($issueDate);
    // Get the current date
    $currentDate = Carbon::now();
    // Calculate the expiration date (validityYears years after issue date)
    $expirationDate = $issueDate->addYears($validityYears);
    // Check if current date is after expiration date
    if($currentDate->greaterThan($expirationDate))
    {
        return "Masa Berlaku Sudah Habis";
    }else{
        return "Masa Berlaku Masih Aktif";
    }

}

$issueDate = '1999-07-12';
$validityYears = 5;
// echo convertToYMD($issueDate,"Y-m-d");
// echo repairDate($issueDate);
echo isExpired(repairDate($issueDate), $validityYears);
