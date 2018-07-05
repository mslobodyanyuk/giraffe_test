A task:
=====================

Goal: create an ad site
-----------------------

Technical requirements: using laravel php framework, you need to create a basic functionality for creating, editing and deleting ads.

* The code must conform to the PSR-1 / PSR-2 standards (http://www.php-fig.org/psr/psr-1/, http://www.php-fig.org/psr/psr-2/ ) (can be configured in the IDE, for example phpstorm)
* The code must be available on github / bitbucket.
* On the frontend, you can (but not necessarily) use twitter bootstrap (http://getbootstrap.com)

Lead time: Up to a week (with days off) since the introduction. (The task itself will take up to 8-10 hours of work).

Business requirements:
----------------------
 
1. The home page of the site (uri = '/') must have an authorization form, an ad list and a link 'Create Ad', leading to the page for creating / editing an ad for authorized users.

a) Authorization is a form of two fields: username and password. Username must be unique and not empty.
If the user with this username is not in the database, we just need to create it and immediately authorize it, the password should not be empty at the same time.
If the user with the given username exists and the password is correct, then we must authorize the user.
If the user is authorized, then instead of the authorization form, we must display the username of the user and the logout (uri = 'logout') link, when clicked on, the user will be logged off the site.

b) Ads must be located on 5 entities per page. Accordingly, pagination for ads must be implemented.
Each ad should include: title, description, author name and created_at datetime. If the current ad is created by the current authorized user,
then there must be a delete button (uri = '/ delete / $ id', where $ id is the id of the current ad), when clicking on which the ad will be deleted, and the user will be redirected to the start page of the site.

c) If the user is authorized on the site, then on the start page of the site there should be a link 'Create Ad', which will lead to the creation page of the advertisement (uri = '/ edit')

2. The page for creating the ad (uri = '/ edit') allows authorized users to create ads.
This page is a form of creating an ad. This form consists of a title, description and a create button.
Title and description should not be empty. When you click on the create button, the ad should be created, and the user should be redirected to the adview page (uri = '/ $ id', where $ id is the ad id).

3. The ad view page (uri = '/ $ id', where $ id is the ad id) is the title, description, author name and creation date.
If the current ad is created by the current authorized user, then there should be another delete button (uri = '/ delete / $ id', where $ id is the id of the current ad),
when clicking on which the ad will be deleted, and the user will be redirected to the start page of the site.

Additional requirements (not mandatory for implementation):

4. Authorized users should also see the edit button (uri = '/ edit / $ id' where $ id is the ad's id) on the start page and on the adview page (uri = '/ $ id', where $ id is the ad id) ).
When this button is clicked, they should be redirected to the ad editing page (uri = '/ edit / $ id', where $ id is the ad id).
Pages for editing and creating ads must have the same functionality.
The ad editing page should have a save button instead of the create button, which is located on the ad creation page.

5. On the start page of the site, the title of the ad should be made a link that will lead to the adview page (uri = '/ $ id', where $ id is the ad id).


Actions on deployment of the project:
-------------------------------------

* configure domain settings `hosts` file, `httpd.conf`.

* database settings `.env` file

Rename `.env.example` -> `.env`
Make a new database - test_giraffe for example ( utf8_general_ci encoding ),
```
DB_DATABASE = giraffe_test
DB_USERNAME = root
DB_PASSWORD =
```

* starting migrations

`php artisan migrate`

* launch of fixtures - start seeder

`php artisan db:seed`

Administrator user names and passwords:
```
username: Maksim password: 123456	
username: Victor password: admin123	
```


* useful links: 
<https://www.youtube.com/watch?v=7LOtJBFpCIM&t=75s>
