<?php

// first make ptr and open and read file 
$filePtr = fopen("myFile.txt", "r");

// check the file is exist or not 
if(!$filePtr) {
    die ("This file doesn't exits.");
}

// read line by line
while($a=fgets($filePtr)) {
    echo $a;
    echo ""
}
echo "End of the line reached in file";

fclose($filePtr); // closing file 