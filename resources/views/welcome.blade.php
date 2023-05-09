@extends('layout.master')

@section('title', 'Register your account')

@section('content')
    <main>
        <section class="bg-gray-50">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:h-screen lg:py-0">
                <a href="/" class="mb-6 text-3xl lg:text-4xl font-bold text-gray-900">
                    Laravel Authentication
                </a>
                <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md lg:max-w-5xl xl:p-0  ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                            Create an account
                        </h1>
                        <form method="POST" class="lg:grid lg:grid-rows-5 lg:gap-5 lg:grid-cols-2 space-y-4 md:space-y-6 lg:space-y-0" action="/register">
                            @csrf
                            <div>
                                <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Full name
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Joe Doe" value="{{old('full_name')}}" required="">
                                @error('full_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                                    Username
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="joeD" value="{{old('username')}}" required="">
                                @error('username')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@domain.com" value="{{old('email')}}" required="">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Telephone</label>
                                <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="+201110001111" value="{{old('phone')}}" required="">
                                @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="your address" value="{{old('address')}}" required="">
                                @error('address')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('birthdate')}}" required="">
                                @error('birthdate')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="lg:col-span-2 flex items-center justify-center">
                                <button type="submit" class="w-full lg:w-1/3 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 lg:py-4 text-center">Create an account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop
