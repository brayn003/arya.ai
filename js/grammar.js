
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

                case ".":
                    return "punctuation";
                    break;

                default:
                    return "can't recognize";           
            }
        };