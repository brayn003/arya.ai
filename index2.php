<?php
    session_start();
    $user = $_SESSION['user'];
    echo json_encode($_SESSION);
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
    <a href="logout.php">logout</a>
    <div class="info-panel">
            <div class="info-title">
               <!-- <h1>Hey there!! Do you wanna ask us anything</h1> -->
                
            </div>
        </div>
		
        <div class="phone-canvas">
            <div class="chat-ui-canvas">
                <div id="header" class="header header-scrolled">
                    <div class="top-icons">
					
						<!--Remove back arrow
                        <div class="back-arrow">
                            <div class="back-arrow-line back-arrow-line-1"></div>
                            <div class="back-arrow-line back-arrow-line-2"></div>
                            <div class="back-arrow-line back-arrow-line-3"></div>
                        </div>
						
						Remove back arrow-->
						
						<!--Remove phone icon
						
                        <div class="phone-icon">
                            <img src="http://image-store.andrewhaine.co.uk/chat-widget/icons/phone.png" height="50%">
                        </div>
						Remove phone icon-->
						
						
                    </div>
                    <div class="user-header-image"></div>
                    <div class="user-name-header"><h1>arya.ai</h1></div>
                </div>
                <div id="message-feed" class="message-feed message-feed-unscrolled">
                </div>
                <div class="message-input-bar">
				
                    <div id="media-expand-arrow" class="media-expand-arrow">
					<!-- Arrowline remove
                        <div class="media-expand-arrow-line media-expand-arrow-line-1"></div>
                        <div class="media-expand-arrow-line media-expand-arrow-line-2"></div>
                        <div class="media-expand-arrow-line media-expand-arrow-line-3"></div>
						Arrowline remove -->
						
                    </div>
                    <div class="message-text-input">
                        <form class="message-send">
                            <textarea id="message-input" placeholder="Message..." value=""></textarea>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    <script type="text/javascript" src="lib/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var username = <?php echo "'".$user['name']."'"; ?>
    </script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>