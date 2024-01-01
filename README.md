# short_url_generate
## About Project

This project is for url shortener system.First user have to register and then login, User will enter url in the input type and after clicking on 
submit button new short url will generate. In the table all short url and large url and total count button are shown,if total count button is clicked total short url clicked number will be shown.Apis are also created for this project.postman collection is added with this project.  


## Install Process

-First clone the project from "https://github.com/zishan07cse/short_url_generate" to local repository
-Now setup .env file. Open a .env file change the database name 'DB_DATABASE=short_url_system'
-Open the command line and run the command "php artisan:migrate" then run the following command
"php artisan:serve"


### For accessing Rest API please use the postman collection
Postman collection path:postman_collection\Cms management.postman_collection.json

Implement a RESTful API for accessing the articles. .The API should support the following operations: .Retrieve a list of all short url.Retrieve a list of all shor url for authenticated users.
