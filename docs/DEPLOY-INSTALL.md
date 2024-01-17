
A codeigniter php app deploy of applicants

> **Warning:** for development please check [DEVELOPMENT.md](DEVELOPMENT.md)

## Instalation and Deploy

Unfortunatelly this project will assume you use apache2, but for deploy production is not permited

> **Warning:** this project unfortunatelly will force you to have dev knowledge

##### Requirements

* git
* patch
* apache2
* php

> **Warning:** list all the development libs and after install you must deinstall

##### Preparation

We will use a specific user for all the deploy, never runs as the web server user, 
neither as the admin user.

```
adduser --gecos "" --shell /bin/csh --disabled-login --quiet general

addgroup general www-data
```

Remmembered to setup a password ONLY if need.

##### Installation

> **Warning:** first you should change to the new `general` user using `su -l applicants` command


##### Deploy as direct service

TODO

##### Deploy as professional service

TODO