# arya.ai
A chatter bot application which can recognize certain commands and act accordingly. It's like your virtual personal assisstant.

## Setup
Following need to be installed before you can run the application
- apache >= 2.4.7 
- PHP >= 5.5.9
  (LAMP stack or any other alternative is recommended)
- JRE/JDK >= 1.7

### For web interface
To run the application, clone the repository into your `www` folder (in case of LAMP or WAMP) or 'htdocs' (in case of XAMPP). After cloning the repository open up your browser and visit one of the following urls.
```
http://localhost/arya.ai
```
or
```
http://127.0.0.1/arya.ai
```

### For CLI
Clone the repository, get into the root folder of the repo and use the following command.
```bash
php main.php
```

## Functionality
There are two core functionalities of Arya, as of now
1. Chatting with cleverbot
2. Asking it to execute some tasks

### Tasks
As of now, Arya can only create new notes. To create a new note you must ask the chatter bot to `take a note` or `make a note` or any other alternative sentence. The meaning of the sentence should imply that you want Arya to take a note.

