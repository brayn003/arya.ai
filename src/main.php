<?php
    
    session_start();
    $user=$_SESSION['user'];

    require 'api/chatterbot/php/chatterbotapi.php';
    require 'api/stanford-nlp/php/autoload.php';
    require 'command.php';

    $msg = "take a note";

    if (isset($_POST['msg'])) {
        $msg = $_POST['msg'];
    }

    $pos = new \StanfordNLP\POSTagger(__DIR__.'/api/stanford-nlp/stanford-postagger/models/english-left3words-distsim.tagger',__DIR__.'/api/stanford-nlp/stanford-postagger/stanford-postagger-3.5.0.jar',array('-mx1040m'));

    if ($user['botsession'] == "") {
        $factory = new ChatterBotFactory();
        $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
        $bot1session = $bot1->createSession();
        $_SESSION['user']['botsession'] = serialize($bot1session);
    }else{
        $bot1session = unserialize($_SESSION['user']['botsession']);
    }
    
    if (!isset($_SESSION['command'])) {

        $result = $pos->tag(explode(' ', $msg));
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
        if($com->parseCommand()){
            $_SESSION['command']['parsecode'] = $com->parseCommand();
            echo json_encode(array('reply' => 'Sure, what is it?' ));
        }else{
            $rmsg = $bot1session->think($msg);
            echo json_encode(array('reply' => $rmsg));
        }
    }else{
        $command = new BaseCommand($parsecode);
        $command->execute($msg);
        unset($_SESSION['command']);
        echo json_encode(array('reply' => 'Done' ));
    }
        
?>