<!doctype html>
<html lang="en">

<head>
    <title>Forget Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <base href="{{ asset('public') }}/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center" style="height: 100vh; align-items: center;">
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
                    <form action="{{ route('password.save') }}" id="change_password" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center image Card mt-3">
                            <img class="direct-chat-img w-25" src="dist/img/AdminLTELogo.png" alt="">
                        </div>
                        <div class="box p-3">
                            <input type="hidden" class="form-control" id="token" name="token" value="{{$token}}">
                            <label for="email">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="********">
                            <small>Min 8 Character In Password</small><br>
                            <small class="error" id="pass_small" style="color: red"></small>
                        </div>
                        <div class="box p-3" id="otpdiv">
                            <label for="otp">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="********">
                            <small class="error" id="confirmation_error" style="color: red"></small>
                        </div>

                            <center>
                                <button type="submit" class="btn btn-primary mb-3 mt-3">Save</button>
                            </center>
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
    <script>
        $('#change_password').submit((e)=>{
            if($('#password').val().length<8){
                $('#pass_small').text('Min 8 Character Required');
                $('#confirmation_error').show();
                return false;
            }
            if($('#password').val()!==$('#confirm_password').val()){
                $('.error').hide();
                $('#confirmation_error').text('Confirm Password is not Matched');
                $('#confirmation_error').show();
                return false;
            }
            $('#change_password').submit();
            return true;
        });
    </script>
</body>

</html>
