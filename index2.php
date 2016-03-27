<?php
    session_start();
    $user = $_SESSION['user'];
    // echo json_encode($_SESSION);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Arya.ai</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	


<!-- chat section -->
    <div class="fullheight container-fluid">
        <div style="height: 10%;background-color:#333;" class="row">
            <div class="col-md-12">
                <h2 style="color: #FFF">arya.ai</h2>
            </div>
        </div>
        <div style="height: 90%;" class="row">
            <div class="fullheight col-md-8">
                <div class="fullheight row">
                    <div class="fullheight phone-canvas">
                        <div class="chat-ui-canvas">
                            <div id="header" class="header header-scrolled">
                                <!-- <div class="user-header-image"></div> -->
                                <p class="text-center chat-title" style="">Go ahead, chat with arya.ai</p>
                            </div>
                            <div id="message-feed" class="message-feed message-feed-unscrolled">
                            </div>
                            <div class="message-input-bar">
                                <div class="message-text-input">
                                    <form class="message-send">
                                        <textarea id="message-input" placeholder="Type your message here" value=""></textarea>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>    
                </div>
            </div>
            <div class="fullheight col-md-4">
                <div style="height: 50%;background: #222; " class="row"></div>
                <div style="height: 50%;background: #222;" class="row">
                    <h3 class="tile-title">Grammar</h3>
                    <div id="grammar-feed">
                    </div>
                </div>
            </div>
        </div>
    </div>
		
        
    <script type="text/javascript" src="lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var username = <?php echo "'".$user['name']."'"; ?>
    </script>
    <script type="text/javascript" src="js/grammar.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>