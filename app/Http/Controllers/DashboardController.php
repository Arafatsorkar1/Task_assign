<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    private $user;
    public  function login()
    {
        return view('auth.login');
    }

    public  function dashboard()
    {
        $data['tasks'] = Task::all();
       return view('Back.DashBoard.index', $data);

    }

    public function register(Request $request)
    {

        $validator = Validated::make($request->all(),[
            'name'          => 'required',
            'email'        => 'required',
            'password'      => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json([

                'data'      => $validator->errors()->first(),
                'message'   => "Validation Error",
                'status'    => 0,
            ]);
        }

        try {

            DB::transaction(function () use ($request){





               User::create([
                    'name'          => $request->name,
                    'mobile'        => $request->mobile,
                    'password'      => Hash::make($request->password),
                    'email'         => $request->email,

                 ]);

            });

            return response()->json([

                'data'      => $this->user,
                'message'   => "Register Success",
                'status'    => 1,
            ]);
        }
        catch (\Throwable $th){

            return response()->json([

                'data'      => $th->getMessage(),
                'message'   => "Server Error",
                'status'    => 0,
            ]);
        }



    }

    public function ApiLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function apiIndex()
    {
        $data['tasks'] = Task::all();
        return view('Back.DashBoard.index', $data);

    }

    public function apiCreate(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'due_date'    => 'required|date',
            'description' => 'nullable|string',
        ]);

         $task = Task::create([
            'title'       => $validatedData['title'],
            'due_date'    => $validatedData['due_date'],
            'description' => $validatedData['description'],
        ]);

         return response()->json([
            'message' => 'Task created successfully',
            'task'    => $task,
        ], 201);
    }

   public  function apiUpdate(Request $request ,$id)
   {
       $validatedData = $request->validate([
           'status'      => 'required|string|max:255',
           'title'       => 'required|string|max:255',
           'due_date'    => 'required|date',
           'description' => 'nullable|string',
       ]);

        $task = Task::findOrFail($id);

        $task->update([
           'status'      => $validatedData['status'],
           'title'       => $validatedData['title'],
           'due_date'    => $validatedData['due_date'],
           'description' => $validatedData['description'],
       ]);

        return response()->json([
           'message' => 'Task updated successfully',
           'task'    => $task,
       ], 200);

   }

    }
