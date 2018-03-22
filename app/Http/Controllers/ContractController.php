<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ContractController extends Controller
{

    /**
     * Form where users give a login and a password
     */
    public function login()
    {
        return view('login');
    }

    public function connect(Request $request)
    {
        $login = $request->input("inputLogin");
        $password = $request->input("inputPassword");

        $user = Users::select(["id", "login", "password"])
            ->where("login", "=", $request->input("inputLogin"))
            ->where("password", "=", hash("sha1", $request->input("inputPassword")))
            ->first();

        if ($user)
        {
            Session::put("User", $user);
            return redirect(route("contracts"));
        }
        
        return redirect(route("login"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.index');
        }
        elseif ($user)
        {
            return view('gestHeberg.index');
        }
    }

    public function newContract()
    {
        return view('gestHebergAdmin.contracts.newContract');
    }

    public function createContract()
    {

    }

    public function newType()
    {
        return view('gestHebergAdmin.contracts.newType');
    }

    public function createType()
    {

    }

    public function old()
    {
        return view('gestHebergAdmin.contracts.newType');
    }


    public function users()
    {
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.users.users');
        }
        return redirect(route("login"));
    }

    public function waitList()
    {
        return view('gestHebergAdmin.users.waitingList');
    }


    public function support()
    {
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.support.support');
        }
        elseif ($user)
        {
            return view('gestHeberg.support');
        }
        return redirect(route("login"));
    }

    public function message()
    {
        return view('gestHebergAdmin.support.message');
    }
}