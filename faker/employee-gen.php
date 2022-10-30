<?php
    require ('vendor/autoload.php');

    $faker = Faker\Factory::create();
    $conn = mysqli_connect("localhost","root","8571","recordapp_db");

    if(!$conn)
    {   
    die(mysqli_error());
    }  
     
    $faker = Faker\Factory::create();
    for ($i = 1; $i <= 200; $i++) {

        $lastname = mysqli_real_escape_string($conn, $faker->lastname);
        $firstname = mysqli_real_escape_string($conn, $faker->firstname);
        $office_id = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 205));
        $address = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->streetAddress);

        $sql = "INSERT INTO recordapp_db.employee(lastname, firstname, office_id, address) VALUES ('$lastname','$firstname','$office_id', '$address')";
        mysqli_query($conn, $sql);
    }   
?>