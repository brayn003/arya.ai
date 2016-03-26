<?php
    require 'src/api/chatterbot/php/chatterbotapi.php';
    require 'src/api/stanford-nlp/php/autoload.php';
    require 'src/command.php';
    // echo __DIR__;
    $pos = new \StanfordNLP\POSTagger(__DIR__.'/src/api/stanford-nlp/stanford-postagger/models/english-left3words-distsim.tagger',__DIR__.'/src/api/stanford-nlp/stanford-postagger/stanford-postagger-3.5.0.jar',array('-mx1040m'));
    $handle = fopen("php://stdin","r");


    $factory = new ChatterBotFactory();

    $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
    $bot1session = $bot1->createSession();

    echo "Go ahead type something\n";
    $cmflag = false;
    $parsecode = false;
    while (1) 
    {

        echo "you> ";
        $s = fgets($handle);

        if (!$cmflag) {
            $result = $pos->tag(explode(' ', $s));
            $vbarr = [];
            $nnarr = [];
            foreach ($result as $value) {
                if ($value[1] == "VB") {
                    $vbarr[] = $value[0];
                }
                elseif ($value[1] == "NN") {
                    $nnarr[] = $value[0];
                }
            }
            $com = new Command($vbarr,$nnarr);
            if($parsecode = $com->parseCommand()){
                echo "arya> Sure\n";
                $cmflag = true;
            }else{
                $s = $bot1session->think($s);
                echo "arya> $s\n";
            }
        }else{
            echo "arya> Done!\n";
            $command = new BaseCommand($parsecode);
            $command->execute($s);
            $cmflag = false;
        }
    }
?>