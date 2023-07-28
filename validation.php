<?php

function textValidation($text) {
    if(empty($text)) {
        return "No input";
    } 
    elseif(ctype_alpha(str_replace(" ", "", $text)) == false){
         return "The field can only contain letters and spaces";
    }
    elseif(strlen($text) > 50) {
        return "This field can containt a maximum of 50 characters";
    }
     else {
        return false;  
    }
}

function adressValidation($text) {
    if(empty($text)) {
        return "No input";
    } else {
        return false;  
    }
}

function usernameValidation($username, $conn) {
    $sql = "SELECT `username`
    FROM `korisnik`
    WHERE `username` LIKE '$username'";

    $result = $conn->query($sql);

    if(empty($username)) {
        return "Enter value!";
    } elseif(preg_match("/\s/", $username)) {
        return "Username can't containt spaces!";
    } elseif($result->num_rows > 0) {
        return "This username is already taken, please choose another one.";
    } elseif(strlen($username)<5 and strlen($username)>50) {
        return "Your username must be between 5 and 50 characters long!";
    } else {
        return false;
    }

}

function passwordValidation($pass) {
    if(empty($pass)) {
        return "Enter a password";
    } elseif(preg_match("/\s/", $pass)) {
        return "Your password must not contain spaces!";
    } elseif(strlen($pass)<5 ||strlen($pass)>25) {
        return "Your password must be between 5 and 25 characters long!";
    } else {
        return false;
    }
}
