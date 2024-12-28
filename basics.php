<?php
    $name = "Bishal"; //string
    $age = 22;  // integer
    $price = 9.99; // float
    $isActive = true; //boolean

    echo  "Hi, My name is {$name}.<br>"; 
    const Greeting = "Welcome to PHP!";
    echo Greeting."<br>";

    $day = "Monday";
    switch ($day) {
        case "Monday":
            echo "Start of the week.";
            break;
        case "Tuesday":
            echo "Middle of the week.";
            break;
        default:
            echo "It's a end of the week.";
    }

    echo "<br>";

    // loop
    for($i = 1; $i <=5; $i++) {
        echo "Number: $i"."<br>";
    }

    // for each
    $fruits = ["Apple", "Banana", "Cherry"];
    foreach ($fruits as $fruit) {
        echo $fruit."<br>";
    };

    // creating functions
    function greet($name="Komal koirala") {
        echo "My name is ".$name."."."<br>";
    }

    echo greet();

    // indexed Arrays
    $numbers = [2,1,4,3,6,5];
    $numbers.array_push($numbers, 7); //Pushing value
    $numbers.sort($numbers); // sort the value
    foreach ($numbers as $number) { //foreach loop
        echo $number."\n";
    }


    
    echo"<br>";

    // Associative Arrays
    $user = ["name" => "Bishal koirala", "number" => "9811034442", "Address" => "Sundarharicha=10, morang"];
    foreach($user as $key => $value) { //for each loop for //Associative arrays
        echo $key.": ". $value . "<br>";
    }


    // working with string
    $stringOne = "Bishal koirala";
    $stringTwo = "Hello world ";
    echo strlen($stringOne); // output is 13
    echo "<br>";
    echo str_replace("world", "PHP", $stringTwo);

?>