<?php
    require 'api/php/chatterbotapi.php';
    $handle = fopen ("php://stdin","r");


    $factory = new ChatterBotFactory();

    $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
    $bot1session = $bot1->createSession();

    // $bot2 = $factory->create(ChatterBotType::PANDORABOTS, 'b0dafd24ee35a477');
    // $bot2session = $bot2->createSession();

    echo "Go ahead type something\n";
    while (1) 
    {
        echo "you> ";
        $s = fgets($handle);

        // echo "bot1> $s\n";

        $s = $bot1session->think($s);
        echo "arya> $s\n";

        // $s = $bot1session->think($s);
    }
?>