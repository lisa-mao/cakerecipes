<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        return view('/home');
    }

    public function Contact()
    {
        return view('/contact-page');
    }

    public function About_us()
    {
        return view('/about-us');
    }

    public function Log_in()
    {
        return view('/login');
    }

    public function Register()
    {
        return view('/register');
    }
}
