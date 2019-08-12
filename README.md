# loans Api with Laravel 5.8

### Installation

    $ git clone https://github.com/developer2700/loans.git
    $ cd loans
    $ cp .env.example .env # and enter database details
    $ composer install
    $ php artisan key:generate
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan serve

Now you can access via http://localhost:8000.
###### result is like loans.png file inside project folder
###### structure :
    routes/api.php
    routes/web.php
 
    app/Models/    
    app/resources/views/
    app/Controllers/Api/
    app/Request/Api/
  
    /app/Util/Filters/
    /app/Util/Paginate/
    /app/Util/Transformers/
    
    database/migrations/  
    database/seeds/  
  
    css & javascript files are inside /public folder
 
 
   
