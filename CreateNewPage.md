# Introduction #

There are few things that you will have to follow in order for the whole Session Management flow to function properly. This page is about important things that you need to keep in mind while creating a new page. This guideline also includes creating and validating forms.

Please refer to the `template.php` file in the repository for an example page. You can save it as your new page and continue there forward.

## File naming convention ##

In order to be consistent throughout our code base, we will be using camel case (with lowercase first letter) to name our files.

Example:
  * thisIsATestFile.php
  * anotherLongNameForFile.php
  * template.php

Note: Any existing file that have this inconsistency will be renamed to follow this convention.


# Details #
  * When you are done saving the `template.php` file as your new page, you will need to modify the `header.php` file to include the required access level.
> > Example:
```
$permission_array['template.php'] = 3;
/*
where template.php is your file
3 is the permission level required to access your page. 
permission level can be 0 through 3, 
where 0 is world, 1 is social worker, 2 is RMH Reservation manager
and 3 is admin
*/
```
  * After permission has been added, you can switch to your newly created file and start working from there. There are detailed comments available in the file to help you through the process.
  * Overall **structure** of `template.php`
    1. begins by starting the session and session cache expiry
    1. sets the title of the page (this is something that you might want to modify)
    1. includes the header file
    1. output the `HTML`
    1. includes the footer file
  * **Include files**: It is important to include the following two files if you are providing a user accessible page.
    1. **`header.php`** includes all our session management codes and permission level requirement for all pages. Further, includes global function files discussed later. Also includes the `<html>`, `<head></head>`, `<body>` tag and some header divs
    1. **`footer.php`** includes the closing tag `</body>` and `</html>`


> Therefore, it is important to include these two files for a complete html formatted page.
  * **(Partially) Secure Form**
> > anti-CSRF protection has been implemented in forms. So there is a requirement that each form you create have a token field and in every `POST` data handler - you check for a valid token. This can simply be done by following the information in the template file. Anyway, the basic idea is:
    1. once you have a `<form>` setup, just add the php code snippet after your `<form>` tag:
```
<?php echo generateTokenField(); ?>
```
    1. **`generateTokenField()`** is responsible for creating a hidden field with randomly generated token. Refer to the template for an example.
    1. check for the validity of the token: this should be done when you handle the `$_POST` data with the **`validateTokenField($postData)`** function. Just validate the data using:
```
if(isset($_POST['form_token']) && validateTokenField($_POST))
{
  //token is valid, perform other functions here
}
else
{
  //token is invalid, record the error
}
```
> > > Refer to the template for more detailed information.
