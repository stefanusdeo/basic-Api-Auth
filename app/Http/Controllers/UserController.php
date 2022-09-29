<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $cerdentials = $request->only('email', 'password');
        // dd($cerdentials);
        if (Auth::attempt($cerdentials)) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('Elemasdb')->accessToken;
            $success['name'] =  $user->name;

            return response([
                'succes' => true,
                'data' => $success
            ], 200);
        } else {
            return response(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('Elemasdb')->accessToken;
            $success['name'] =  $user->name;

            return response([
                'success' => true,
                'data' => $success
            ], 200);
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function getAllUser(Request $request)
    {
        $users = User::with(['role'])->get();
        $count = User::count();

        return response(['success' => true, 'data' => $users, 'total' => $count]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $payload = $request->all();

            User::whereId($request->id)->update($payload);

            DB::commit();
            return response([
                'succes' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'succes' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();

            User::whereId($request->id)->delete();

            DB::commit();
            return response([
                'succes' => true
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'succes' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}
