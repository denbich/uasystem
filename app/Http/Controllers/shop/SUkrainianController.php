<?php

namespace App\Http\Controllers\shop;

use App\Models\Ukrainian;
use Illuminate\Http\Request;
use App\Models\Ukrainian_visit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SUkrainianController extends Controller
{
    public function index()
    {
        $ukrainians = Ukrainian::with('ukrainian_visit')->withCount('ukrainian_visit')->paginate('20');
        return view('shop.ukrainian.index', ['ukrainians' => $ukrainians]);
    }

    public function create()
    {
        return view('shop.ukrainian.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth' => 'required|date',
            'telephone' => 'nullable|max:255',
            'gender' => 'required|max:255',
            'address' => 'nullable|max:255',
            'work' => 'nullable|max:255',
            'stay' => 'nullable|max:255',
            'children' => 'nullable|max:255',
            'remarks' => 'nullable|max:65535',
            'card_id' => 'nullable|max:65535|unique:ukrainians,card_id',
            'rfid' => 'nullable|max:65535|unique:ukrainians,rfid',
        ]);

        if ($request->stay == null)
        {
            $stay = null;
        } else {
            $stay = $validate['stay'];
        }

        $ukrainian = Ukrainian::create([
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'birth' => $validate['birth'],
            'gender' => $validate['gender'],
            'address' => $validate['address'],
            'work' => $validate['work'],
            'stay' => $stay,
            'children' => $validate['children'],
            'remarks' => $validate['remarks'],
            'card_id' => $validate['card_id'],
            'rfid' => $validate['rfid'],
            'created_by_id' => Auth::id(),
        ]);

        $visit = Ukrainian_visit::create([
            'ukrainian_id' => $ukrainian->id,
            'user_id' => Auth::id(),
        ]);

        return back()->with(['created_ukrainian' => true]);
    }

    public function show($id)
    {
        $ukrainian = Ukrainian::where('id', $id)->withCount('ukrainian_visit')->first();
        return view('shop.ukrainian.show', ['uk' => $ukrainian]);
    }

    public function edit($id)
    {
        $ukrainian = Ukrainian::where('id', $id)->first();
        return view('shop.ukrainian.edit', ['uk' => $ukrainian]);
    }

    public function update(Request $request, $id)
    {
        $ukrainian = Ukrainian::where('id', $id)->first();
        $validate = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth' => 'required|date',
            'telephone' => 'nullable|max:255',
            'gender' => 'required|max:255',
            'address' => 'nullable|max:255',
            'work' => 'nullable|max:255',
            'stay' => 'nullable|max:255',
            'children' => 'nullable|max:255',
            'remarks' => 'nullable|max:65535',
            'card_id' => 'nullable|max:65535|unique:ukrainians,card_id',
            'rfid' => 'nullable|max:65535|unique:ukrainians,rfid',
        ]);

        if ($request->stay == null)
        {
            $stay = null;
        } else {
            $stay = $validate['stay'];
        }

        $ukrainian->update([
            'firstname' => $validate['firstname'],
            'lastname' => $validate['lastname'],
            'birth' => $validate['birth'],
            'gender' => $validate['gender'],
            'address' => $validate['address'],
            'work' => $validate['work'],
            'stay' => $stay,
            'children' => $validate['children'],
            'remarks' => $validate['remarks'],
            'card_id' => $validate['card_id'],
            'rfid' => $validate['rfid'],
            'created_by_id' => Auth::id(),
        ]);

        return back()->with(['edit_ukrainian' => true]);
    }

    public function destroy($id)
    {
        //
    }

    public function add_visit(Request $request, $ukrainian_id)
    {
        $ukrainian = Ukrainian::where('id', $ukrainian_id)->first();
        $visit = Ukrainian_visit::create([
            'ukrainian_id' => $ukrainian->id,
            'user_id' => Auth::id(),
        ]);

        return back()->with(['add_visit' => true]);
    }

    public function search()
    {
        return view('shop.ukrainian.search');
    }

    public function search_engine(Request $request)
    {

        $urkainians = Ukrainian::where('firstname', 'like', '%'.$request->search.'%')->orWhere('lastname', 'like', '%'.$request->search.'%')->orWhere('birth', 'like', '%'.$request->search.'%')->orWhere('card_id', $request->search)->orWhere('rfid', $request->search)->withCount('ukrainian_visit')->get();

        if(count($urkainians) > 0)
        {
            $table1 = '<div class="table-responsive">
            <table class="table align-items-center table-flush"> <thead class="thead-light"> <tr> <th>Imię i nazwisko</th> <th>Ilość wizyt</th> <th>Data urodzenia</th> <th>Numer tel.</th> <th>Dzieci</th> <th>Opcje</th> </tr></thead><tbody class="list">';

                $table2 = '';
                foreach ($urkainians as $uk)
                {
                    $table2 = $table2.'<tr> <th scope="row"> <div class="media align-items-center"> <a href="'.route('a.user.show', [$uk->id]) .'"> <div class="media-body"> <span class="name mb-0 text-sm">'.$uk->firstname .' '.$uk->lastname .'</span> </div> </a> </div> </th> <td><span class="badge badge-primary">'.$uk->ukrainian_visit_count.'</span></td> <td>'.date("d.m.Y", strtotime($uk->birth)) .' r.</td> <td>'.$uk->telephone .'</td> <td> <div class="d-flex align-items-center"> <span class="completion mr-2">'.$uk->children .'</span> </div> </td> <td class="text-center"> <a href="#" style="cursor:pointer" onclick="add_visit('."'".$uk->id."'".')" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a> <a href="'.route('s.ukrainian.show', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-search"></i> </a> <a href="'.route('s.ukrainian.edit', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a> </td> </tr>';
                }

                //<form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post" id="addvisit'.$uk->id .'"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>
                $table3 = '</tbody></table></div>';

            return $table1.$table2.$table3;

        } else {
            return "<h1 class='text-center text-danger'>Brak wyników!</h1>";
        }
    }

    public function visit(Request $request)
    {
        $ukrainian = Ukrainian::where('id', $request->ukrainian_id)->first();
        $visit = Ukrainian_visit::create([
            'ukrainian_id' => $ukrainian->id,
            'user_id' => Auth::id(),
        ]);

        $urkainians = Ukrainian::where('firstname', 'like', '%'.$request->search.'%')->orWhere('lastname', 'like', '%'.$request->search.'%')->orWhere('birth', 'like', '%'.$request->search.'%')->orWhere('card_id', $request->search)->orWhere('rfid', $request->search)->withCount('ukrainian_visit')->get();

        if(count($urkainians) > 0)
        {
            $table1 = '<div class="table-responsive">
            <table class="table align-items-center table-flush"> <thead class="thead-light"> <tr> <th>Imię i nazwisko</th> <th>Ilość wizyt</th> <th>Data urodzenia</th> <th>Numer tel.</th> <th>Dzieci</th> <th>Opcje</th> </tr></thead><tbody class="list">';

                $table2 = '';
                foreach ($urkainians as $uk)
                {
                    $table2 = $table2.'<tr> <th scope="row"> <div class="media align-items-center"> <a href="'.route('a.user.show', [$uk->id]) .'"> <div class="media-body"> <span class="name mb-0 text-sm">'.$uk->firstname .' '.$uk->lastname .'</span> </div> </a> </div> </th> <td><span class="badge badge-primary">'.$uk->ukrainian_visit_count.'</span></td> <td>'.date("d.m.Y", strtotime($uk->birth)) .' r.</td> <td>'.$uk->telephone .'</td> <td> <div class="d-flex align-items-center"> <span class="completion mr-2">'.$uk->children .'</span> </div> </td> <td class="text-center"> <a href="#" style="cursor:pointer;" onclick="add_visit('."'".$uk->id."'".')" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a> <a href="'.route('s.ukrainian.show', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-search"></i> </a> <a href="'.route('s.ukrainian.edit', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a> </td> </tr>';
                }

                //<form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post" id="addvisit'.$uk->id .'"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>
                $table3 = '</tbody></table></div>';

            return $table1.$table2.$table3;

        } else {
            return "<h1 class='text-center text-danger'>Brak wyników!</h1>";
        }
    }
}
