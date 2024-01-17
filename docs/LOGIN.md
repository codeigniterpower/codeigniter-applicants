# codeigniter-login files

The login process uses a Controller that process the login and logout, 
such controller implements the check that currently are into a model, 
but you can change it to another class or just a if-else or whatever check.

There's no need if you want, you can setup a method in the `webappweb/models/Usersmodel.php`
that just use your own storage, user check or way to autenticate the user data.

By default this project uses a embebed sqlite3 database, that you can 
change or move it.

## Database

Since version 2.0.0 the project need a database connection, use the files 
at `webappdb` directory.

Until version 1.0.0 the check per se is made at the file `Indexauth.php` in the auth function.. 
the line of the variable `$rs_access` has the status.. if not TRUE or not NULL the check is passed.

Since version 2.0.0 a database layer will be necessary so an extra file at `webappweb/models/Usersmodel.php`
its necesary to provide functionality, and `$rs_access` is the result of the DB check.

Since version 3.0.0 a imap mail layer was added so an extra files are at `webappweb/libraries/Imap.php` 
and `webappweb/config/imap.php`, `$im_access` is the result of the mail login check.

Since version 4.0.0 a main controller do the check work of the sesion at `webappweb/core/CP_Controller.php`
that all controllers inherit, so `$this->checksession();` is common functionality and reusable code.

Since version 5.0.0 the project provide a sqlite database, by default its 
at `webappdb/codeigniter.db` and extra view/controller are show to noted more the sesion handle.

## Development

The core core process is just 4 files, if you dont use the profiler neither database or imap auth:

```
 webappweb                             The Applicaions directory of Codeigniter renamed
          |
          /controllers                 Place of the controllers that manages logic
          |          /Indexauth.php    Login controller mechanish to init or end session
          |          /Indexhome.php    Another page entry, will check valid sesion object
          /views                       Pages display rendering data from controllers
                /homesview.php         Arbitrary page only viewable under valid session
                /inicion.php           Login view page for init the sesion process
```

The complete implementation uses various files:

* **webappweb** : this directory si the same as `application` of codeigniter 
  framework, just renamed, if you want to use your own name just at `index.php` change 
  the path of `$appication_folder` this directory has nothig to do with the login 
  implementation, its just part of the example implementation if you want to test 
  the hole project as unit.
* **webappweb/controllers/Indexauth.php** Login controller mechanish, this class 
  is a controller/route that will take the authentications actions and process them 
  according to the type of "action", if the action is to "logout" it will invalidate 
  the session, if the action is to "login", it will implement the logic you want 
  against the desired data model. All throught the `auth` public method function.
* **webappweb/controllers/Indexhome.php** Just arbitrary page entry, its provided 
  to exemplify the authentication checks; while `Indexlogin` performs the authentication 
  and exit, `Indexhome` represents any other that should only be seen under the 
  active valid session, it represents controller/ruote that should always check 
  the verified session.
* **webappweb/core/CP_Controller.php** This class is the parent of the controllers, 
  it has the `sessioncheck` method function with the session verification logic, 
  the other controllers/routes when inheriting this will have the same code 
  functionality of and with just one call into the inner controllers they can 
  verify the session. This can be seen in the `Indexhome` controller (which check it 
  before renders a normal page), while `Indexlogin` just represents a session entry 
  or exit point (and do not check nothing).
* **webappweb/views/homesview.php** This is the template view loaded by `Indexhome`, 
  it will be rendered only if the login check in the controller will success. 
  It represents an arbitrary page only viewable under valid session.
* **webappweb/views/inicion.php** This is the template view loaded by the `Indexauth`, 
  it will be rendered only if the login call if to make an auth as the controller 
  said and the lagic of the `sessioncheck` function method determines. 
  It represents a login view page for init the sesion process
* **webappweb/models/Usersmodel.php** This class featured all the logic of 
  the auth internal implementations, depending of you auth methods, will perform 
  authenticacion agains mail (imap) of database (table), here you can added or 
  improve your own methods of authentications.
* **webappweb/libraries/Imap.php** This is a new class library for codeigniter, 
  provided here as part of the project, this class permits to implement all the `imap` 
  basic features from standard php imap module. It will be necesary for your 
  implementation if you want to use imap mail login authentication from model.

#### How to implement and not just copy files

The first thing is and "auth" controller (here named `Indexauth.php`), grab the code 
of `auth` public method function and put it on your login controller/method.

Inside the `auth` put or change the implementations, if you will made your own DB 
check just put a new model, call your DB check and load inthe this function. 

To fast forward the things you can grab the `Usersmodel.php` class that already has 
an database method check for authentication, and just change the DB access and table.
This class has the real logic bussines of the login check.

This is basically all the core process, with the explanation of each file previously 
you can improve a new authenticacion implementation inside codeigniter.

#### Profiler and debugging

Debugging is using our profiler, it requires a special view which is not part of the project 
so it is provided as an extra file in the [vendor](vendor) directory, just take it and put it on 
the views directory and profiler will work.

Until version 3.9.9 it can be simply disabled in the controller constructor, since version 4.0.0 
it is disabled in the core controller constructor inherited by the other controllers.

#### Process simple login

This is the main entry controller, it will load the views of login form page 
to input credentials, also will process such request to validate the login 
process of the credentials.

```
->user/pass--->Indexauth/index--->Indexauth/auth()---->Indexhome/index (sucess)
                                    (check)      |
                                                 |---->Indexauth/index (fail)
```

The magic is done by the `auth($data = NULL, ... , ... )` 

## Authors and acknowledgment

* (c) PICCORO Lenz McKAY @mckaygerhard

## License

CC-BY-SA

## see also

[README.md](README.md)
