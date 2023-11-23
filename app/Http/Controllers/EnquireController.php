<?php

namespace App\Http\Controllers;

use App\Models\Enquire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Add this line to import Carbon
use Illuminate\Support\Facades\Response;

class EnquireController extends Controller
{
    public function enquireslist(Request $request)
    {
		if ($request->post()) {
			$from_date = $request->from_date;
			$to_date = $request->to_date;
			$enquires = DB::table('enquires')
				->where('status', 1)
				->where('created_at', '>=', $from_date)
				->where('created_at', '<=', $to_date)->latest()
				->get();
		} else {
			$from_date = empty($request->from_date) ? date('Y-m-d', strtotime('-30 day')) : $request->from_date;
			$to_date = empty($request->to_date) ? date('Y-m-d') : $request->to_date;
			$enquires = DB::table('enquires')
				->where('status', 1)
				->whereDate('created_at', '>=', $from_date)
				->whereDate('created_at', '<=', $to_date)->latest()
				->get();
		} 
        return view('admin.enquires-views.enquires', compact('enquires','from_date','to_date'));
    }
    public function resolved_enquire($id)
    {
        $enquires = Enquire::find($id);
        $enquires->status = 2;
        $enquires->save();
        return redirect()->back()->with('success', 'Enquire Resolved Successfully');
    }

       public function store(Request $request)
    {    
    

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'city' => 'required',
        'qualification' => 'required',
        'experience' => 'required',
       
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    if ($this->isOnline()) {

        $recipients = [
            $request->email => [
                'template' => 'email-body.email-enquiry2',
                'subject' => 'Thank You for Your Interest! Sit Back and Relax—Our Representative Will Call You',
            ],
            'admissions@datagami.in' => [
                'template' => 'email-body.email-enquiry',
                'subject' => 'Lead Received || Enquire Form.!',
            ],
        ];
        foreach ($recipients as $recipient => $data) {
            $template = $data['template'];
            $subject = $data['subject'];

            $mailData = [
                'recipient' => $recipient,
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'phone' => $request->phone,
                'city' => $request->city,
                'qualification' => $request->qualification,
                'experience' => $request->experience,
            ];

            Mail::send($template, $mailData, function ($message) use ($mailData, $recipient, $subject) {
                $message->to($recipient)
                    ->from($mailData['fromEmail'], $mailData['fromName'])
                    ->subject($subject);
            });
        }
        
        
        $enquire = new Enquire;
        $enquire->name = $request->input('name');
        $enquire->email = $request->input('email');
        $enquire->phone = $request->input('phone');
        $enquire->city = $request->input('city');
        $enquire->qualification = $request->input('qualification');      
        $enquire->experience = $request->input('experience');
        $enquire->save();

        if ($request->has('brochure_download_form')) {
            session()->put('brochure_form_submitted', true);
        }

            return redirect()->route('thankyou');
            //return redirect()->back()->with("success","Form Submited Successfully");
        } else {
            return redirect()->back()->withInput()->with('error', 'Check your internet connection.');
        }
    }

    public function isOnline($site = "https://datagami.in/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    public function download($filename)
{
    $pdfDirectory = public_path('pdf');
    $filePath = $pdfDirectory . '/' . $filename;

    if (file_exists($filePath)) {
        return response()->download($filePath, $filename);
    } else {
        // Handle the case where the file does not exist
        return response()->view('errors.404', [], 404);
    }
}


    public function enquiresfiltrelist(Request $request)
    {
        $query = Enquire::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));

            // If end date is before start date, swap them
            if ($endDate->lt($startDate)) {
                $tempDate = $startDate;
                $startDate = $endDate;
                $endDate = $tempDate;
            }

            // Add the date range condition to the query
            $query->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()]);
        } elseif ($request->has('date')) {
            $selectedDate = $request->input('date');
            $query->whereDate('created_at', $selectedDate);
        }

        $enquires = $query->where('status', 1)->get();
        return view('admin.enquires-views.enquires', compact('enquires'));
    }

    public function destroy(Request $request)
    {
        $enquiry = Enquire::findOrFail(base64_decode($request->enquiry_id));
        $enquiry->status = 0;
        $enquiry->save();
        return redirect()->back()->with("success","Enquiry Deleted Successfully");
    }
    
    public function removeMulti(Request $request)
    {
        $ids = $request->ids;
        Enquire::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Enquire successfully removed."]);
         
    }

    public function enquiresview(Request $request, $id)
    {
        $enquire = Enquire::FindOrFail($id);

        return view('admin.enquires-views.enquiresview', compact('enquire'));
    }
}