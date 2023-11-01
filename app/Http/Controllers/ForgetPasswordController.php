<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Validator;

class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        try{
            $request->validate([ 'password' => 'required','token' => 'required' ]);
        $user = User::where('id', decrypt($request->token))->update(['password' => bcrypt($request->password)]);
            return redirect()->back()->with(['status'=> 'success', 'title' => 'Success' , 'msg' => 'Password Save Successfully']);
        }catch(Exception $error){
            return redirect()->back()->with(['status'=> 'error', 'title' => 'Oops' , 'msg' => 'Something Went Worng']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        if(User::where('email', $request->email)->exists() && !isset($request->otp)){
            $subject = "Forget Password OTP";
            $recipient = $request->email;
            $otp = mt_rand(100000,999999);
            $template = "auth.password-reset-mail";
            $mailData = [
                'fromEmail' => 'admissions@datagami.in',
                'otp' => $otp
            ];
            User::where('email', $recipient)->update(['reset_otp' => $otp]);
            Mail::send($template, $mailData, function ($message) use ($mailData, $recipient, $subject) {
                $message->to($recipient)
                    ->from($mailData['fromEmail'], 'Saletify')
                    ->subject($subject);
            });
            $email = $recipient;
            return view('auth.forgot-password', compact('email'));
        }
        elseif(isset($request->otp)){
            if(User::where(['email'=> $request->email, 'reset_otp' => $request->otp])->exists()){
                $token = encrypt(User::where(['email'=> $request->email, 'reset_otp' => $request->otp])->first()->id);
                return view('auth.reset-password', compact('token'));
            }
            else{
                return redirect()->back()->with(['status'=> 'error', 'title' => 'Oops' , 'msg' => 'Wrong OTP! Please try Again']);
            }
        }
        else{
            return redirect()->back()->with(['status'=> 'error', 'title' => 'Not Found' , 'msg' => 'Email Not Found']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
