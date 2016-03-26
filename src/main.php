<?php
    
    session_start();
    $user=$_SESSION['user'];

    require 'api/chatterbot/php/chatterbotapi.php';
    require 'api/stanford-nlp/php/autoload.php';
    require 'command.php';

    // $msg = "How are you?";

    if (isset($_POST['msg'])) {
        $msg = $_POST['msg'];
    }

    // $pos = new \StanfordNLP\POSTagger(__DIR__.'/api/stanford-nlp/stanford-postagger/models/english-left3words-distsim.tagger',__DIR__.'/api/stanford-nlp/stanford-postagger/stanford-postagger.jar');

    if ($user['botsession'] == "") {
        $factory = new ChatterBotFactory();
        $bot1 = $factory->create(ChatterBotType::CLEVERBOT);
        $bot1session = $bot1->createSession();
        $_SESSION['user']['botsession'] = serialize($bot1session);
    }else{
        $bot1session = unserialize($_SESSION['user']['botsession']);
    }
    
    // echo json_encode("$bot1session");
    // echo "Go ahead type something\n";
    // while (1) 
    // {
        // echo "you> ";

        // $s = $msg;
        
        // var_dump($pos);
        // $result = $pos->tag(explode(' ', "What does the fox say?"));
        // var_dump($result);

        $rmsg = $bot1session->think($msg);
        echo json_encode(array('reply' => $rmsg ));
    // }
?>