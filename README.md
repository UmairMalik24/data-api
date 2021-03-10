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
####     Route: https://data.funprimetechnology.com/public_html/data/user
####     Body:Type=>Raw(JSON)
            {                
                "user_id":"",
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
####     Route: https://data.funprimetechnology.com/public_html/all
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

### 7. Language Specific Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/lang/data/{language_id}
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }


### 8. Top 30 Posts of last month

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/data/previous/top30
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }
            

### 9. Top 20 posts of last week

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/data/previous/top20
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
            }

### 9. Get User Favorite Data

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/user/fav
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "user_id":""
            }



## 3. Search Data

### 1. Search by Text

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/search/text
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text":""
            }
### 2. Search by Author Name

####     Request Type: Get
####     Route: https://data.funprimetechnology.com/public_html/search/author
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "author":""
            }
            
            
## 4. Store Data

### 1. Store Category

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/category/store
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
                "cat_title":"Any Name"
            }
            
### 2. Store Text Data

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/data/store
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "userid":"User's Id",
                "Text":"Any text data",
                "ugtext":"User's Generated text",
                "Author":"Text's Author",
                "Sender":"Sender Name",
                "categoryid":"Text Category's id",
                "languageid":"Text Language'id",
            }


### 3. Store User

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/user/store
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token"
                "Name":"User's Name",
                "Email":"User's Email"
            }

### 4. Post a Like 

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/like
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text_id": "Post ID that you want to like"                
            }

### 5. Post a Dislike

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/dislike
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text_id": "Post ID that you want to dislike"
            }

### 6. Report a Post

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/report
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text_id": "Post ID that you want to report"
            }

### 7. Approve a Post

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/data/approve
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text_id": "Post ID that you want to approve"
            }

user_id;
### 8. Block a Post

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/data/block
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "text_id": "Post ID that you want to block"
            }
            
### 6. Add to User Favorites

####     Request Type: POST
####     Route: https://data.funprimetechnology.com/public_html/add/fav
####     Body:Type=>Raw(JSON)
            {                
                "access_token": "Your Generated Token",
                "user_id": "User's ID"
                "text_id": "Post's ID"
            }


