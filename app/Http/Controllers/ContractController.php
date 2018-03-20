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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Si id user = 1 (SISR), alors : 
         * return view('gestHeberg.contract');
         * Sinon */
        return view('gestHeberg.index');
    }

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

        $user = Users::select(["login", "password"])
            ->where("login", "=", $request->input("inputLogin"))
            ->where("password", "=", hash("sha1", $request->input("inputPassword")))
            ->first();

        if ($user)
        {
            Session::put("User", $user);
            return redirect(route("index"));
        }
        
        return redirect(route("login"));

        // $user = Users::where('login', '=', $login)->where('password', '=', $password);
        
        // if($user[0] == 1)
        // {
        //     return redirect('/index');
        // }
        // elseif ($user > 1) 
        // {
        //     return redirect('/index')/*->with($user)*/;
        // }
    
        // return redirect('/');
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
        //
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
