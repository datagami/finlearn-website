<!doctype html>
<html lang="en">
<head>
    <title>Forget Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <base href="{{asset('public')}}/" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
    <div class="row d-flex justify-content-center" style="height: 100vh; align-items: center;">
        <div class="col-sm-12 col-md-4">
            <div class="card">
            {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                <form action="{{ route('password.email') }}" id="forget_password" method="POST">
				@csrf
                    <div class="d-flex justify-content-center image Card mt-3">
                    <img class="direct-chat-img w-25" src="dist/img/AdminLTELogo.png" alt="">
                    </div>
                    <div class="box p-3">
                    <label for="email">Username \ Email</label>
                    <input type="email" class="form-control" name="email" value="{{@$email}}" {{ isset($email)? 'readonly' : '' }} id="email"
                    placeholder="Enter your email...">
                    @error('email')
                        <small style="color: red">{{$message}}</small>
                    @enderror
                    </div>
                    @if(isset($email))
                        <div class="box p-3" id="otpdiv">
                            <label for="otp">OTP</label>
                            <input type="text" class="form-control" maxlength="6" name="otp" id="otp"
                            placeholder="Enter Your OTP">
                        </div>
                    @error('otp')
                        <small style="color: red">{{$message}}</small>
                    @enderror
                        <center>
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
                        </center>
                    @else
                    <div class="row">
                        <div class="col px-5">
                            <a class="btn btn-primary mb-3 mt-3" href="{{route('login')}}">Login</a>
                        </div>
                        <div class="col text-right px-5">
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Send OTP</button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has('status'))
    <script>
        Swal.fire({
            icon: "{{ Session::get('status') }}",
            title: "{{ Session::get('title') }}",
            text: "{{ Session::get('msg') }}",
        })
    </script>
    @endif
</body>

</html>
