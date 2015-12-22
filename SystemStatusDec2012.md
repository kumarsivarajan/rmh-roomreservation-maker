# Current Open Issues, Dec 2012 #

## GUI Issues ##
In general, the GUI is much improved but there are still nagging issues that make the system not look professional. When the screen is resized, the buttons can end up in all kinds of locations. Very little tablet testing has been done on the SW interface, but what has been done shows that there are problems. In addition, labels seem to have been removed due to an issue with Internet Explorer's support for the "placeholder" tag. We need to figure out some way to make the GUI behave correctly whether on a PC or Mac or tablet.

## RMH Staff approvals ##
Currently, nothing can be approved because  of issues after large changes to the database to maintain history of requests.
### Open tickets ###
> [Issue 62](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=62) – Search Profile Activity is confusing.
Currently, the button on the menu has been changed to Approve Family Profile, which is clearer. It looks like the approval page is improved, but the functionality is broken because of the changes to the database. [Issue 118](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=118) pertained to the text on this button, which was not displaying correctly.  This issue may have been fixed but the ticket has not been closed.

> [Issue 89](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=89) – allow staff to approve modifications and cancellations
This has not been done
In addition, approval of new reservations no longer works because of changes to the database. It may never have completely worked. [Issue 119](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=119) related to this functionality – the status column was not displayed after confirming a reservation.

> [Issue 129](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=129) A report menu button should be added back to this interface
SW interface
Many things have been improved and added. The SW can now create a new family profile, and can then create a new room request based on that family profile.  Room requests can be created, and modified. The overall organization of this interface is much clearer and easier to understand.
### Open tickets ###
> [Issue 83](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=83), 84, 85 These pertain to the ability to modify family profiles and reservation requests. Neither works because of issues with a request id picker, which may relate to the database changes

> [Issue 127](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=127) – creating a new family profile fails when there is no secondary phone number. This is an incorrectly formed SQL. The other optional fields should also be checked for problems like this.

> [Issue 108](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=108) Family Profile Menu distorts when browser is resized on a tablet. In general, there are likely to be many GUI issues with tablets since we had limited ability to test with tablets
> [Issue 116](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=116) Hint on New Family Profile is Confusing – for birthdate, only the format is displayed – there is no signal that this date is a birthday.

> [Issue 121](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=121) – report error message is confusing.  When the end date is in the future, the error message does not indicate the problem. I think one of the contributors to this problem is incorrect error handling in dbReservation.php.
Here is an example of error handling code in this script
```
$result = mysql_query($query);
          if(mysql_num_rows($result)< 1)
          {
           echo mysql_error()." >>>Unable to retrieve from Room Reservation Activity table. <br>";
           mysql_close();
           return false;
          }  
```
This basically says if we retrieve no rows, to treat it as a database error. But that isn't an error - it is often an expected result. If no rows are retrieved, it simply means there are no rows for those dates. I think the database function should simply return an empty reservation list, and let the calling script handle the case of no rows being retrieved in whatever way makes sense.
However, right now this is not a high priority fix. It is ugly but we can live with it. The report logic should be fixed to detect the date being in the future.

> [Issue 128](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=128) family form path is being displayed in the family profile as a diagnosis. This is serious because it indicates that a field in the database is being used incorrectly.

## Database ##
The stored procedures that caused our code to not work on GoDaddy were removed. The logic behind them was incorrect in any case.  The family profile activity table was updated to correctly maintain history, and the ability to put pending family profile records was added to family profile table by adding a status field
The request table was modified to correctly handle history. Now, we have the concept of a request id, which is a request which may have many states over time, and an activity id, which tracks each individual state record within a request. There is a third field – a reservation key, which is autogenerated and simply uniquely identifies each individual record, so we have a one field identifier to pass through email.
The insert routines were modified to handle all of this. Some of the retrieve routines were modified as well – they should always return the latest activity record within a request. The retrieval routines have not been well tested, though, and it isn’t clear if the profile activity table is working in the same way. That table and its routines need to be carefully checked. It also is not clear if the update routines have been fixed.
### Open issues ###
> [Issue 100](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=100) Need to sanitize the arguments in the database functions

> [Issue 121](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=121) – refer to the listing above


## Administrator interface ##
Much of this was already working, but functionality to edit user information was not finished. Unfortunately, it still is not finished. There is now some code, but it does not work right.
Password reset also still does not work
### Open Issues ###
> [Issue 78](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=78) Add the ability for an administrator to edit a user

> [Issue 79](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=79) Add the ability for an administrator to delete a user – we probably don’t want to handle this because there are nasty issues – what happens to the records associated with that user

> [Issue 120](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=120) – cannot change approver password
## Family Pages ##
This does not fully work. There is a lot of code but it may not be completely integrated with the rest of the system.  It can’t be tested until the RMH approver functionality is fixed

> [Issue 88](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=88) This is the enhancement ticket for the family page functionality

> [Issue 128](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=128) family form path is being displayed in the family profile as a diagnosis. This is serious because it indicates that a field in the database is being used incorrectly. Also listed under SW Interface.


## Email ##
Most of the calls to email are still commented out. Very little work seems to have been done. There was some testing on GoDaddy, so it appears that email on that platform does work. We need to uncomment all the calls to email and make sure they work.
### Open Issues ###
> [Issue 91](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=91) Email function for family member function needed. This may have been implemented – there seems to be a new function in functions.php that sends out the URL for the family page
## Help system ##
This seems to be largely implemented and integrated. It needs to be checked for correctness.
### Open issues ###
> [Issue 111](https://code.google.com/p/rmh-roomreservation-maker/issues/detail?id=111) – Making Help page options consistent with the user category. This seems to be the case already.