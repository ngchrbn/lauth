<!DOCTYPE html>
<html lang="{{Illuminate\Support\Facades\App::getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a"}
                    }
                }
            }
        }
    </script>
    <title>@yield('title', 'Laravel authentication')</title>
</head>
<body>
<main class="bg-gray-50">
    <nav class="px-4 py-6 flex justify-end">
        <div class="static">

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-primary-700 border border-primary-600 hover:border-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                <span class="w-6 mr-2">
                    <img
                        src="{{Config::get('languages')[App::getLocale()]['flag-icon']['src']}}"
                        alt="{{Config::get('languages')[App::getLocale()]['flag-icon']['alt']}}"
                    >

                </span>
                {{ Config::get('languages')[App::getLocale()]['display'] }}
                <svg class="w-4 h-4 ml-2"
                     aria-hidden="true"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="absolute w-40 right-4 mt-2 z-9999 hidden bg-white divide-y divide-gray-100 rounded-lg shadow">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                    @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ route('lang.switch', $lang) }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                                            <span class="w-6 mr-2">
                                                <img
                                                    src="{{$language['flag-icon']['src']}}"
                                                    alt="{{$language['flag-icon']['alt']}}">
                                            </span>
                                            {{$language['display']}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</main>
<script>

    function toggleSubmitBtn() {
        if (fullName.value === "" || userName.value === "" ||
            email.value === "" || phone.value === "" ||
            address.value === "" || birthdate.value === "" ||
            password.value === "" || password2.value === "") {

            // Remove green color
            btnSubmit.classList.remove("bg-primary-600");
            btnSubmit.classList.remove("hover:bg-primary-700");
            btnSubmit.classList.remove("focus:ring-primary-300");

            // Substitute with red color
            btnSubmit.classList.add("bg-red-600");

            // Disable submit button
            btnSubmit.disabled = true;
            btnSubmit.classList.add("opacity-50", "cursor-not-allowed");

            if (fullName.value === "") {
                fullName_error.textContent = "{{__('messages.field_required')}}";
            }
            if (userName.value === "") {
                userName_error.textContent = "{{__('messages.field_required')}}";
            }
            if (email.value === "") {
                email_error.textContent = "{{__('messages.field_required')}}";
            }
            if (phone.value === "") {
                phone_error.textContent = "{{__('messages.field_required')}}";
            }
            if (address.value === "") {
                address_error.textContent = "{{__('messages.field_required')}}";
            }
            if (birthdate.value === "") {
                birthdate_error.textContent = "{{__('messages.field_required')}}";
            }
            if (password.value === "") {
                password_error.textContent = "{{__('messages.field_required')}}";
            }
            if (password2.value === "") {
                password2_error.textContent = "{{__('messages.field_required')}}";
            }

        }
        else {
            // Enable submit button
            btnSubmit.disabled = false;
            btnSubmit.classList.remove("opacity-50", "cursor-not-allowed");

            // Remove red color
            btnSubmit.classList.remove("bg-red-600");

            // Substitute with green color
            btnSubmit.classList.add("bg-primary-600");
            btnSubmit.classList.add("hover:bg-primary-700");
            btnSubmit.classList.add("focus:ring-primary-300");
        }
    }

    const dropdown = document.getElementById('dropdown');
    const dropdownToggle = document.getElementById('dropdownDefaultButton');

    // Form inputs validation
    const form = document.getElementById("register-form");
    const btnSubmit = document.getElementById("btn-submit");
    const password = document.getElementById("password");
    const password2 = document.getElementById("password_confirmation");
    const password_error = document.getElementById("password-error");
    const password2_error = document.getElementById("password_confirmation-error");
    const fullName = document.getElementById("full_name");
    const fullName_error = document.getElementById("full_name-error");
    const userName = document.getElementById("username");
    const userName_error = document.getElementById("username-error");
    const email = document.getElementById("email");
    const email_error = document.getElementById("email-error");
    const phone = document.getElementById("phone");
    const phone_error = document.getElementById("phone-error");
    const address = document.getElementById("address");
    const address_error = document.getElementById("address-error");
    const birthdate = document.getElementById("birthdate");
    const birthdate_error = document.getElementById("birthdate-error");

    dropdownToggle.addEventListener('click', function () {
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('block');
    });

    // Form inputs validation
    const pwdRegex = /^(?=.*\d)(?=.*[!@#$%^&*])[0-9a-zA-Z!@#$%^&*]{8,}$/;
    const fullNameRegex = /^[a-zA-Z ]{2,50}$/;
    const userNameRegex = /^[a-zA-Z0-9_]{2,30}$/;
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/;
    const phoneRegex = /^(00201|\+201|01)[0-2,5][0-9]{8}$/;
    const addressRegex = /^[a-zA-Z0-9\s'-.]{2,50}$/;
    const birthdateRegex = /^(?:\d{4}[-\/](?:(?:0[1-9]|1[0-2])[-\/](?:0[1-9]|1\d|2[0-8])|(?:0[13-9]|1[0-2])[-\/](?:29|30)|(?:0[13578]|1[02])[-\/]31)|(?:0[1-9]|[12]\d|3[01])[-\/](?:0[1-9]|1[0-2])[-\/]\d{4})$/;

    // Event listeners
    fullName.addEventListener("blur", function() {
        if (!fullNameRegex.test(fullName.value)) {
            fullName_error.textContent = "{{__('messages.Your_full_name_can_only_contain_letters_and_spaces')}}";
        } else {
            fullName_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    userName.addEventListener("blur", function() {
        if (!userNameRegex.test(userName.value)) {
            userName_error.textContent = "{{__('messages.Your_username_can_only_contain_letters_numbers_and_underscores')}}";
        } else {
            userName_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    email.addEventListener("blur", function() {
        if (!emailRegex.test(email.value)) {
            email_error.textContent = "{{__('messages.Your_email_must_be_a_valid_email_address')}}";
        } else {
            email_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    phone.addEventListener("blur", function() {
        if (!phoneRegex.test(phone.value)) {
            phone_error.textContent = "{{__('messages.Your_phone_number_must_be_a_valid_Egyptian_phone_number')}}";
        } else {
            phone_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    address.addEventListener("blur", function() {
        if (!addressRegex.test(address.value)) {
            address_error.textContent = "{{__('messages.Your_address_can_only_contain_letters_numbers_spaces_and_hyphens')}}";
        } else {
            address_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    birthdate.addEventListener("blur", function() {
        if (!birthdateRegex.test(birthdate.value)) {
            birthdate_error.textContent = "{{__('messages.Your_birthdate_must_be_a_valid_date_in_the_following_format')}}";
        } else {
            birthdate_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    password.addEventListener("blur", function() {
        if (!pwdRegex.test(password.value)) {
            password_error.textContent = "{{__('messages.password_invalid')}}";
        } else {
            password_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    password2.addEventListener("blur", function() {
        if (password.value !== password2.value) {
            password2_error.textContent = "{{__('messages.passwords_do_not_match')}}";
        } else {
            password2_error.textContent = "";
        }
        toggleSubmitBtn();
    });

    // form should be prevented to submitted if there is any field with an error
    form.addEventListener("submit", function(e) {
        toggleSubmitBtn();
        if (password_error.textContent !== "" || password2_error.textContent !== "" ||
            fullName_error.textContent !== "" || userName_error.textContent !== "" ||
            email_error.textContent !== "" || phone_error.textContent !== "" ||
            address_error.textContent !== "" || birthdate_error.textContent !== "") {
            btnSubmit.classList.remove("bg-primary-600");
            btnSubmit.classList.remove("hover:bg-primary-700");
            btnSubmit.classList.remove("focus:ring-primary-300");

            // Substitute with red color
            btnSubmit.classList.add("bg-red-600");

            // Disable submit button
            btnSubmit.disabled = true;
            btnSubmit.classList.add("opacity-50", "cursor-not-allowed");
            e.preventDefault();
        }
        else {
            btnSubmit.classList.add("bg-primary-600");
            btnSubmit.classList.add("hover:bg-primary-700");
            btnSubmit.classList.add("focus:ring-primary-300");

            // Remove red color
            btnSubmit.classList.remove("bg-red-600");

            // Enable submit button
            btnSubmit.disabled = false;
            btnSubmit.classList.remove("opacity-50", "cursor-not-allowed");
        }
    });
</script>
</body>
</html>
