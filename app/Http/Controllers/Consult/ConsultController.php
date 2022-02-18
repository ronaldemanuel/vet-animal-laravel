<?php

namespace App\Http\Controllers\Consult;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function index()
    {
        // List consults by user
        $user = auth()->user();
        $consults = Consult::where('user_id', $user->id)->get();
        return view('consults.index', compact('consults'));
    }

    public function create()
    {
        // List user's animals
        $user = auth()->user();
        $animals = Animal::where('user_id', $user->id)->get();
        return view('consults.create', compact('animals'));
    }

    public function store(Request $request)
    {
        $consult = new Consult();

        $consult->status = 'PENDING';
        $consult->symptoms = $request->symptoms;
        $consult->animal_id = $request->animal;

        $user = auth()->user();
        $consult->user_id = $user->id;

        $consult->save();

        return redirect('consults');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $animals = Animal::where('user_id', $user->id)->get();
        $consult = Consult::findOrFail($id);
        return view('consults.edit', compact('animals', 'consult'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $consult = Consult::findOrFail($request->id)->update($data);

        return redirect('consults');
    }

    public function destroy($id)
    {
        Consult::findOrFail($id)->delete();
        return redirect('consults');

    }

    public function cancel($id)
    {
        Consult::findOrFail($id)->update(['status' => 'CANCELED']);
        return redirect('consults');
    }


}
