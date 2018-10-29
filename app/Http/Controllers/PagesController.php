<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to APPNA GA!';
        return view('pages.index', compact('title'));
       // return view('pages.index')->with('title', $title);
    }

    public function login(){
        $title = 'APPNA GA - Member Login';
        return view('pages.login', compact('title'));
    }

    public function about(){
        $title = 'About APPNA GA';
        return view('pages.about', compact('title'));
    }

    public function executives(){
        $title = 'APPNA GA - About';
        return view('pages.executives', compact('title'));
    }

    public function members(){
        $title = 'APPNA GA - Members List';
        return view('pages.members', compact('title'));
    }

    public function events(){
        $title = 'APPNA GA - Events List';
        return view('pages.events', compact('title'));
    }

    public function meetings(){
        $title = 'APPNA GA - Meetings';
        return view('pages.meetings', compact('title'));
    }

    public function gallery(){
        $title = 'APPNA GA - Gallery';
        return view('pages.gallery', compact('title'));
    }
   
    public function selectMembership(){
        if(!Auth::check())
            return view('pages.index');
        if(Auth::user()->ends_at==NULL || (Auth::user()->ends_at <= now() && Auth::user()->memtype==='annual'))
            return view('pages.pay');
        else
            return view('home');
    }
    public function thanks(){
        return view('pages.thanks');
    }

    public function eventConfrim(){
        return view('membership.event');
    }
    public function event(){
        $title = 'APPNA GA - Events';
        return view('pages.event', compact('title'));
    }
}
