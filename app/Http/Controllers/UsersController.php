<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Validator;

class UsersController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date',
            'password' => 'required|min:8',
            'active' => 'required|boolean'
        ],[
            'email.unique' => 'This email its used',
            'name.required' => 'Name required',
            'birthday.required' => 'Birthday required',
            'password.required' => 'Password required',
            'active.required' => 'Status required'
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => "User created Failed",
                "data" => $validator->errors()
            ]);
        }
        $user= Users::create([
            'name' => $request->name,
            'email'=> $request->email, 
            'password' => bcrypt($request->password),
            'birthday'=> $request->birthday,
            'active' => $request->active,
        ]);
        
        return response()->json([
            "success" => true,
            "message" => "User created successfully",
            "data" => $user
        ]);
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'per_page' => 'required',
            'sort' => 'required',
            'order' => 'required',
        ],[
            'per_page.required' => 'Total Page required',
            'sort.required' => 'Sort required',
            'order' => 'Order required',
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => "User List Failed",
                "data" => $validator->errors()
            ]);
        }
        $users = Users::withTrashed()->orderBy($request->sort, $request->order)->paginate($request->per_page);
        return response()->json([
            "success" => true,
            "message" => "Users List",
            "data" => $users,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:4',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'password' => 'required|min:8',
            'active' => 'required|boolean'
        ],[
            'email.required' => 'Email required',
            'name.required' => 'Name required',
            'birthday.required' => 'Birthday required',
            'password.required' => 'Password required',
            'active.required' => 'Status required'
        ]);

        if($validator->fails()){
            return response()->json([
                "success" => false,
                "message" => "User updated Failed",
                "data" => $validator->errors()
            ]);
        }
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user = Users::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->birthday = $request->birthday;
        $user->active = $request->active;
        $user->save();
        return response()->json([
            "success" => true,
            "message" => "User updated successfully",
            "data" => $user 
        ]);
    }

    public function delete(Request $request)
    {
        $user = Users::find($request->id);
        $user->delete();
        return response()->json([
            "success" => true,
            "message" => "User deleted successfully",
            "data" => $user 
        ]);
    }
}
