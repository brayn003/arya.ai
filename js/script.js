window.onload = function () {
    // var mediaExpand = document.getElementById("media-expand-arrow");
    // var mediaBar = document.getElementById("media-bar");
    // var mediaCross = document.getElementById("media-bar-cross");
    var messageFeed = document.getElementById("message-feed");
    
    // console.log(mediaExpand + mediaBar);
    
    // function mediaOpen(){
    //     mediaBar.className += " media-bar-open"
    // };
    
    // mediaExpand.addEventListener("click", mediaOpen, false);
    
    // function mediaClose(){
    //     mediaBar.className = "media-bar"
    // };
    
    // mediaCross.addEventListener("click", mediaClose, false);
    
    function wScroll(){
        console.log(messageFeed.scrollTop);
        
        messageHeight = messageFeed.offsetHeight;
    
        var heightToScroll = (90);
        var header = document.getElementById('header');
    
        if(messageFeed.scrollTop > heightToScroll){
            header.className = "header header-scrolled"
            messageFeed.className = "message-feed message-feed-scrolled"
        }
        else if(messageFeed.scrollTop < 1){
            header.className = "header header-unscrolled"
            messageFeed.className = "message-feed"
        }
     };
    
    messageFeed.addEventListener("scroll", wScroll, false);
    
    wScroll();
        
        
    function logMessage(event){
        
        //get time
        function addZero(i){
            if(i < 10){
                i = "0" + i    
            }
            return i;
        }
    
        var d = new Date();    
        var h = addZero(d.getHours());
        var m = addZero(d.getMinutes()); 
        
        //build message
        
        function appendMessage(msg) {
            $('#message-feed').append(
                '<div class="message message-to"><div class="message-name"><p>' + username + '</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div><div class="message-body"><p>' + msg + '</p></div>'   
            );
        }

        function appendRmessage(msg) {
            $('#message-feed').append(
                '<div class="message message-from"><div class="message-name"><p>arya.ai</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div><div class="message-body"><p>' +msg+ '</p></div>'   
            );
        }
        
        //set event trigger
        var messageVal = $('#message-input').val();
        // send message
        function sendMessage(messageVal){
            var request = $.ajax({
              url: "src/main.php",
              method: "POST",
              data: { msg : messageVal },
              dataType: "json"
            });
             
            request.done(function( rmsg ) {
                // alert(rmsg.reply);
                // alert(rmsg.msg);
                appendRmessage(rmsg.reply);
                messageFeed.scrollTop = messageFeed.scrollHeight;
                $('#message-input').prop('disabled', false);
                $('#message-input').attr("placeholder", "Type your message here");
                $('#message-input').focus();

              // $( "#log" ).html( msg );
            });
             
            request.fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
            });
        }
                
        if (event.keyCode == 13) {
            event.preventDefault();
            appendMessage(messageVal);
            messageFeed.scrollTop = messageFeed.scrollHeight;
            sendMessage(messageVal);
            $('#message-input').val("");
            $('#message-input').prop('disabled', true);
            $('#message-input').attr("placeholder", "Arya is thinking ...");
        }        
        
    };
        
    document.addEventListener("keypress", logMessage, false);

    
}