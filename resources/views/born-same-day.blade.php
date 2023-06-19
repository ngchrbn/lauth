@extends('layout.master')

@section('title', 'Actors born on the same day')

@section('content')
    <main class="flex items-center flex-col gap-4 py-6 px-4 justify-center mx-auto lg:h-screen lg:py-0">
        <div class="text-center mb-4">
            <h2 class="text-3xl font-bold leading-none text-gray-900">{{__('messages.Actors_born_the_same_day')}}</h2>
        </div>

        <a href="/" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
            {{__('messages.Go_to_registration_page')}}</a>
        <div class="w-full mx-auto max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
            <div class="flex justify-between text-center mb-4">
                <h5 class="text-lg font-bold leading-none text-gray-900">{{__('messages.Actor')}}</h5>
                <h5 class="text-lg font-bold leading-none text-gray-900">{{__('messages.Birthdate')}}</h5>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200">
                    @unless(!$actors)
                        @foreach($actors as $actor)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="shrink-0">
                                        <img class="w-16 h-16 rounded-full" src="{{$actor['image']['url']}}" alt="{{$actor['name']}} image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{$actor['name']}}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                        {{$actor['birthDate']}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        @else
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <p class="text-sm font-medium text-gray-900 truncate">No actor found with your birthdate</p>
                            </div>
                        </li>
                        @endunless
                </ul>
            </div>
        </div>
    </main>
@stop
