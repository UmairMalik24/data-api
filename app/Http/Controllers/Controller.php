<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TokenValidation;
use App\Models\Data;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Favorites;
use App\Models\Category;
use App\Models\Passport;
use App\Models\Text_Details;
use App\Models\User_Generated;
use Carbon\Carbon;
use Validator;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function Alldata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();
            if(count($access)>0)
            {
                $data = Data::all();
                // $cat = Category::all();   
                $arra = array();
                $n=0;
                foreach($data as $dat)
                {
                    
                    $cat = Category::where('id',$dat->cat_id)->first();
                    $details = Text_Details::where('text_id',$dat->id)->first();
                    $lan = Language::where('id',$dat->lan_id)->first();
                                    
                    $arra[$n] = [ 
                            
                        "user_id"=>$dat->user_id,
                        "cat_id"=>$cat['id'],
                        "cat_title"=>$cat['cat_title'],
                        "text_id"=>$dat->id,
                        "text_data"=>$dat->text_data,
                        "ug_text_data"=>$dat->ug_text_data,
                        "author"=>$dat->author,
                        "sender_name"=>$dat->sender_name,
                        "language_id"=>$lan['id'],
                        "language_name"=>$lan['name'],
                        "details_id"=>$details['id'],
                        "likes"=>$details['likes'],
                        "dislikes"=>$details['dislikes'],
                        "reports"=>$details['reports'],
                        "is_approved"=>$dat->is_approved,
                        "is_blocked"=>$dat->is_blocked,
                            
                                
                    ];                   
                    $n++;                
            
                }
                return $arra;
            }
            else    
                return "Invalid Token";
        }
        
            

        
    }
    // public function usergenData(Request $request)
    // {

        
    //     $validator = Validator::make($request->all(), [
    //         'access_token' => 'required',
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
    //     }
    //     else
    //     {
        


    //         $token = $request['access_token'];
    //         $access = Passport::where('id',$token)->get();
        
    //         $data = Data::where('is_approve',1)->where('is_blocked',0)->orderByDesc('id')->get();
    //         $arra = array();
    //         $n=0;    
           

    //         foreach ($data as $dat)
    //         {
                    
    //                 $cat = Category::where('id',$dat->cat_id)->first();
    //                 $details = Text_Details::where('text_id',$dat->text_id)->first();
    //                 $lan = Language::where('id',$dat->lan_id)->first();

    //                 $arra[$n] = [ 
                    

    //                     "user_id"=>$dat->user_id,
    //                     "cat_id"=>$cat['id'],
    //                     "cat_title"=>$cat['cat_title'],
    //                     "text_id"=>$dat->id,
    //                     "text_data"=>$dat->text_data,
    //                     "ug_text_data"=>$dat->ug_text_data,
    //                     "author"=>$dat->author,
    //                     "sender_name"=>$dat->sender_name,
    //                     "language_id"=>$lan['id'],
    //                     "language_name"=>$lan['name'],
    //                     "details_id"=>$details['id'],
    //                     "likes"=>$details['likes'],
    //                     "dislikes"=>$details['dislikes'],
    //                     "reports"=>$details['reports'],
    //                     "is_approved"=>$dat->is_approved,
    //                     "is_blocked"=>$dat->is_blocked,

                        
    //                 ];
                   
    //             $n++;    
                
    //         }
    //         return $arra;
    //     }
    // }

    


        

    

    public function cat_specific($id,Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
            
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {

                $data = Data::where('cat_id',$id)->where('is_approve',0)->where('is_blocked',1)->orderByDesc('id')->get();
                
                $arra = array();
                $n=0;
                foreach($data as $dat)
                {
                    
                    $cat = Category::where('id',$dat->cat_id)->first();
                    $details = Text_Details::where('text_id',$dat->id)->first();
                    $lan = Language::where('id',$dat->lan_id)->first();
                
                    
                    
                    
                            
                            $arra[$n] = [         
                            "user_id"=>$dat->user_id,   
                            "cat_id"=>$cat['id'],
                            "cat_title"=>$cat['cat_title'],
                            "text_id"=>$dat->id,
                            "text_data"=>$dat->text_data,
                            "ug_text_data"=>$dat->ug_text_data,
                            "author"=>$dat->author,
                            "sender_name"=>$dat->sender_name,
                            "language_id"=>$lan['id'],
                            "language_name"=>$lan['name'],
                            "details_id"=>$details['id'],
                            "likes"=>$details['likes'],
                            "dislikes"=>$details['dislikes'],
                            "reports"=>$details['reports'],
                            "is_approved"=>$dat->is_approved,
                            "is_blocked"=>$dat->is_blocked,                    
                            

                            ];
                        
                    $n++;    
                    

                    
                }
                return $arra;   
            }
            else
            {
                return "Invalid Token";
            }
        }
    
    }

    public function all_cat(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();   
            if(count($access)>0)
            {
                $data = Category::all();    
                return $data;
            }
            else
                return "Invalid Token";
        }
    
    }

    // public function spec_user_gen($id)
    // {
    
    //     $data = User_Generated::where('user_id',$id)->where('is_approve',1)->where('is_blocked',0)->get();
    //     $arra = array();
    //     $n=0;    
           

    //     foreach ($data as $dat)
    //     {

    //         $cat = Category::where('id',$dat->cat_id)->first();
    //         $details = Text_Details::where('text_id',$dat->text_id)->first();
    //         $lan = Language::where('id',$dat->lan_id)->first();

    //         $arra[$n] = [ 
                    
    //             "user_id"=>$dat->user_id,
    //             "cat_id"=>$dat->cat_id,
    //             "cat_title"=>$cat['cat_title'],
    //             "text_id"=>$dat->id,
    //             "user_gen_data"=>$dat->ug_text_data,
    //             "ug_author"=>$dat->author,
    //             "ug_sender_name"=>$dat->sender_name,
    //             "is_approve"=>$dat->is_approve,
    //             "is_blocked"=>$dat->is_blocked,
    //             "language_id"=>$dat->lan_id,
    //             "language_name"=>$lan['name'],                       
    //             "details_id"=>$details['id'],
    //             "likes"=>$details['likes'],
    //             "dislikes"=>$details['dislikes'],
    //             "reports"=>$details['reports']                            
                
    //         ];
                   
    //         $n++;    
                
    //     }
    //     return $arra;



        
    
    // }

    public function user_fav($id,Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();

            if(count($access)>0)
            {
        
                $favorite = Favorites::where('user_id',$id)->get();
                
                $arra = array();
                $n=0;
                foreach($favorite as $fav)
                {
                    $data = Data::where('id',$fav->text_id)->where('is_approve',1)->where('is_blocked',0)->orderByDesc('id')->get();
                    foreach($data as $dat)
                    {
                        $cat = Category::where('id',$dat->cat_id)->first();
                        $details = Text_Details::where('text_id',$dat->id)->first();
                        $lan = Language::where('id',$dat->lan_id)->first();
                        
                    
                    
                        
                            
                                $arra[$n] = [ 
                                

                                    
                                    "user_id"=>$dat->user_id,   
                                    "cat_id"=>$cat['id'],
                                    "cat_title"=>$cat['cat_title'],
                                    "text_id"=>$dat->id,
                                    "text_data"=>$dat->text_data,
                                    "ug_text_data"=>$dat->ug_text_data,
                                    "author"=>$dat->author,
                                    "sender_name"=>$dat->sender_name,
                                    "language_id"=>$id,
                                    "language_name"=>$lan['name'],
                                    "details_id"=>$details['id'],
                                    "likes"=>$details['likes'],
                                    "dislikes"=>$details['dislikes'],
                                    "reports"=>$details['reports'],
                                    "is_approved"=>$dat->is_approved,
                                    "is_blocked"=>$dat->is_blocked,     
                                

                                    
                                ];
                            
                                $n++;    
                        
                    }            
                }
                
                return $arra;
            }
            else
                return "Invalid Token";
        }
    }


    public function all_lang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();         
            if(count($access)>0)
            {
                $data = Language::all();    
                return $data;
            }
            else
                return "Invalid Token";
        }
    
    }
    
    public function lang_specific($id,Request $request)
    {          
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
        
                $data = Data::where('lan_id',$id)->where('is_approve',1)->where('is_blocked',0)->orderByDesc('id')->get();
                $arra = array();
                $n=0;
                foreach($data as $dat)
                {
                    
                    $cat = Category::where('id',$dat->cat_id)->first();
                    $details = Text_Details::where('text_id',$dat->id)->first();
                    $lan = Language::where('id',$dat->lan_id)->first();
                            
                            
                            $arra[$n] = [ 
                            

                                "user_id"=>$dat->user_id,   
                                "cat_id"=>$cat['id'],
                                "cat_title"=>$cat['cat_title'],
                                "text_id"=>$dat->id,
                                "text_data"=>$dat->text_data,
                                "ug_text_data"=>$dat->ug_text_data,
                                "author"=>$dat->author,
                                "sender_name"=>$dat->sender_name,
                                "language_id"=>$id,
                                "language_name"=>$lan['name'],
                                "details_id"=>$details['id'],
                                "likes"=>$details['likes'],
                                "dislikes"=>$details['dislikes'],
                                "reports"=>$details['reports'],
                                "is_approved"=>$dat->is_approved,
                                "is_blocked"=>$dat->is_blocked,     
                            

                                
                            ];
                        
                            $n++;    
                

                    
                }
                return $arra;
            }
            else
                return "Invalid Token";
        }
    
    }

    public function most_recent(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
                $data = Data::orderByDesc('id')->limit(2)->get();   
                return $data;
            }
            else 
                return "Invalid Token";
        }        
        // $arra = array();
        // $n=0;
        // foreach($data as $dat)
        // {
            
        //     $cat = Category::where('id',$dat->cat_id)->first();
        //     $details = Text_Details::where('text_id',$dat->id)->first();
        //     $lan = Language::where('id',$dat->lan_id)->first();
        //     $user = User_Generated::where('text_id',$dat->id)->get();
            
            
        //     foreach ($user as $gen)
        //     {
        //         if($gen->is_approve == 1 && $gen->is_blocked == 0 )
        //         {
                    
        //             $arra[$n] = [ 
                    

                        
                        
        //                 "cat_id"=>$cat['id'],
        //                 "cat_title"=>$cat['cat_title'],
        //                 "text_id"=>$dat->id,
        //                 "text_data"=>$dat->text_data,
        //                 "author"=>$dat->author,
        //                 "sender_name"=>$dat->sender_name,
        //                 "language_id"=>$id,
        //                 "language_name"=>$lan['name'],
        //                 "details_id"=>$details['id'],
        //                 "likes"=>$details['likes'],
        //                 "dislikes"=>$details['dislikes'],
        //                 "reports"=>$details['reports']
                    

                        
        //             ];
                   
        //             $n++;    
        //         }

        //     }

            
        // }
        // return $arra;
    
    }

    public function most_liked_week(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
            
        
                $date = Carbon::today()->subDays(7);
                $top = Text_Details::where('created_at','>=',$date)->orderByDesc('likes')->limit('20')->get();
                $arra = array();
                $n=0;

                foreach($top as $topp)
                {
                    $data = Data::where('id',$topp->text_id)->get();
                    foreach($data as $dat)
                    {
                        $cat = Category::where('id',$dat->cat_id)->first();
                        $details = Text_Details::where('text_id',$dat->id)->first();
                        $lan = Language::where('id',$dat->lan_id)->first();
                                            
                                $arra[$n] = [ 
                                                                                        
                                    "user_id"=>$dat->user_id,   
                                    "cat_id"=>$cat['id'],
                                    "cat_title"=>$cat['cat_title'],
                                    "text_id"=>$dat->id,
                                    "text_data"=>$dat->text_data,
                                    "ug_text_data"=>$dat->ug_text_data,
                                    "author"=>$dat->author,
                                    "sender_name"=>$dat->sender_name,
                                    "language_id"=>$id,
                                    "language_name"=>$lan['name'],
                                    "details_id"=>$details['id'],
                                    "likes"=>$details['likes'],
                                    "dislikes"=>$details['dislikes'],
                                    "reports"=>$details['reports'],
                                    "is_approved"=>$dat->is_approved,
                                    "is_blocked"=>$dat->is_blocked,   
                                    
                                ];
                            
                                $n++;                    
                    }            
                }
                return $arra;
            }
            else    
                return "Invalid Token";
        }  
    
    }

    public function search(Request $req)
    {
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
        
                $query = $req->query;
                $result = Data::where('text_data','LIKE','%'.'$query'.'%')->get();
                return $result;
            }
            else
            {
                return "Invalid Token";
            }
        }
    }

    public function most_liked_month(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'access_token' => 'required',
        ]);

        if($validator->fails())
        {
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }
        else
        {
        
            $token = $request['access_token'];
            $access = Passport::where('id',$token)->get();            
            if(count($access)>0)
            {
        
                $date = Carbon::today()->subDays(7);
                $top = Text_Details::where('created_at','>=',$date)->orderByDesc('likes')->limit('20')->get();
                $arra = array();
                $n=0;

                foreach($top as $topp)
                {
                    $data = Data::where('id',$topp->text_id)->get();
                    foreach($data as $dat)
                    {
                        $cat = Category::where('id',$dat->cat_id)->first();
                        $details = Text_Details::where('text_id',$dat->id)->first();
                        $lan = Language::where('id',$dat->lan_id)->first();
                                            
                                $arra[$n] = [ 
                                                                                        
                                    "user_id"=>$dat->user_id,   
                                    "cat_id"=>$cat['id'],
                                    "cat_title"=>$cat['cat_title'],
                                    "text_id"=>$dat->id,
                                    "text_data"=>$dat->text_data,
                                    "ug_text_data"=>$dat->ug_text_data,
                                    "author"=>$dat->author,
                                    "sender_name"=>$dat->sender_name,
                                    "language_id"=>$id,
                                    "language_name"=>$lan['name'],
                                    "details_id"=>$details['id'],
                                    "likes"=>$details['likes'],
                                    "dislikes"=>$details['dislikes'],
                                    "reports"=>$details['reports'],
                                    "is_approved"=>$dat->is_approved,
                                    "is_blocked"=>$dat->is_blocked,   
                                    
                                ];
                            
                                $n++;                    
                    }            
                }
                return $arra;
            }
            else
                return "Invalid Token";  
        }
    }
}
