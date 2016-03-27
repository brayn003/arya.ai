window.onload = function () {
    var messageFeed = document.getElementById("message-feed");
    
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

        function elaborate(pos){
            switch(pos){
                case "CC":
                    return "coordinating conjunction";
                    break;

                case "CD":
                    return "cardinal number";
                    break;

                case "DT":
                    return "determiner";
                    break;

                case "EX":
                    return "existential there";
                    break;

                case "FW":
                    return "foreign word";
                    break;

                case "IN":
                    return "preposition/subordinating conjunction";
                    break;

                case "JJ":
                    return "adjective";
                    break;

                case "JJR":
                    return "adjective, comparative";
                    break;

                case "JJS":
                    return "adjective, superlative";
                    break;

                case "LS":
                    return "list marker";
                    break;

                case "MD":
                    return "modal";
                    break;

                case "NN":
                    return "noun, singular or mass";
                    break;

                case "NNS":
                    return "noun plural";
                    break;

                case "NNP":
                    return "proper noun, singular";
                    break;

                case "NNPS":
                    return "proper noun, plural";
                    break;

                case "PDT":
                    return "predeterminer";
                    break;

                case "POS":
                    return "possessive ending";
                    break;

                case "PRP":
                    return "personal pronoun";
                    break;

                case "PRP$":
                    return "possessive pronoun";
                    break;

                case "RB":
                    return "adverb";
                    break;

                case "RBR":
                    return "adverb, comparative";
                    break;

                case "RBS":
                    return "adverb, superlative";
                    break;

                case "RP":
                    return "particle";
                    break;

                case "TO":
                    return "to";
                    break;

                case "UH":
                    return "interjection";
                    break;

                case "VB":
                    return "verb, base form";
                    break;

                case "VBD":
                    return "verb, past tense";
                    break;

                case "VBG":
                    return "verb, gerund/present participle";
                    break;

                case "VBN":
                    return "verb, past participle";
                    break;

                case "VBP":
                    return "verb, sing. present, non-3d";
                    break;

                case "VBZ":
                    return "verb, 3rd person sing. present";
                    break;

                case "WDT":
                    return "wh-determiner";
                    break;

                case "WP":
                    return "wh-pronoun";
                    break;

                case "WP$":
                    return "possessive wh-pronoun";
                    break;

                case "WRB":
                    return "wh-abverb";
                    break;

                default:
                    return "can't recognize";           
            }
        };

        function appendGrammar(result){
            alert(result[0][0]);
            for (var i = 0; i < result.length; i++) {
                $('#grammar-feed').append("<div class=\"grammar\"><p>"+result[i][0]+"<br /><span><b>"+elaborate(result[i][1])+"</b></span></p></div>");
            }
        };
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
                appendGrammar(rmsg.grammar);
                alert(rmsg.grammar);
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