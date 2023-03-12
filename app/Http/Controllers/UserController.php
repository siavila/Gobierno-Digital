<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::paginate();

        $rolActual=RoleUser::find(Auth::user()->id);
           

        $users=DB::table('users')
                  ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'role_id',
                    'roles.name as rol'
                   )
                  ->leftjoin('role_user','users.id','=','role_user.user_id' )  
                  ->leftjoin('roles','roles.id','=','role_user.role_id')
                  ->orderBy('users.id','ASC')
                  ->paginate(15);   
       

        return view('user.index', compact('users', 'rolActual'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles= Role::all()->pluck('name','id');

        $user = new User();
        return view('user.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

       //$user = User::create($request->all());

        $user=User::create($request->only('name','email')
            + ['password' => bcrypt($request->input('password'))]
        );

        $userId= User::latest('id')->first();
        
        $rolId = 2;//$request->input('roles', []);


        $roleUser= RoleUser::create(
            ['user_id'=>$userId->id]
           +['role_id'=>$rolId]
        );

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::all()->pluck('name','id');

        $user = User::find($id);

         /*     $rol=DB::table('role_user')->select(
                'id',
                'user_id',
                'role_id'
             )->where ('user_id','=', $id)
      ->orderBy('id','ASC')
      ->paginate(15);   


    $roles1= DB::table('roles')->select(
                'name',
                'id'
    )->where ('id','=',$rol[0]->role_id)
      ->orderBy('id','ASC')
      ->paginate(15);   

      $roles=Role::find($rol[0]->role_id);*/



     // dd($rol[0]->role_id, $roles1, $roles2);


        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        //$user->update($request->all());

        $data= $request->only('name', 'email',);

        $password=$request->input('password');
        
        If ($password)
            $data['password']=bcrypt($request->password);

         $user->update($data);



        $rolId = 2; //$request->input('roles', []);

//se valida para que no se pueda cambiar el rol
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index');
        } 

        RoleUser::where('id',$user->id)->update(['role_id'=>$rolId]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        //se valida que el usuario logeado no se pueda eliminar el mismo en caso de ser administrador
        if (Auth::user()->id == $id) {
            return redirect()->route('users.index');
        } 

        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
