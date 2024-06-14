<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\View\View
     *
     * @throws \Throwable
     */
    public function index()
    {
        /**
         * Prepare the response data.
         *
         * @var array $resp
         */
        $resp = [
            'title' => 'User Management',
        ];

        /**
         * Return the view with the response data.
         *
         * @return \Illuminate\View\View
         */
        return view('user.index', $resp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     *
     * @throws \Throwable
     */
    public function create()
    {
        /**
         * Prepare the response data.
         *
         * @var array $resp
         */
        $resp = [
            'title' => 'Add User',
        ];

        /**
         * Return the view with the response data.
         *
         * @return \Illuminate\View\View
         */
        return view('user.form', $resp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        // Initialize the response data
        $resp = [
            'status' => false,
        ];
        $code = 500;

        try {
            // Validate the incoming request data
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            // Prepare the payload for creating a new user
            $payload = $request->only('name', 'email', 'password');
            $payload['role'] = 1;

            // Check if the email already exists in the database
            $user = User::where('email', $payload['email'])->count();

            // If the email already exists, throw an error
            if ($user > 0) {
                throw new Error('Email sudah terdaftar');
            }

            // Create a new user in the database
            User::create($payload);

            // Prepare the success response data
            $resp['status'] = true;
            $resp['message'] = 'Berhasil Menambah user';
            $code = 200;

            // Commit the database transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Prepare the error response data
            $resp['message'] = $th->getMessage();

            // Rollback the database transaction
            DB::rollBack();
        }

        // Return the response as a JSON response
        return response()->json($resp, $code);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id The unique identifier of the user to be edited.
     *
     * @return \Illuminate\View\View The view for editing the user with the title 'Edit User'.
     *
     * @throws \Throwable If an error occurs while rendering the view.
     */
    public function edit(string $id)
    {
        // Prepare the response data
        $resp = [
            'title' => 'Edit User',
        ];

        // Return the view with the response data
        return view('user.edit', $resp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request The incoming request.
     * @param  string  $id The unique identifier of the user to be updated.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response with status, message, and optionally data.
     *
     * @throws \Throwable If an error occurs during the database transaction or validation.
     */
    public function update(Request $request, string $id)
    {
        // Start a database transaction
        DB::beginTransaction();

        // Initialize the response data
        $resp = [
            'status' => false,
        ];
        $code = 500;

        try {
            // Validate the incoming request data
            $request->validate([
                'email' => ['email'],
            ]);

            // Prepare the payload for updating the user
            $payload = $request->only('name', 'email', 'password');

            // If password is provided, validate it
            if ($request->password) {
                $request->validate([
                    'password' => ['min:8'],
                ]);
            } else {
                // If password is not provided, remove it from the payload
                unset($payload['password']);
            }

            // Find the user by its unique identifier
            $user = User::find($id);

            // Check if the user is a superadmin
            if ($user->role == '0') {
                throw new Error('Superadmin tidak bisa diedit');
            }

            // Update the user with the provided payload
            $user->fill($payload);
            $user->save();

            // Prepare the success response data
            $resp['status'] = true;
            $resp['message'] = 'Berhasil diupdate';
            $code = 200;

            // Commit the database transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Prepare the error response data
            $resp['message'] = $th->getMessage();

            // Rollback the database transaction
            DB::rollBack();
        }

        // Return the response as a JSON response
        return response()->json($resp, $code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id The unique identifier of the user to be deleted.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response with status, message, and optionally data.
     *
     * @throws \Throwable If an error occurs during the database transaction.
     */
    public function destroy(string $id)
    {
        // Start a database transaction
        DB::beginTransaction();

        // Initialize the response data
        $resp = [
            'status' => false,
        ];
        $code = 500;

        try {
            // Find the user by its unique identifier
            $user = User::find($id);

            // Check if the user is a superadmin
            if ($user->role == '0') {
                throw new Error('Superadmin tidak bisa dihapus');
            }

            // Delete the user
            $user->delete();

            // Prepare the success response data
            $resp['status'] = true;
            $resp['message'] = 'User berhasil dihapus';
            $code = 200;

            // Commit the database transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Prepare the error response data
            $resp['message'] = $th->getMessage();

            // Rollback the database transaction
            DB::rollBack();
        }

        // Return the response as a JSON response
        return response()->json($resp, $code);
    }

    /**
     * Get all users except superadmin.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response with status, message, and optionally data.
     *
     * @throws \Throwable If an error occurs during the database transaction.
     */
    function getDatas() {
        // Initialize the response data
        $resp = [
            'status' => false,
        ];
        $code = 500;

        try {
            // Fetch all users except superadmin
            $user = User::where('role', '!=', 0)->get();

            // Prepare the success response data
            $resp['status'] = true;
            $resp['message'] = 'Berhasil Mengambil data user';
            $resp['data'] = $user;
            $code = 200;

            // Commit the database transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Prepare the error response data
            $resp['message'] = $th->getMessage();

            // Rollback the database transaction
            DB::rollBack();
        }

        // Return the response as a JSON response
        return response()->json($resp, $code);
    }

    /**
     * Get a single user data by its unique identifier.
     *
     * @param string $id The unique identifier of the user to be fetched.
     *
     * @return \Illuminate\Http\JsonResponse The JSON response with status, message, and optionally data.
     *
     * @throws \Throwable If an error occurs during the database transaction.
     */
    function getData(string $id) {
        // Initialize the response data
        $resp = [
            'status' => false,
        ];
        $code = 500;

        try {
            // Find the user by its unique identifier
            $user = User::find($id);

            // Check if the user is a superadmin
            if ($user->role == '0') {
                throw new Error('Data User tidak bisa diakses');
            }

            // Prepare the success response data
            $resp['status'] = true;
            $resp['message'] = 'Berhasil Mengambil data user';
            $resp['data'] = $user;
            $code = 200;

            // Commit the database transaction
            DB::commit();
        } catch (\Throwable $th) {
            // Prepare the error response data
            $resp['message'] = $th->getMessage();

            // Rollback the database transaction
            DB::rollBack();
        }

        // Return the response as a JSON response
        return response()->json($resp, $code);
    }
}
