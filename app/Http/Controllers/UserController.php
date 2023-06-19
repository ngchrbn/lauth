<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // Create new user
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|min:3|max:255',
            'username' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone' => 'required|min:11|max:13',
            'address' => 'required|string|min:10|max:255',
            'birthdate' => 'required|date',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);


        $user = User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'birthdate' => $data['birthdate'],
            'password' => Hash::make($data['password']),
        ]);

        session(['user' => $user]);

       // Send email to the admin
       Mail::to('ngchrbn@gmail.com')->send(new \App\Mail\NewUser($user));


        return redirect('/born-same-day');
    }

    // Fetch actors born the same day from the api https://online-movie-database.p.rapidapi.com/actors/list-born-today
    public function get()
    {
        if (session('user'))
        {
            $month = Carbon::createFromFormat('Y-m-d', session('user')->birthdate)->format('m');
            $day = Carbon::createFromFormat('Y-m-d', session('user')->birthdate)->format('d');
            $response = Http::withHeaders([
                'x-rapidapi-key' => 'f52a18ca8dmshba9d36bd4657dd9p18115ejsndd273e496275',
                'x-rapidapi-host' => 'online-movie-database.p.rapidapi.com',
            ])->get('https://online-movie-database.p.rapidapi.com/actors/list-born-today', [
                'month' => $month,
                'day' => $day,
            ]);

            // Retrieve the ids from the response which is from url /name/nm000124/ and store them in an array
            $ids = [];
            foreach ($response->json() as $actor) {
                $ids[] = explode('/', $actor)[2];
            }

            $actors = [];
            $count = 0;
            // Loop through each id and retrieve the actor from the api https://online-movie-database.p.rapidapi.com/actors/get-bio with each id as a parameter
            foreach ($ids as $id) {
                if ($count++ == 4) break;
                $response = Http::withHeaders([
                    'x-rapidapi-key' => 'f52a18ca8dmshba9d36bd4657dd9p18115ejsndd273e496275',
                    'x-rapidapi-host' => 'online-movie-database.p.rapidapi.com',
                ])->get('https://online-movie-database.p.rapidapi.com/actors/get-bio', [
                    'nconst' => $id,
                ]);

                // Store each response in an array
                $actors[$id] = $response->json();
            }

//        dd($actors);
            return view('born-same-day', compact('actors'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function profile()
    {
        if (session('user'))
        {
            return view('profile');
        }
        else
        {
            return redirect('/');
        }
    }

}
