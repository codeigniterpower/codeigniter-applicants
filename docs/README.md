# Applicants

Recruitment Request System.

This document is divided into two large sections, the functional section
generalized, and the main technical section of the project at the end of it.
Spanish version of this document [LEEME.md](LEEME.md)

![](applicantsview.png)

## About this system

This is a simple **recruiting request app**

## Executive Summary

The following document presents the fundamental idea of the application, the 
functional requirements and limitations related to the Applicants project.

This document is not the final idea, it is just a mouthpiece of what the 
system, **summarizes only basic idea of what it is, its detail is in development 
of the same, the system is self explanatory but help will be provided**.

- 20230929: Angel Gonzalez, Creation of the document, main developer of the idea
- 20231205: Lenz Gerardo, Restart of the project with more responsible developers
- 20240110: start of new code with new developer Diaz Victor and Tyrone Lucero
- 20240117: interface screens designed by Diaz Victor

## Introduction and description of the idea

#### Purpose

The Applicants system is a portal to apply to jobs, compound 
by a multiple Twitter-style panel, where the user applies to the offered job, 
and an administrative panel where employment opportunities are reviewed or postulated.

In a second phase the system presents a history of the postulates and the 
jobs which have a level of category and a level of classification 
departmental

#### Scope

* Just order postulants regarding vacancies and vacancies for applicants.
* Simple registration, there are no addresses or countries, only immutable data.
* Simple vacancies, only immutable data of the same, title, description, tags.
* It is saved and counted from the registration of the postulate, not depending on the date.
* Users can apply temporary or fixed, in the second registration is requested.

#### Justification of the requirement

Recruitment management required a better work tool. Collect 
and organize the data in order to have history and organization. New mail does not 
offers recruiting management a comfortable or agile work tool 
currently, as was the old intranet mail. There were no means of ordering 
the emails of applicants or classification of the publications.

#### Functional Description of the requirement

one. Simple application interface to the offered workplace.
    - Offer the positions listed, in a public access application
    - When applying each applicant, enter their data:
        - personal minimums ( legal identification number ),
        - account number ( bank account number ), 
        - application type ( temporary or fixed position )
2. Simple interface that classifies applicants
    - Allow filtering by the historical record system ( “criminal” )
    - Administrative interface to manage employment opportunities

#### Inlicit registration

User only enters key / record if they apply for job vacancies 
permanent or fixed, if the position is temporary you only need the account number 
and your legal identification number.

The user enters user and password only in their profile since the system uses 
the first attempt to apply as a user, if not ask to rectify.

#### Application interface

It really is the default interface, and the face of the application, the deployment 
and the index directly shows the vacancy options, in boxes of 3: 4 
proportion or 16: 9 proportion, distributed in at least two columns 
on desk and a column in mobile, but given the content it should be maximum 
three columns; the number of rows is dynamic twitter style.

![](applicantsview.png)

![](applicantslist.png)

The applicant or any registered or not registered user can enter, choose and 
apply, without entering any authentication, this will be required according to the 
chosen vacancy.

Selecting any of the vacancy boxes will present a screen 
detail: at the top the full title, in the second line the company, 
in the central part description and detail of the vacant application including the 
address, and at the end in the form of tags the words of each category, classification
or department to which it applies, but only the one that is registered on the platform 
you will be allowed to opt for permanent positions.

When selecting a vacancy, choose and apply, but only enter your data if not 
you have previously done it (involuntary registration), otherwise you will only be 
ask for the identification number or ID and the account number as described 
implicit registration; therefore, if the vacancy is fixed for a fixed position, it will be 
notify that you must first complete the profile to be registered.

If you were applying for a non-fixed (temporary) vacancy just by having the legal 
identification and bank account number would be sufficient.

#### Administration interface

If the user of the implicit record is a classified user, that is, it is a 
administrative user of the platform, in your profile you will be shown (apart from 
user profile fields) two more fields, one of api key, and one for the 
user key, which will corroborate if you are the real user, thus accessing the 
administration interface. If the user is not a classified, then it will only show 
a single extra field, the user key field which is optional as indicated 
in the previous second section of application interface.

When saving profile or profile data if key and api fields are full 
the user will be able to apply for new job vacancies. Managing to create the key and 
the apy key are not within the project, they are external part and are defined externally, 
the system only reads and corroborates that the data is complied with.

The revision screen will be implicit in the details screen, that is, 
while in the application interface, the detail of each vacancy shows 
only the option to apply, on the administration screen when selecting a vacancy 
this instead of showing the application option will show the list at the bottom 
of applicants who took the opportunity to participate in said job vacancy.

**IMPORTANT**: here unlike the psotulation interface this detail in 
the second line shows the name but also the company's rif.

## Situation

The system started in July, and phase 1 was delivered in August, without 
However, the response was somewhat cold since accesses and artifacts from 
I work for the second phase which as of today are not. Not really 
a server was received to deploy.

The reasons for the initial failure was to have chosen RUBY + RAILS, the technology 
forces the use of dominoes, which implies that a dedicated service is required, 
not being able to deploy almost anywhere but is specialized.

Another reason for failure is the use of reflex on the initial screen that once again 
involves the use of domains, making this more complicated, with a bug present:
https://github.com/stimulusreflex/stimulus_reflex/issues/666 when not running 
nothing good and require unclear understanding.

All of those reasons comes to redone the entire project in php and the most easy 
framework of all times: codeigniter!

## Change control

```
git whatchanged docs / README.md

Author: mckaygerhard < mckaygerhard@gmail.com >
Date: Thu Jan 18 17:13:15 2024 -0400

    update information and pictures to new victor desing

:100644 100644 44f70a4 76795db M docs / README.md

commit f6b7b215b33c092d63be727b128a985e87706673
Author: mckaygerhard < mckaygerhard@gmail.com >
Date: Wed Jan 17 16:53:56 2024 -0400

    initial documentation, project will be modeled in english as primary lang

:000000 100644 00000000 65d9943 A docs / README.md

```

# Technical description

The application uses a database for minimal data storage; 
internally, allows participants to upload information and store it up to 
have an administrator see it.

Easyle, once deployed, the future employee simply logs in, checks 
a quick list of vacancies, then click or touch one and press the apply button, 
complete the fields with non-sensitive personal data, and then wait for a response 
based on such data.

On the administrator side, simply check the list of people who already 
complete this information and check which ones are useful to work or not, then 
you can skip the data and create new vacancies.

If you want to install and implement to test / use this application, read directly [DEPLOY-INSTALL.md](DEPLOY-INSTALL.md)

If you want to develop / improve and contribute to the application, read directly [DEVELOPMENT.md](DEVELOPMENT.md)

## Database dictionary

Can be found in the file [applicantsdb.sql](applicantsdb.sql)
but you can find a minimal Workbench design [applicantsdb.mwb](applicantsdb.mwb)

![](applicantsdb.png)

# LICENSE

CC-BY-NC-SA [ .. ] ( )
