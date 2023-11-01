<!doctype html>
<html lang="en">

<head>
    <title>admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <base href="{{asset('public')}}" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    body{
        background: #366883;
    }
    .text-white{
        color:white;
    }
    .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
    </head>

<body>
<form method="POST" action="{{ route('register') }}">
@csrf

       <!-- Name -->
       <div>
           <x-input-label for="name" :value="__('Name')" />
           <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
           <x-input-error :messages="$errors->get('name')" class="mt-2" />
       </div>

       <!-- Email Address -->
       <div class="mt-4">
           <x-input-label for="email" :value="__('Email')" />
           <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
           <x-input-error :messages="$errors->get('email')" class="mt-2" />
       </div>

       <!-- Password -->
       <div class="mt-4">
           <x-input-label for="password" :value="__('Password')" />

           <x-text-input id="password" class="block mt-1 w-full"
                           type="password"
                           name="password"
                           required autocomplete="new-password" />

           <x-input-error :messages="$errors->get('password')" class="mt-2" />
       </div>

       <!-- Confirm Password -->
       <div class="mt-4">
           <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

           <x-text-input id="password_confirmation" class="block mt-1 w-full"
                           type="password"
                           name="password_confirmation" required autocomplete="new-password" />

           <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
       </div>

       <div class="flex items-center justify-end mt-4">
           <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
               {{ __('Already registered?') }}
           </a>

           <x-primary-button class="ml-4">
               {{ __('Register') }}
           </x-primary-button>
       </div>
   </form>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
    

