<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Transaction;
use App\Models\TransactionRole;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function assignProfile(){
        $roles = Role::where('id', '!=', '5')->get();
        return view('profiles.assign_profile', compact('roles'));
    }

    public function saveAssignProfile(Request $request){
        request()->validate([
            'document_id' => 'required',
    		'role' => 'required|integer',
    	]);
        $document_id = $request->document_id;
        $user = User::where('document_id', $document_id)->first();
        if(isset($user->id)){
            $roleUser = new RoleUser();
            $roleUser->user_id = $user->id;
            $roleUser->role_id = $request->role;
            $roleUser->save();
            return redirect()->route('assign.profile')->with('success', 'has asignado un nuevo perfil con éxito.');
        }
        return redirect()->route('assign.profile')->with('danger', 'no se ha encontrado el usuario con documento '.$document_id.'.');
    }

    public function createProfile(){
        return view('profiles.create');
    }

    public function saveCreateProfile(Request $request){
        request()->validate([
            'name' => 'required',
    		'description' => 'required',
    	]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('create.profile')->with('success', 'has creado un nuevo perfil con éxito.');
    }

    public function adminProfile(){
        $roles = Role::where('id', '!=', '5')->get();
        $categories = Transaction::select('category')->groupBy('category')->get();
        $transactions = Transaction::get();
        return view('profiles.admin', compact('roles', 'categories', 'transactions'));
    }

    public function profilesApiDataTable(Request $request){
    	if($request->ajax()){
            $query = Role::query();
    		return datatables()
    			->eloquent($query)
                ->addColumn('name', function ($query) {
                    return $query->name;
                })
                ->addColumn('description', function ($query) {
                    return $query->description;
                })
    			->toJson();
    	}
    }

    public function changeProfileUser(Role $role){
        auth()->user()->update([
            'active_role' => $role->id
        ]);
        return redirect()->route('home')->with('success', 'has cambiado de perfil con éxito.');
    }

    public function saveAdminProfile(Request $request){
        request()->validate([
            'transaction' => 'required',
    		'role' => 'required',
    	]);

        $exist = TransactionRole::where('transaction_id', $request->transaction)
            ->where('role_id', $request->role)
            ->exists();
        if(!$exist){
            $transactionRole = new TransactionRole();
            $transactionRole->transaction_id = $request->transaction;
            $transactionRole->role_id = $request->role;
            $transactionRole->save();
            return redirect()->route('admin.profile')->with('success', 'has asignado una nueva transacción con éxito.');
        }
        return redirect()->route('admin.profile')->with('success', 'esta asignación ya existe.');
    }

    public function profilesTransactionsApiDataTable(Request $request){
        if($request->ajax()){
            $query = TransactionRole::query()
                ->select('role_transaction.id', 'roles.name AS nameRole', 'transactions.name AS nameTransaction')
                ->join('roles', 'role_transaction.role_id', '=', 'roles.id')
                ->join('transactions', 'role_transaction.transaction_id', '=', 'transactions.id');
    		return datatables()
    			->eloquent($query)
                ->addColumn('profile', function ($query) {
                    return $query->nameRole;
                })
                ->addColumn('transaction', function ($query) {
                    return $query->nameTransaction;
                })
                ->addColumn('delete', function ($query) {
                    return '<a data-transaction-role="'.$query->id.'" class="transaction-role text-danger">❌ Eliminar</a>';
                })
                ->rawColumns(['delete'])
    			->toJson();
    	}
    }

    public function deleteAdminProfile(TransactionRole $transactionRole){
        $transactionRole->delete();
        return response()->json([
            'message' => 'has eliminado las asignación con éxito.'
        ]);
    }
}
