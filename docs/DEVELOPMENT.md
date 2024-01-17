

Is a model–view–controller (MVC) application, providing default structures 
for a database, a web service, and web pages templates.

Data is made using ORM model approach, but you can find a minimal Workbench desing [applicantsdb.mwb](applicantsdb.mwb)
only for informational purposes. For better understanding you must check `db/schema.rb`.

![](applicantsdb.png)

For main info check [README.md](README.md)

## Roadmap

- [ ] Starting with DB schema ( 20230619 )
    - [ ] Database schema: [applicantsdb.png](applicantsdb.png)
    - [ ] Database Dictionary [applicantsdb.sql](applicantsdb.sql)
- [ ] Web desing of the frontend ( 20230622 )
    - [ ] fitmap file [applicants.fig](applicants.)
- [ ] Deploy and configuration of environment (20230623)
    - [ ] cretion of the spp
    - [ ] Minimal structure of the controllers and routes
    - [ ] implementations of the DB
- [ ] Definition of the user cases (20230627)
    - [ ] Workflow
    - [ ] User cases of manager
    - [ ] User cases of participants
- [ ] Deploy
    - [ ] Documentation of deploy
    - [ ] Professional deploy with reverse proxy

### Setup development environment

This system is **web targeted, you must setup Ruby on Rails** for and a database 
of course.. SQLite can be but its better Percona-mySQL or PostgreSQL

This desing of **SQL schema is made using ORM into rails**, you can avoid this 
step but must be in sync with. MysqlWorkbench is not available in all operating 
systems but a file with schema its provided for reference.

The design of the **web interface is made in figmap**, you must import the fig 
file, have a gitmap account and have figmap installed.

### Instalation of figmap 

1. Install required dependencies: xdg-utils, gtk3, nss, notify, libsecret
2. Download the application from https://github.com/Figma-Linux/figma-linux/releases
3. import the figmap file [applicants.fig](applicants.fig)
4. After alteration you must backport and **implement such changes into the views**

### Instalation of Ruby

Unfortunatelly this project will compile ruby, so you must get to sure that you 
already has required development libs and tools, but take into consideration the 
problem of backguard compatibility, so we provide instructions to specific versions 
used in the development process; ruby 3.2 and rails 7.0.5 apart of the specifics gems versions.

##### Requirements

TODO

##### instalation

TODO

##### Get the project sources

This project uses git management:

```
git clone --recursive https://codeberg.org/codeigniter/codeigniter-applicants ~/Devel/codeigniter-applicants

cd ~/Devel/codeigniter-applicants && yarn install
```

> **Warning:** yarn extra step is not necesary for api

Now start to edit the files inside the project.

### WORKING WITH FILES

TODO

Submodules were add with:

```
git submodule add -f -b codeigniter2 https://gitlab.com/codeigniterpower/codeigniterpower vendor/codeigniter2

git submodule add -f -b master https://gitlab.com/codeigniterpower/codeigniterpower vendor/codeigniter3
```

## Contributing

State if you are open to contributions and what your requirements are for accepting them.

For people who want to make changes to your project, it's helpful to have some documentation on how to get started. Perhaps there is a script that they should run or some environment variables that they need to set. Make these steps explicit. These instructions could also be useful to your future self.

You can also document commands to lint the code or run tests. These steps help to ensure high code quality and reduce the likelihood that the changes inadvertently break something. Having instructions for running tests is especially helpful if it requires external setup, such as starting a Selenium server for testing in a browser.

