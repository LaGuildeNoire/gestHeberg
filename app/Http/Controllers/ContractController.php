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
        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
            ->where("dateDebut", "<", date(now()))
            ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
            ->join('users', "users.id", "=", "idDemandeur")
            ->get();

        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.index', ['contracts' => $contracts]);
        }
        elseif ($user)
        {
            return view('gestHeberg.index', ['contracts' => $contracts]);
        }

        return redirect(route('login'));
    }

    public function newContract()
    {
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            $users = Users::where("validate", "=", "YES")->get();
            $types = ContractType::get();

            return view('gestHebergAdmin.contracts.newContract', ['users' => $users], ['types' => $types]);
        }

        return redirect(route('login'));
    }

    public function createContract(Request $request)
    {
        $user=Session::get("User");
        if ($user['id']==1) 
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

        return redirect(route('login'));
    }

    public function newType()
    {
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.contracts.newType');
        }

        return redirect(route('login'));
    }

    public function createType(Request $request)
    {
        $user=Session::get("User");
        if ($user['id']==1) 
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

        return redirect(route('login'));
    }

    public function archives()
    {
        $user=Session::get("User");
        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
            ->where("dateDebut", ">=", date(now()))
            ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
            ->join('users', "users.id", "=", "idDemandeur")
            ->get();

        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.contracts.archives', ['contracts' => $contracts]);
        }
        elseif ($user)
        {
            return view('gestHeberg.archives', ['contracts' => $contracts]);
        }

        return redirect(route('login'));
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
         $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.users.waitingList');
        }

        return redirect(route('login'));
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
        $user=Session::get("User");
        if ($user['id']==1) 
        {
            return view('gestHebergAdmin.support.message');
        }
        elseif ($user)
        {
            return view('gestHeberg.message');
        }

        return redirect(route("login"));
    }
}