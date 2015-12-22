# Introduction #

This page has the list of global constants and functions that can be used throughout the application. The `core/globalFunctions.php` file contains all the functions that could commonly be used, app wide. It will be included by the _header.php_ file, so if you have included `header.php` file in your page then these functions should be available to you. If not, you can directly include it. If you think something might be used by others, feel free to add your functions there (including a short description and parameter info would be helpful).

Another important thing that could be used, app wide, is a global config file `core/config.php`. This file could include core app configuration info that is required to, maybe, start the app or set initial configuration. This could also include email info or other things that could be used globally. For now this includes a PHP function to set the default timezone and a security salt for hashing passwords/strings/tokens. This file is also included in the `header.php` file, so if you have included `header.php` those variables, or config info should be available to you.

# Important global constants #
Refer `core/config.php`

### Including files and internal links _PATH_ ###
  * **ROOT\_DIR**
> whenever you are including a file please ALWAYS (even if it is already in the root folder) use this instead of the homeroom function (`dirname`).

> `ROOT_DIR` consists of the full path to our application root.

> Usage:
```
include_once (ROOT_DIR . '/domain/Requests.php');
//this will include the file /Applications/MAMP/htdocs/rmh-reservation-maker/domain/Requests.php
```


  * **BASE\_DIR**
> whenever you are generating a url within our app, i.e. when using `<a href=` or `<form action=` etc, use `BASE_DIR`. So if you have to output anything (i.e. not used internally, then you will have to use this constant)

> `BASE_DIR` consists of the path to our application root (starting from the `$_SERVER['DOCUMENT_ROOT']` but excluding the document root itself)

> Usage:
```
<a href="<?php echo BASE_DIR;?>/login.php">Login</a>
<!-- here href='/rmh-reservation-maker/login.php' -->
```
```
<form method = "POST" action ="<?php echo BASE_DIR;?>/reset.php"></form>
<!-- here action='/rmh-reservation-maker/reset.php' -->
```

  * **CSS\_DIR**
> the css directory relative to the document root

  * **JS\_DIR**
> the js directory relative to the document root

**Note:** Since these core defines are in `core/config.php`, it needs to be included first. However, since `header.php` includes this file, you should be able to use these path constants.

# Important global functions #
Refer _core/globalFunctions.php_
### Hashing strings ###
As we all know, it is important for us to store the hashed version of the password instead of plain-text in the database. However, the hashing algorithm that is used to store the password should be the same as the one used for comparison (while retrieval), therefore, the **`getHashValue($value, $salt=true)`** function hashes any string that is passed as the parameter. And it should also be used for comparison.

Usage:
```
$string = 'sampleStringToBeHashed';
$hashedValue = getHashValue($string); 
/*
the second parameter is a boolean which is true by default, 
it simply directs the function to use (true) or not to use (false) 
the salt value (set in the config file) for hashing
*/
```
### Sanitizing data ###
Data sanitizing is important as we would want to avoid any kinds of SQL injections or other user input related attacks. User input cannot be trusted! So the **`sanitize($data, $mysql=false)`** function tries to filter harmful data. However, filtering the data depends on where you are performing the sanitization, so this function may not be quite complete yet but for now it handles two instances:
  1. when you want to escape html characters
  1. when you are actually storing the data in the database and want to escape MySQL unsafe characters.

> So we can always add extra measures in the function to make it even better later as our project develops.
Usage:
```
$sanitizedData = sanitize($_POST['unsafeUserInput']); //use with normal PHP functions

$dbSafeData = sanitize($_POST['unsafeUserInput'], true); //use while interacting with the db (an active mysql connection required)
```

So, if you have not already included the `header.php` file in your page, you can directly include `globalFunctions.php` file and use these function (this might be the case when you do not need the header file -- in domain objects or other pages that do not require user interface).