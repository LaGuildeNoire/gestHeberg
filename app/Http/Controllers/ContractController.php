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
     * Form where users input login and a password
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
        
        return redirect("/");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminList()
    {
        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
        ->where("dateFin", ">", date(now()))
        ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
        ->join('users', "users.id", "=", "idDemandeur")
        ->get();

        return view('gestHebergAdmin.index', ['contracts' => $contracts]);
    }

    public function newContract()
    {
        $users = Users::where("validate", "=", "YES")->where("id", ">", 1)->get();
        $types = ContractType::get();

        return view('gestHebergAdmin.contracts.newContract', ['users' => $users], ['types' => $types]);
    }

    public function createContract(Request $request)
    {
        $num = Contracts::where("idDemandeur", "=", $request->input("user"))->count("idDemandeur");
        $num += 1;

        $contract = new Contracts;

        $contract->numero = $num;
        $contract->idDemandeur = $request->input("user");
        $contract->title = $request->input("title");
        $contract->libelle = $request->input("libelle");
        $contract->prix = $request->input("price");
        $contract->idTypeContrat = $request->input("contractType");
        $contract->dateDebut = date(now());
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

    public function adminArchives()
    {
        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
        ->where("dateFin", "<=", date(now()))
        ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
        ->join('users', "users.id", "=", "idDemandeur")
        ->get();

        return view('gestHebergAdmin.contracts.archives', ['contracts' => $contracts]);
    }

    public function usersGest()
    {
        return view('gestHebergAdmin.users.users');
    }

    public function waitList()
    {
        return view('gestHebergAdmin.users.waitingList');
    }

    public function adminSupport()
    {
        return view('gestHebergAdmin.support.support');
    }

    public function Adminmessage()
    {
        return view('gestHebergAdmin.support.message');
    }


    public function userList()
    {
        $user=Session::get("User");

        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
        ->where("dateFin", ">", date(now()))
        ->where("users.id", "=", $user["id"])
        ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
        ->join('users', "users.id", "=", "idDemandeur")
        ->get();

        return view('gestHeberg.index', ['contracts' => $contracts]);
    }

    public function userArchives()
    {
        $user=Session::get("User");
        
        $contracts=Contracts::select(["numero", "name AS demName", "surname AS demSurname", "title", "prix", "nom AS type", "dateDebut", "dateFin"])
        ->where("dateFin", "<=", date(now()))
        ->where("users.id", "=", $user["id"])
        ->join('contract_types', "contract_types.id", "=", 'idTypeContrat')
        ->join('users', "users.id", "=", "idDemandeur")
        ->get();

        return view('gestHeberg.archives', ['contracts' => $contracts]);
    }

    public function userSupport()
    {
        return view('gestHeberg.support');
    }

    public function userMessage()
    {
        return view('gestHeberg.message');
    }
}