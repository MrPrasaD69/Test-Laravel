<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserModel;
use Illuminate\Http\Request;


class UserController extends Controller
{   
    public function list(){
        $model_user = UserModel::all();
        if(!empty($model_user)){
            return response()->json($model_user);
        }
        else{
            return response()->json([
                "message"=>"Users Not Found"
            ]);
        }
    }

    public function storeUser(){
        $first_name = !empty($_REQUEST['first_name']) ? $_REQUEST['first_name'] : '';
        $last_name = !empty($_REQUEST['last_name']) ? $_REQUEST['last_name'] : '';
        $email_id = !empty($_REQUEST['email_id']) ? $_REQUEST['email_id'] : '';
        $user_id = !empty($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
        if(empty($user_id)){
            if(!empty($first_name) && !empty($last_name) && !empty($email_id)){
                $check_existing_email = UserModel::where('email_id',$email_id)->count();
                if($check_existing_email > 0){
                    return response()->json([
                        "message"=>"Email Already Exists"
                    ]);
                }
                else{
                    $model_user = New UserModel;
                    $model_user->first_name = $first_name;
                    $model_user->last_name = $last_name;
                    $model_user->email_id = $email_id;
                    if($model_user->save()){
                        return response()->json([
                            "message"=>"User Added"
                        ],200);
                    }
                    else{
                        return response()->json([
                            "message"=>"Failed to Add User"
                        ],401);
                    }
                }
            }
            else{
                return response()->json([
                    "message"=>"Input Empty"
                ],400);
            }
        }
        else{
            $model_user = UserModel::where('user_id',$user_id)->first();
            $model_user->first_name = $first_name;
            $model_user->last_name = $last_name;
            $model_user->email_id = $email_id;
            if($model_user->save()){
                return response()->json([
                    "message"=>"User Updated"
                ],200);
            }
            else{
                return response()->json([
                    "message"=>"Failed to Update User"
                ],401);
            }
        }
    }
}