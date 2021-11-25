<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Lead;
use App\Mail\SendNewMail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guests.home');
    }

    public function getContactForm()
    {
        return view('guests.contact');
    }

    public function contactFormHandler(Request $request)
    {
        $data = $request->all();
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to("account@mail.it")->send(new SendNewMail($newLead));

        return redirect()->route("guests.thanks");
    }

    public function contactFormEnder()
    {
        return view('guests.thanks');
    }
}
