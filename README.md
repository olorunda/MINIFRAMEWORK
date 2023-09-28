### A PLAYGROUND MINI PHP FRAMEWORK , WORK IN PROGRESS

* Create Your Routes in app/Route/Route.php

* Create your views in resources

* Create your controller in app/Controllers using this command 

* Add Database Connection string in `config/bootstrap.php`

    ##### To make a controller run

    `php mini Make Controller ControllerName`
    
    ##### To return an html view in your controller , 
    
        return HtmlView::view('home');
    
    ##### you can also pass data parameter to be used in html view 
    
        $users=['name'=>'Adeolu','email'=>'Olusola@gmail.com']
   
         return HtmlView::view('home',['users'=>$users]);
    
* Create console commands in app/Console using this command 

    `php mini Make Command CommandName`
    
* Create model in app/Models using this command 
    
        php mini Make Model ModelName

* Create migration in app/Migrations using this command 
    
        php mini Make Migration MigrationName

* Run Migration using this command 
    
        php mini Migrate

* Rollback Migration using this command 
    
        php mini Migrate:rollback
           
* Create middleware in app/MiddleWare 

    `php mini Make MiddleWare MiddleWareName`
    
### Sessions

* You can access the php session using the Session helper class

        Session::put('key','value');
        Session::get('key');
        Session::destroy('key');
        Session::all();
    
#### To Use Created MiddleWare 
   
   * In your route you can use it like this
   
         `Route::get('/admin/user','HomeController@admin',['middleware'=>['MiddleWareName']])`
   
   * In your controller , you can use it like this
   
         $this->middleware('MiddleWareName')

Configure your database in config/bootsrap

For Console Application 

* Create console commands in app/Console using this command 

      `php mini Make Command CommandName`

To run console application

        php mini ConsoleFIleName methodName argument 

e.g if you Console name is Crawl and has method crawWebsite that accept argument $url

        php mini Crawl crawWebsite 'http://url-to-crawl';

* To run the application 
       
       php mini serve
