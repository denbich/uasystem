<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'telephone' => 'required|string|max:255',
            'role' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'email' => $validate['email'],
            'telephone' => $validate['telephone'],
            'role' => $validate['role'],
            'password' => Hash::make($validate['password']),
        ]);

        return back()->with(['create_user' => true]);
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,'.$id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'telephone' => 'required|string|max:255',
        ]);

        $user = User::where('id', $id)->first();
        if($request->password == 'on')
        {
            $user->update([
                'name' => $validate['name'],
                'firstname' => $validate['firstname'],
                'lastname' => $validate['lastname'],
                'email' => $validate['email'],
                'telephone' => $validate['telephone'],
                'password' => Hash::make('password'),
            ]);
        } else {
            $user->update([
                'name' => $validate['name'],
                'firstname' => $validate['firstname'],
                'lastname' => $validate['lastname'],
                'email' => $validate['email'],
                'telephone' => $validate['telephone'],
            ]);
        }

        return back()->with(['edit_user' => true]);

    }

    public function destroy($id)
    {
        //
    }

    public function search()
    {
        return view('admin.users.search');
    }

    public function search_engine(Request $request)
    {
        $users = User::where('name', 'like', '%'.$request->search.'%')->orWhere('email', 'like', '%'.$request->search.'%')->orWhere('firstname', 'like', '%'.$request->search.'%')->orWhere('lastname', 'like', '%'.$request->search.'%')->get();

        if(count($users) > 0)
        {
            $table1 = '<div class="table-responsive"> <table class="table align-items-center table-flush"> <thead class="thead-light"> <tr> <th scope="col" class="sort" data-sort="name">Login</th> <th scope="col" class="sort" data-sort="firstlastname">Imię i nazwisko</th> <th scope="col">Numer tel.</th> <th scope="col">Adres email</th> <th scope="col" class="sort" data-sort="completion">Rola</th> <th scope="col">Opcje</th> </tr> </thead> <tbody class="list">';

                $table2 = '';
                foreach ($users as $user)
                {
                    switch($user->role)
                    {
                        case('admin'): $role = 'Administrator'; break;
                        case('shop'): $role = 'Sklep'; break;
                        case('organisation'): $role = 'Organizacja'; break;
                    }
                    $table2 = $table2.'<tr> <!--<th><input type="checkbox" name="" id=""></th>--> <th scope="row"> <div class="media align-items-center"> <a href="'.route('a.user.show', [$user->id]).'"> <div class="media-body"> <span class="name mb-0 text-sm">'.$user->name .'</span> </div> </a> </div> </th> <td>'. $user->firstname .' '. $user->lastname .'</td> <td>'. $user->telephone .'</td> <td> <a href="mailto:'. $user->email .'">'. $user->email .'</a> </td> <td> <div class="d-flex align-items-center"> <span class="completion mr-2"> '.$role.' </span> </div> </td> <td class="text-center"> <a href="'.route('a.user.show', [$user->id]).'" class="text-lg mx-1"> <i class="fas fa-search"></i> </a> <a href="'.route('a.user.edit', [$user->id]).'" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a> </td> </tr>';
                }

                $table3 = '</tbody></table></div>';

            return $table1.$table2.$table3;

        } else {
            return "<h1 class='text-center text-danger'>Brak wyników!</h1>";
        }
    }
}
