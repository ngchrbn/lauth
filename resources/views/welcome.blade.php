@extends('layout.master')

@section('title', __('messages.Register_your_account'))

@section('content')
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:h-screen lg:py-0">
            <a href="/" class="mb-6 text-3xl text-center lg:text-4xl font-bold text-gray-900">
                {{ __('messages.Laravel_Authentication') }}
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md lg:max-w-5xl xl:p-0  ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                        {{__('messages.Create_an_account')}}
                    </h1>
                    <form id="register-form" method="POST" class="lg:grid lg:grid-rows-5 lg:gap-5 lg:grid-cols-2 space-y-4 md:space-y-6 lg:space-y-0" action="/register">
                        @csrf
                        <div>
                            <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Full_name')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="full_name" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Joe Doe" value="{{old('full_name')}}">
                            <span id="full_name-error" class="text-red-500 text-xs mt-1"></span>
                            @error('full_name')
                            <p id="full_name_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Username')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="joeD" value="{{old('username')}}">
                            <span id="username-error" class="text-red-500 text-xs mt-1"></span>
                            @error('username')
                            <p id="username_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Email')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{__('messages.name@domain.com')}}" value="{{old('email')}}">
                            <span id="email-error" class="text-red-500 text-xs mt-1"></span>
                            @error('email')
                            <p id="email_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Phone_number')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="+201110001111" value="{{old('phone')}}">
                            <span id="phone-error" class="text-red-500 text-xs mt-1"></span>
                            @error('phone')
                            <p id="phone_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Address')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="{{__('messages.Your_address')}}" value="{{old('address')}}">
                            <span id="address-error" class="text-red-500 text-xs mt-1"></span>
                            @error('address')
                            <p id="address_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Birthdate')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="birthdate" id="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{old('birthdate')}}">
                            <span id="birthdate-error" class="text-red-500 text-xs mt-1"></span>
                            @error('birthdate')
                            <p id="birthdate_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Password')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <span id="password-error" class="text-red-500 text-xs mt-1"></span>
                            @error('password')
                            <p id="password_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">
                                {{__('messages.Confirm_password')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <span id="password_confirmation-error" class="text-red-500 text-xs mt-1"></span>
                            @error('password_confirmation')
                            <p id="password_confirmation_error" class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="lg:col-span-2 flex items-center justify-center">
                            <button id="btn-submit" type="submit" class="w-full lg:w-1/3 text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 lg:py-4 text-center">
                                {{__('messages.Create_an_account')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
