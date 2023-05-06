## MINI FRAMEWORK

-> Create Your Routes in app/Route/Route.php

-> Create your views in resources

-> Create your controller in Controllers

-> Create middleware in app/Request/MiddleWare 
    
   For example say you want to create 'only admin' middleware 
   
   create a method called onlyadmin in `app/Request/MidlleWare` , and define your logic there
   
   you can use the middleware in Route or directly in your controller
   
   -> In your route you can use it like this
   
   `Route2::get('/admin/user','HomeController@admin',['middleware'=>['onlyadmin']])`
   
   -> In your controller , you can use it like this
   
   `(new MiddleWare())->onlyadmin()`

Configure your database in config/bootsrap

For Console Application 

Create your console class file in app/Console folder

To run console application

`php artisan.php ConsoleFIleName methodName argument `

e.g if you Console Class name is Crawl and has method crawWebsite that accept argument $url

`php artisan.php Crawl crawWebsite http:url-to-crawl;`
