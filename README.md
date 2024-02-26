# short_url_generate
## About Project

This project is for url shortener system. First user has to register and then log in, The User will enter url in the input type, and after clicking on 
the submit button new short URL will be generated. In the table all short URLs large URLs and total count buttons are shown, if the total count button is clicked total short URL clicked number will be shown. Apis are also created for this project. postman collection is added to this project.  


## Install Process

- Clone your project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install on your cmd or terminal
- Run npm install or yarn install then run npm run dev or yarn dev
- cp .env.example .env
- php artisan key: generate
- php artisan migrate
- php artisan db: seed
- php artisan serve
  
Go to http://localhost:8000/


### For accessing Rest API please use the Postman collection
Postman collection path:postman_collection\Short Url Generation.postman_collection.json

Implement a RESTful API for accessing the articles. The API should support the following operations: Retrieve a list of all short URLs.Retrieve a list of all short URLs for authenticated users.
