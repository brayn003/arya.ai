window.onload = function () {
    var mediaExpand = document.getElementById("media-expand-arrow");
    var mediaBar = document.getElementById("media-bar");
    var mediaCross = document.getElementById("media-bar-cross");
    var messageFeed = document.getElementById("message-feed");
    
    console.log(mediaExpand + mediaBar);
    
    function mediaOpen(){
        mediaBar.className += " media-bar-open"
    };
    
    mediaExpand.addEventListener("click", mediaOpen, false);
    
    function mediaClose(){
        mediaBar.className = "media-bar"
    };
    
    mediaCross.addEventListener("click", mediaClose, false);
    
    function wScroll(){
        console.log(messageFeed.scrollTop);
        
        messageHeight = messageFeed.offsetHeight;
    
        var heightToScroll = (130);
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
        
        function appendMessage() {
            $('#message-feed').append(
                '<div class="message message-to"><div class="message-name"><h1>You</h1></div><div class="message-body"><p>' + messageVal + '</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
            );
        }
        
        //set event trigger
        
        var messageInput = document.getElementById("message-input");
        
        var messageVal = messageInput.value;
        
        //hipsum responses
        
        var responseTimed;
        
        function timedResponse(){
            setTimeout(
            function appendResponse() {
                var randNumber = Math.floor((Math.random()*10)+1)

                switch(randNumber){
                    case 1:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Gluten-free VHS gentrify, humblebrag blue bottle retro vegan yuccie swag etsy.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 2:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Tilde ethical offal plaid everyday carry meggings banjo gentrify, green juice food truck fap. Beard lumbersexual photo booth.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 3:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Cliche sriracha jean shorts, cronut beard irony meh asymmetrical man braid offal.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 4:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Quinoa man braid tumblr venmo lomo cray microdosing, pinterest celiac affogato fingerstache umami fashion axe schlitz. Ethical four loko truffaut salvia.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 5:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Street art bicycle rights letterpress mixtape cold-pressed. Drinking vinegar flexitarian quinoa twee.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 6:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p> Artisan heirloom iPhone normcore, salvia farm-to-table vice freegan hammock waistcoat.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 7:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p>Pinterest kale chips single-origin coffee, man braid franzen ethical chia plaid locavore small batch hashtag swag. Dreamcatcher kogi fingerstache, lo-fi roof party pork belly.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                    case 8:
                        $('#message-feed').append(
                            '<div class="message message-from"><div class="message-name"><h1>Arthur</h1></div><div class="message-body"><p> Vegan celiac heirloom knausgaard. Paleo mixtape ramps irony lomo.</p></div><div class="message-timestamp"><p>Today ' + h + ' : ' + m + '</p></div>'   
                        );
                        break;
                }
                messageFeed.scrollTop = messageFeed.scrollHeight;
            }, 2500);
        };
        
        
        //fire on enter
        
        
        if (event.keyCode == 13) {
            event.preventDefault();
            messageInput.value= "";
            appendMessage();
            messageFeed.scrollTop = messageFeed.scrollHeight;
            timedResponse();
        }        
        
    };
        
    document.addEventListener("keypress", logMessage, false);

    
}