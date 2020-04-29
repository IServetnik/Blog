# **Blog**

This repository provides functionality for the simple blog, both on the local server and on any hosting. All sources are written in PHP without using third-party CMS or frameworks.

  - Pure PHP 7
  - MySQL
  - MVC
  - Work with cookie

---


## Functionality

There are 2 main classes in this blog engine: User, responsible for the userы, and Post, responsible for posts. When creating these classes, you need to pass some data and a manager. The default is the database manager, but if you need other functionality, you can create your own.


### User
This class is in the file **./application/models/User/User.php**. First you need to create the user class(keys **must** be the same as the column names in the database):
```php
$user = new User(['email' => $_POST['email']], ['password' => $_POST['password']]);
```
But if the user is already logged in:
```php
$user = new User();
```

Then you can register a user:
```php
$user->register();
```
Log in:
```php
$user->login();
```
Change his data (e.g. email):
```php
$user->change(['email' => 'example@gmail.com']);
```
Get his data:
```php
$user->getData();
```
Sign out (data is not deleted, only cookies):
```php
$user->signOut();
```

You can also find the user using the GetUser class (for example, the user whose id = 27):
```php
$getUser = new GetUser("WHERE user_id = 27");
$users = $getUser->get();
```
$users will contain an array with the user id key (in our case 27), and the value of the User class.
If you do not specify any parameters in the GetUser class, then you will get all the users.


### Post
This class is in the file **./application/models/Post/Post.php**. First you need to create a Post class (the keys **must** be the same with the column names in the database):
```php
$post = new Post(['title' => $_POST['title']], ['text' => $_POST['text'], ['user_id' => 15]]);
```

Then you can publish this post (one user cannot have 2 posts with the same title):
```php
$post->publish();
```
Change post (e.g. text):
```php
$post->change(['text' => "example text"]);
```
Get post data:
```php
$post->getData();
```
Delete post:
```php
$post->delete();
```

You can also find a post using the GetPosts class (for example, a post whose title = 'Story'):
```php
$getPosts = new GetPosts("WHERE title = Story");
$posts = $getPosts->get();
```
$posts will contain an array with the user id key and the value of the Post class.
If you do not specify any parameters in the GetPosts class, then you will receive all posts.

---



## Settings

Before you start working with a blog, you need to configure several configuration files in the directory **./application/config.**


#### Cookies

In the **cookie.php** file, you can configure the cookie names. All user data will be stored in cookies.

Here is the cookie structure:
```php
[User] => Array
    (
        [email] => Array
            (
                [email] => beckham@gmail.com
            )

        [password] => Array
            (
                [password] => 1234567890
            )
        
        [otherData] => Array
            (
                [user_id] => 2
                [name] => George
                [surname] => Beckham
                [posts_id] => 21, 48, 57, 88
            )
    )
```
To change the names to your own - you just need to change the values opposite the key that you want to change.


#### Database
In the **DB.php** file, you can configure the database column names. You can also change the database connection and table name.

Example user table:
|user_id|name|surname|email|password|posts_id|
|-----|-----|-----|-----|-----|-----|
|1|Karolina|Reid|reid@gmail.com|qwerty|30, 52, 61, 92|
|2|George|Beckham|beckham@gmail.com|1234567890|21, 48, 57, 88|
|3|Bobbie|Grimes|grimes@gmail.com|bobbie1234|8, 34, 71, 80|

File Settings:
```php
"User" => [
        "dsn" => "mysql:host=localhost;dbname=test",

        "tableName" => "User",

        "userName" => "root",

        "userPassword" => "",

        "attribute" => [PDO::ERRMODE_EXCEPTION],

        "columnName" => [
            //required names
            "email" => "email",
            "password" => "password",
            "posts_id" => "posts_id",
            //not required names
            "id" => "user_id",
            "name" => "name",
            "surname" => "surname"]    
    ]
```

Fields email, password and posts_id **must** be, all the rest are optional.


#### Routes
When adding a new page - you should add the model, view and controller to the **routes.php** file according to the format specified in it.