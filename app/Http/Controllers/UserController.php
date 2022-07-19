<?php

namespace App\Http\Controllers;

use App\Events\UserUpdated;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('checkrole:Administrator|Customer|Provider|Agent')->only(
        //     'index', 'userVerify', 'changeUserPassword', 'update', 'updateUserPassword'
        // );
        // $this->middleware('checkrole:Administrator')->only(
        //     'create', 'store', 'adminUsers', 'usersApiDataTable', 'approveUser', 'approveUserEmail'
        // );
    }

	public function index(){
		$user = Auth::user();
		return view('users.index', compact('user'));
	}

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'document_id' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'integer', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->document_id = $request->document_id;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if($request->role == '1'){
            $user->email_verified_at = Carbon::now();
        }
        $user->password = bcrypt($request->password);
        $user->address = $request->city;
        $user->address = $request->address;
        $user->state = true;
        $user->save();
        $user->roles()->attach($request->role);

        //LLama al evento que envia correo de bienvenida
        event(new Registered($user));

        return redirect()->route('user.create')->with('success', 'el usuario ha sido creado con éxito.');
    }

    public function edit(User $usuario, Request $request){
        $op = $request->op;
        return view('users.edit', compact('usuario', 'op'));
    }

	public function update(Request $request, User $usuario){

		request()->validate([
            'document_id' => 'required|string|max:255',
    		'name' => 'required|string|max:255',
    		'lastname' => 'required|string|max:255',
    		'mobile' => 'required|string|min:5|max:255',
    	]);

        $usuario->update([
            'document_id' => $request->document_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'mobile' => $request->mobile,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        if(isset($request->from)){
            return redirect()->route('user.edit', [$usuario->account, 'op' => $request->op])->with('success', 'has actualizado la información del usuario con éxito.');
        }

        if(Auth::user()->id == $usuario->id){
            event(new UserUpdated($usuario, $request));
            return redirect()->route('user.index')->with('success', 'has actualizado tu información con éxito.');
        }
        return redirect()->route('user.index');
	}

    public function userVerify(){
    	if(Auth::user()->state){
			return redirect()->route('home');
    	}
    	return view('auth.user_verify');
    }

    public function changeUserPassword(){
    	$user = Auth::user();
    	return view('users.change_password', compact('user'));
    }

    public function updateUserPassword(Request $request, User $user){

    	request()->validate([
    		'password_actual' => 'required|string|max:20',
    		'password' => 'required|string|max:20',
    		'password_confirmation' => 'required|string|max:20'
    	]);

        if(Auth::attempt(['email' => $user->email, 'password' => $request->password_actual])){
            if($request->password == $request->password_confirmation){
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
                return redirect()->route('password.change')
                	->with('success', 'tu contraseña ha sido actualizada.');
            }else{
                return redirect()->route('password.change')
                		->with('danger', 'la contraseña nueva no coincide.');
            }
        }else{
            return redirect()->route('password.change')
            	->with('danger', 'la contraseña actual no coincide.');
        }
    }

    public function adminUsers(){
    	return view('users.admin_users');
    }

    public function usersApiDataTable(Request $request){
    	if($request->ajax()){
            $concat = DB::raw('GROUP_CONCAT(roles.name SEPARATOR ", ") AS roles');
            $query = User::query()
                ->select(
                    'users.id',
                    'users.created_at',
                    'users.name',
                    'users.lastname',
                    'users.document_id',
                    'users.account',
                    'users.state',
                    $concat
                )
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('users.id', '!=', auth()->user()->id)
                ->whereIn('role_user.role_id', [2, 3])
                ->orderBy('users.created_at', 'desc')
                ->groupBy('id');

    		return datatables()
    			->eloquent($query)
                ->addColumn('created_at', function ($query) {
                    return $query->created_at;
                })
                ->addColumn('name', function ($query) {
                    return $query->name.' '.$query->lastname;
                })
                ->addColumn('identification', function ($query) {
                    return $query->document_id;
                })
                ->addColumn('roles', function ($query) {
                    return $query->roles;
                })
                ->addColumn('contact', function ($query) {
                    return '<a data-user="'.$query->account.'" class="view-user text-success" data-toggle="modal" data-target="#modalApp">Ver contacto</a><br>
                        <a href="'.route('user.edit', $query->account).'" class="edit-user text-success">Editar contacto</a>';
                })
    			->addColumn('btn', 'layouts.datatables.actions_users_datatable')
    			->rawColumns(['contact','btn'])
    			->toJson();
    	}
    }

    public function approveUser(Request $request, User $user){
    	if($request->state == true){
    		$user->update(['state' => true]);
    		$data = [
	    		'message' => 'el usuario ha sido aprobado.',
	    		'btn' => '<a data-user="'.$user->account.'" data-state="0" class="approve-user text-danger">❌ Desaprobar</a>'
	    	];
    	}else{
    		$user->update(['state' => false]);
    		$data = [
				'message' => 'el usuario ha sido desaprobado.',
				'btn' => '<a data-user="'.$user->account.'" data-state="1" class="approve-user text-success">✅ Aprobar</a>'
			];
    	}

    	return response()->json($data);
    }

    public function approveUserEmail(User $user){
        $user->update(['email_verified_at' => Carbon::now()]);
        $data = [
            'message' => 'el usuario ha sido aprobado.'.$user->name
        ];

        return response()->json($data);
    }

    public function informationUser(User $user){
        $roles = implode(",", array_map(
            function($role){
                return $role->getRoleName();
            },
            $user->roles()->get()->all()
        ));
        $user = $user->only('account', 'document_id', 'name', 'lastname', 'mobile', 'email', 'city', 'address', 'state', 'created_at');
        return view('layouts.profile', compact('user', 'roles'));
    }

}
