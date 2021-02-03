# Data Api Documentation

# Domain:
    https://data.funprimetechnology.com/public_html/

# Routes

## 1. Authentication

### Generate Access Token: 
        
####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/v1/oauth/token
####     Body:Type=>Raw(JSON)
            {
                "grant_type":"client_credentials",
                "client_id":"2",
                "client_secret": "2WyRwTFE8lNgzlcP9rxAPxhSeJ3RdWpm21h2z4oQ"
            }

## 2. Fetch Data

### 1. All Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/data/all
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
            
### 2. All Categories

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/categories
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
            
### 3. Category Specific Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/category/{cat_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
### 4. User Specific Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/userdata/get/{user_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
            
    
### 5. User Favorite Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/fav/{user_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
            
### 6. All Languages

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/fav/{user_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }

### 7. Language Specific Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/lang/data/{language_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }





# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
