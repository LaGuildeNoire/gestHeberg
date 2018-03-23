<?php

namespace App\Http\Controllers;

use App\Users;
use App\ContractType;
use App\Contracts;
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
        // $login = $request->input("inputLogin");
        // $password = $request->input("inputPassword");

        $user = Users::select(["id", "login", "password"])
            ->where("validate", "=", "YES")
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
        $users = Users::where("validate", "=", "YES")->get();
        $types = ContractType::get();

        return view('gestHebergAdmin.contracts.newContract', ['users' => $users], ['types' => $types]);
    }

    public function createContract(Request $request)
    {
        $num = Contracts::count("numero");
        $num += 1;

        $contract = new Contracts;

        $contract->numero = $num;
        $contract->idDemandeur = $request->input("user");
        $contract->title = $request->input("title");
        $contract->libelle = $request->input("libelle");
        $contract->prix = $request->input("price");
        $contract->idTypeContrat = $request->input("contractType");
        $contract->dateFin = $request->input("dateFin");

        $contract->save();

        return redirect(route("newContract"));
    }

    public function newType()
    {
        return view('gestHebergAdmin.contracts.newType');
    }

    public function createType(Request $request)
    {
        $num = ContractType::count("id");
        $num += 1;

        $type = new ContractType;

        $type->id = $num;
        $type->nom = $request->input("name");
        $type->libelle = $request->input("libelle");

        $type->save();

        return redirect(route("newType"));
    }

    public function archives()
    {
        return view('gestHebergAdmin.contracts.archives');
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