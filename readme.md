# PHP Developer Assessment About News System Simple

# Installation

### Clone Project
<code>git clone https://github.com/SomboChea/NewsSystemLaravel.git</code>

### Install Libraries
<code> composer update </code>

<code> npm install </code>

<code> npm run prod / dev </code>

### Migration & Run
Note: change .env.example to .env with your database connection

<code> php artisan key:generate </code>

<code> php artisan migrate --seed </code>

<code> php artisan serve </code>

# Features
 + Authentication
 + View All Posts
 + Create a Post
 + View a Post
 + Edit a Post
 + Delete a Post
 + News API in JSON

# Routes
 ### Authentication
 - GET: /login                      => Login into System
 - GET: /register                   => Register a new User
 - GET: /password/reset             => Reset User Password

 ### News
 - GET: /                           => List All Posts
 - GET: /news/post/new              => Create a Post
 - GET: /news/post/{id}             => Show a Post by id
 - GET: /news/post/{id}/edit        => Edit a Post by id
 - GET: /news/post/{id}/delete      => Delete a Post by id

### News API
- GET: /api/news                    => List All Posts in JSON Format
- GET: /api/news/{id}               => Show a Post by id in JSON Format

