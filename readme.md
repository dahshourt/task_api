## installation project laravel
This is just local installation using something like MAMP/WAMP or xampp. Of course you are free to use homestead if you like.

1. clone the repo and cd into it
1. `composer install`
1. make sure db is running and credentials are setup in config\database.php (or in your .env file).
1. If you have no .env file you can use the example one. Just rename .env.example to .env. Enter your db credentials here.
1. `import database "task" whick attached in project
1. (Optional) `php artisan test ` to run some application tests I have written. Have a look at them in the `tests` folder.
1. `php artisan serve`
1. Visit localhost:8000 in your browser
## Test our API with Postman
Install the Postman client [here](https://www.getpostman.com/)

From the postman client we can create get, put, post and delete requests with parameters and later on even add authorization headers. It took me a few minutes to get comfortable with their dashboard but I grew to digg it quickly. I'd heard about Postman for a long time but for whatever reason haven't incorporated it into my dev workflow. For building APIs Postman is a great tool!
In **routes/api.php** define our endpoints:

```
Route::get('/products',[\App\Http\Controllers\ProductController::class,'index']);
Route::post('/products',[\App\Http\Controllers\ProductController::class,'store']);
Route::patch('/products/{id}',[\App\Http\Controllers\ProductController::class,'update']);


Route::get('/cards',[\App\Http\Controllers\CardController::class,'index']);
Route::post('/cards',[\App\Http\Controllers\CardController::class,'store']);
```
## First how to test project via `api postman` url
### first link :http://127.0.0.1:8000/api/products/ with `post` method

#### add header as below
<img width="741" alt="Capture" src="https://user-images.githubusercontent.com/42882017/124143826-bb24ea00-da8b-11eb-890b-ef95372fb764.PNG">

### add content as json content in body api 
```
{
"product_name":"your project name you want to enter",
"price":"it's price"
}
```
as below in picture
<img width="479" alt="Capture" src="https://user-images.githubusercontent.com/42882017/124144406-38505f00-da8c-11eb-91b7-c7083dcacf9f.PNG">
---
**NOTE**
price field  must be in integer number,
---
### second link :http://127.0.0.1:8000/api/products/ with `get` method
it retrieve all products in database as below:
<img width="693" alt="Capture" src="https://user-images.githubusercontent.com/42882017/124146613-3ab3b880-da8e-11eb-8244-b75ba871856b.PNG">

### second link :http://127.0.0.1:8000/api/cards/ with `post` method
### add content as json content in body api
```
{
"product_name":[ enter your product you want separate by ','],
"currency_name":" "//eg EGP or USD
}
```
---
**NOTE**
product_name  field  must be array of name of products
products must be in exist in database before
currency_name must be egp or dollor or any thing but should exist in database on table currency
bill of products donot store in table it show after you insert your products and cuurency name
---
#### add content as json content in body api
<img width="690" alt="Capture" src="https://user-images.githubusercontent.com/42882017/124164987-9cc9e900-daa1-11eb-84f1-dde6d3add573.PNG">
