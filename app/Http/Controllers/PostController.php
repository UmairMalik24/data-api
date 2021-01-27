<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\User;
use App\Models\Category;
use App\Models\Passport;
use App\Models\Text_Details;
use App\Models\Favorite;
use Validator;



class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function store_data(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
        
                $data = new Data;
                $data->user_id = $req->userid;
                $data->text_data = $req->text;
                $data->ug_text_data = $req->ugtext;
                $data->author = $req->author;
                $data->sender_name = $req->sender;
                $data->cat_id = $req->categoryid;
                $data->lan_id = $req->languageid;
                $data->is_approve = 0;
                $data->is_blocked = 1;        
                $data->save();
                $id = Data::orderByDesc('id')->first();
                $details = new Text_Details;
                $details->text_id = $id['id'];
                $details->likes = 0;
                $details->dislikes = 0;
                $details->reports = 0;
                $details->save();

                return "Data Saved SuccessFully";
            }
            else    
                return "Invalid Token";

        }
    }
    public function search(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
            
                $name = $req->name;
                $result = Data::where('text_data','LIKE',"%{$name}%")->get();
                return $result;
            }
            else    
                return "Invalid Token";
        }
    }
    public function searchbyname(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $author = $req->author;
                $result = Data::where('author','LIKE',"%{$author}%")->get();
                return $result;
            }
            else    
                return "Invalid Token";
        }
    }
    public function addCategory(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
            
                $cat = new Category;
                $cat->cat_title = $req->Title;
                $cat->save();
                return "New Category Added";
            }
            else    
                return "Invalid Token";
        }
    }
    public function addUser(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {        
                $user = new User;
                $user->name = $req->name;
                $user->email = $req->email;
                $user->save();
                return "New User Added";
            }
            else    
                return "Invalid Token";
        }
    }
    public function addFavorite(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $fav = new Favorite;
                $fav->user_id = $req->user_id;
                $fav->text_id = $req->text_id;
                $fav->save();
                
                return "Favorite Added";
            }
            else    
                return "Invalid Token";
        }
    }
    public function like(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $user = $req->TextId;
                Text_Details::where('text_id',$user)->increment('likes');
                return "Liked";
            }
            else
                return "Invalid Token";
        }
    }

    public function dislike(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {        
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $user = $req->TextId;
                Text_Details::where('text_id',$user)->increment('dislikes');
                return "Disliked";
            }
            else
                return "Invalid Token";
        }
    }

    public function report(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {           
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $user = $req->TextId;
                Text_Details::where('text_id',$user)->increment('reports');
                return "Reported";
            }
            else
                return "Invalid Token";
        }
    }
    public function approve(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {            
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $id = $req->TextId;
                Data::where('id',$id)->update(['is_approve'=>1,'is_blocked'=>0]);
                return "Post Approved";
            }
            else
            {
                return "Invalid Token";
            }
        }
    }
    public function block(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {        
            $token = $req['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
            
                $id = $req->TextId;
                Data::where('id',$id)->update(['is_approve'=>0,'is_blocked'=>1]);
                return "Post Blocked";

            }
            else
            {
                return "Invalid Token";
            }
        }
    }

    
}
