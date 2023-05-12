@extends('layout.master')

@section('title', 'User profile')

@section('content')
    <main class="h-screen flex flex-col justify-center items-center gap-6 py-6 px-6">
        <a href="/" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">Go to registration page</a>
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{session('user')->full_name}}</h5>
            <p class="font-normal text-gray-700">{{session('user')->username}}</p>
            <p class="font-normal text-gray-700">{{session('user')->email}}</p>
            <p class="font-normal text-gray-700">{{session('user')->phone}}</p>
            <p class="font-normal text-gray-700">{{session('user')->address}}</p>
            <p class="font-normal text-gray-700">{{session('user')->birthdate}}</p>
        </div>
    </main>
@stop
