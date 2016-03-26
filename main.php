<?php
    require 'src/api/chatterbot/php/chatterbotapi.php';
    require 'src/api/stanford-nlp/php/autoload.php';
    require 'src/command.php';
    // echo __DIR__;
    $pos = new \StanfordNLP\POSTagger(__DIR__.'/src/api/stanford-nlp/stanford-postagger/models/english-left3words-distsim.tagger',__DIR__.'/src/api/stanford-nlp/stanford-postagger/stanford-postagger-3.5.0.jar');
    $handle = fopen("php://stdin","r");


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
        // $com = new Command("take","boobs");
        // $result = $pos->tag(explode(' ', $s));
        
        var_dump($pos);
        $result = $pos->tag(explode(' ', $s));
        var_dump($result);
        // echo json_encode($result);

        // echo "bot1> $s\n";

        $s = $bot1session->think($s);
        echo "arya> $s\n";

        // $s = $bot1session->think($s);
    }
?>