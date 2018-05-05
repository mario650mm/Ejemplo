<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(Session::get('locale'));
        $users = User::where('name','like','%'.$request->get('name').'%')->
                    orderBy('updated_at','DESC')
                    ->orderBy('name','ASC')
                    ->paginate(10);
        //dd(app()->getLocale());
        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('users.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $this->register($user,$request);
        return redirect('/users')
            ->with('success','El usuario '.$user->name.' registrado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user != null){
            return view('users.show',['user' => $user]);
        }else{
            abort(404);
        }
    }

    private function register($user,$request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user != null){
            return view('users.edit',['user' => $user]);
        }else{
            abort(404);
        }
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
        $user = User::find($id);
        if($user != null){
            $this->register($user,$request);
            return redirect('/users')->with('success','El usuario '.$user->name.' actualizado exitosamente !');
        }else{
            return redirect('/users')->with('danger','El usuario no existen');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user != null){
            $user->delete();
            return redirect('/users')->with('warning','El usuario '.$user->name.' se ha eliminado correctamente');
        }else{
            return redirect('/users')->with('danger','El usuario no existen');
        }
    }
}
