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
            'diia' => 'nullable|max:255|unique:ukrainians,diia',
            'mobywatel' => 'nullable|max:255|unique:ukrainians,mobywatel',
            'rfid' => 'nullable|max:255|unique:ukrainians,rfid',
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
            'diia' => $validate['diia'],
            'mobywatel' => $validate['mobywatel'],
            'rfid' => $validate['rfid'],
            'created_by_id' => Auth::id(),
        ]);

        $visit = Ukrainian_visit::create([
            'ukrainian_id' => $ukrainian->id,
            'food' => 1,
            'clothes' => 1,
            'detergents' => 1,
            'user_id' => Auth::id(),
        ]);

        return back()->with(['created_ukrainian' => true]);
    }

    public function show($id)
    {
        $ukrainian = Ukrainian::where('id', $id)->with('ukrainian_visit')->withCount('ukrainian_visit')->first();
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
            'diia' => 'nullable|max:255|unique:ukrainians,diia,'.$id,
            'mobywatel' => 'nullable|max:255|unique:ukrainians,mobywatel,'.$id,
            'rfid' => 'nullable|max:255|unique:ukrainians,rfid,'.$id,
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
            'telephone' => $validate['telephone'],
            'gender' => $validate['gender'],
            'address' => $validate['address'],
            'work' => $validate['work'],
            'stay' => $stay,
            'children' => $validate['children'],
            'remarks' => $validate['remarks'],
            'diia' => $validate['diia'],
            'mobywatel' => $validate['mobywatel'],
            'rfid' => $validate['rfid'],
            'created_by_id' => Auth::id(),
        ]);

        $ukrainian->save();

        return back()->with(['edit_ukrainian' => true]);
    }

    public function destroy($id)
    {
        //
    }

    public function add_visit(Request $request, $ukrainian_id)
    {
        $ukrainian = Ukrainian::where('id', $ukrainian_id)->first();

        if ($request->food == "on")
        {
            $food = 1;
        } else {
            $food = 0;
        }

        if ($request->clothes == "on")
        {
            $clothes = 1;
        } else {
            $clothes = 0;
        }

        if ($request->detergents == "on")
        {
            $detergents = 1;
        } else {
            $detergents = 0;
        }

        $visit = Ukrainian_visit::create([
            'ukrainian_id' => $ukrainian->id,
            'food' => $food,
            'clothes' => $clothes,
            'detergents' => $detergents,
            'user_id' => Auth::id(),
        ]);

        return back()->with(['add_visit' => true]);
    }

    public function search()
    {
        if (!isset($_GET['q']))
        {
            return view('shop.ukrainian.search');
        } else {
            if (!empty($_GET['q']))
            {
                $q = $_GET['q'];
                $ukrainians = Ukrainian::where('firstname', 'like', '%'.$q.'%')->orWhere('lastname', 'like', '%'.$q.'%')->orWhere('birth', 'like', '%'.$q.'%')->orWhere('diia', $q)->orWhere('mobywatel', $q)->orWhere('rfid', $q)->with('ukrainian_visit')->withCount('ukrainian_visit')->get();
                return view('shop.ukrainian.search', ['ukrainians' => $ukrainians]);
            } else {
                return view('shop.ukrainian.search');
            }
        }
    }

    public function search_engine(Request $request)
    {

        $urkainians = Ukrainian::where('firstname', 'like', '%'.$request->search.'%')->orWhere('lastname', 'like', '%'.$request->search.'%')->orWhere('birth', 'like', '%'.$request->search.'%')->orWhere('diia', $request->search)->orWhere('mobywatel', $request->search)->orWhere('rfid', $request->search)->withCount('ukrainian_visit')->get();

        if(count($urkainians) > 0)
        {
            $table1 = '<div class="table-responsive"><table class="table align-items-center table-flush"> <thead class="thead-light"> <tr> <th>Imię i nazwisko</th> <th>Ilość wizyt</th> <th>Ostatnia wizyta  - potrzeby</th> <th>Data urodzenia</th> <th>Dzieci</th> <th>Opcje</th> </tr></thead><tbody class="list">';

                $table2 = '';
                $modals = '';
                foreach ($urkainians as $uk)
                {
                    $needs = '';
                    if ($uk->ukrainian_visit->last()->food == 1) $needs.="Jedzenie, ";
                    if ($uk->ukrainian_visit->last()->detergents == 1) $needs.="Chemia, ";
                    if ($uk->ukrainian_visit->last()->clothes == 1) $needs.="Ubrania";
                    $table2 = $table2.'<tr> <th scope="row"> <div class="media align-items-center"> <a href="'.route('a.user.show', [$uk->id]) .'"> <div class="media-body"> <span class="name mb-0 text-sm">'.$uk->firstname .' '.$uk->lastname .'</span> </div> </a> </div> </th> <td><span class="badge badge-primary">'.$uk->ukrainian_visit_count.'</span></td> <td>'.$uk->ukrainian_visit->last()->created_at .' - '.$needs.' </td> <td>'.date("d.m.Y", strtotime($uk->birth)) .' r.</td> <td> <div class="d-flex align-items-center"> <span class="completion mr-2">'.$uk->children .'</span> </div> </td> <td class="text-center"> <a href="#modaluk'. $uk->id .'" data-toggle="modal" data-target="#modaluk'. $uk->id .'" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a> <a href="'.route('s.ukrainian.show', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-search"></i> </a> <a href="'.route('s.ukrainian.edit', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a> </td> </tr>';

                    //<a href="#" style="cursor:pointer" onclick="add_visit('."'".$uk->id."'".')" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a>

                    $modal = '<div class="modal fade" id="modaluk'. $uk->id .'" tabindex="-1" role="dialog" aria-labelledby="labelmodaluk'. $uk->id .'" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered" role="document"> <div class="modal-content"> <form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post"> <input type="hidden" name="_token" value="'.csrf_token().'"> <div class="modal-header"> <h5 class="modal-title" id="labelmodaluk'. $uk->id .'">Powód wizyty</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div> <div class="modal-body"> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check1'. $uk->id .'" name="clothes"> <label class="custom-control-label" for="Check1'. $uk->id .'">Ubrania</label> </div> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check2'. $uk->id .'" name="food"> <label class="custom-control-label" for="Check2'. $uk->id .'">Jedzenie</label> </div> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check3'. $uk->id .'" name="detergents"> <label class="custom-control-label" for="Check3'. $uk->id .'">Chemia / kosmetyki</label> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button> <button type="submit" class="btn btn-primary">Zatwierdź</button> </div> </form> </div> </div> </div>';

                    $modals = $modals.$modal;
                }

                //<form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post" id="addvisit'.$uk->id .'"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>
                $table3 = '</tbody></table></div>';

            return $table1.$table2.$table3.$modals;
            //return response()->json(['uk' => $urkainians]);

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

        $urkainians = Ukrainian::where('firstname', 'like', '%'.$request->search.'%')->orWhere('lastname', 'like', '%'.$request->search.'%')->orWhere('birth', 'like', '%'.$request->search.'%')->orWhere('diia', $request->search)->orWhere('mobywatel', $request->search)->orWhere('rfid', $request->search)->withCount('ukrainian_visit')->get();

        if(count($urkainians) > 0)
        {
            $table1 = '<div class="table-responsive"><table class="table align-items-center table-flush"> <thead class="thead-light"> <tr> <th>Imię i nazwisko</th> <th>Ilość wizyt</th> <th>Ostatnia wizyta</th> <th>Data urodzenia</th> <th>Numer tel.</th> <th>Dzieci</th> <th>Opcje</th> </tr></thead><tbody class="list">';

                $table2 = '';
                $modals = '';
                foreach ($urkainians as $uk)
                {
                    $needs = '';
                    if ($uk->ukrainian_visit->last()->food == 1) $needs.="Jedzenie, ";
                    if ($uk->ukrainian_visit->last()->detergents == 1) $needs.="Chemia, ";
                    if ($uk->ukrainian_visit->last()->clothes == 1) $needs.="Ubrania";
                    $table2 = $table2.'<tr> <th scope="row"> <div class="media align-items-center"> <a href="'.route('a.user.show', [$uk->id]) .'"> <div class="media-body"> <span class="name mb-0 text-sm">'.$uk->firstname .' '.$uk->lastname .'</span> </div> </a> </div> </th> <td><span class="badge badge-primary">'.$uk->ukrainian_visit_count.'</span></td> <td>'.$uk->ukrainian_visit->last()->created_at .' - '.$needs.' </td> <td>'.date("d.m.Y", strtotime($uk->birth)) .' r.</td> <td> <div class="d-flex align-items-center"> <span class="completion mr-2">'.$uk->children .'</span> </div> </td> <td class="text-center"> <a href="#modaluk'. $uk->id .'" data-toggle="modal" data-target="#modaluk'. $uk->id .'" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a> <a href="'.route('s.ukrainian.show', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-search"></i> </a> <a href="'.route('s.ukrainian.edit', [$uk->id]) .'" class="text-lg mx-1"> <i class="fas fa-edit"></i> </a> </td> </tr>';

                    //<a href="#" style="cursor:pointer" onclick="add_visit('."'".$uk->id."'".')" class="text-lg mx-1"> <i class="fas fa-plus"></i> </a>

                    $modal = '<div class="modal fade" id="modaluk'. $uk->id .'" tabindex="-1" role="dialog" aria-labelledby="labelmodaluk'. $uk->id .'" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered" role="document"> <div class="modal-content"> <form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post"> <input type="hidden" name="_token" value="'.csrf_token().'"> <div class="modal-header"> <h5 class="modal-title" id="labelmodaluk'. $uk->id .'">Powód wizyty</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div> <div class="modal-body"> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check1'. $uk->id .'" name="clothes"> <label class="custom-control-label" for="Check1'. $uk->id .'">Ubrania</label> </div> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check2'. $uk->id .'" name="food"> <label class="custom-control-label" for="Check2'. $uk->id .'">Jedzenie</label> </div> <div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" id="Check3'. $uk->id .'" name="detergents"> <label class="custom-control-label" for="Check3'. $uk->id .'">Chemia / kosmetyki</label> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button> <button type="submit" class="btn btn-primary">Zatwierdź</button> </div> </form> </div> </div> </div>';

                    $modals = $modals.$modal;
                }

                //<form action="'.route('s.ukrainian.addvisit', [$uk->id]) .'" method="post" id="addvisit'.$uk->id .'"> <input type="hidden" name="_token" value="'.csrf_token().'"> </form>
                $table3 = '</tbody></table></div>';

            return $table1.$table2.$table3.$modals;

        } else {
            return "<h1 class='text-center text-danger'>Brak wyników!</h1>";
        }
    }

    public function digital(Request $request)
    {
        $validate = $request->validate([
            'diia' => 'nullable|max:255|unique:ukrainians,diia,'.$request->id,
            'mobywatel' => 'nullable|max:255|unique:ukrainians,mobywatel,'.$request->id,
            'rfid' => 'nullable|max:255|unique:ukrainians,rfid,'.$request->id,
        ]);

        $ukrainian = Ukrainian::where('id', $request->id)->first();
        $ukrainian->update([
            'diia' => $validate['diia'],
            'mobywatel' => $validate['mobywatel'],
            'rfid' => $validate['rfid'],
        ]);
        $ukrainian->save();

        return back()->with(['change_digital' => true]);
    }
}
