<?php

function refactorFunction() 
{

    $vehicleTypes = ['sport-car', 'truck', 'bike', 'boat'];
    $vehiclesSpeed = [150, 60, 100, 50]; // vehicles speed in km/h 
    $distance = 350; // destination distance in km 

    print("Duration of each vehicle to reach destination <br>"); 

    for ($i = 0; $i < count($vehicleTypes); $i++) 
    {
        $time = $distance/ $vehiclesSpeed[$i];
        // The boat needs extra 15 min to get ready, so we add + 0.25H 
        if ($vehicleTypes[$i]=='boat' )
        {
           $time = $time + 0.25;
        }
        echo "$vehicleTypes[$i] : ".$time . " hours <br>";
    }
}

refactorFunction();

//This is for No(1). Refactor the code

