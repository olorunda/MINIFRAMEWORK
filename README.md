## MINI FRAMEWORK

* Create Your Routes in app/Route/Route.php

* Create your views in resources

* Create your controller in app/Controllers using this command 

    `php mini Make Controller ControllerName`
    
* Create console commands in app/Console using this command 

    `php mini Make Command CommandName`
    
* Create middleware in app/MiddleWare 

    `php mini Make MiddleWare MiddleWareName`
    
#####To Use Created MiddleWare 
   
   * In your route you can use it like this
   
   `Route2::get('/admin/user','HomeController@admin',['middleware'=>['MiddleWareName']])`
   
   * In your controller , you can use it like this
   
   `$this->middleware('MiddleWareName')`

Configure your database in config/bootsrap

For Console Application 

* Create console commands in app/Console using this command 

    `php mini Make Command CommandName`

To run console application

`php artisan.php ConsoleFIleName methodName argument `

e.g if you Console name is Crawl and has method crawWebsite that accept argument $url

`php artisan.php Crawl crawWebsite 'http://url-to-crawl';`
