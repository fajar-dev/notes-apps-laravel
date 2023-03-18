<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Notes::where('title','LIKE','%'.$request->search. '%')->paginate(6);
        }else{
            $data = Notes::paginate(6);
        }
        // dd($data);
        return view('main', compact('data'));
    }

    public function notes_add(Request $request){
        $notes = new Notes;
        $notes->title  = $request->judul;
        $notes->content  = $request->isi;
        $notes->save();

        return redirect()->route('notes')->with('success','Notes have been added');
    }

    public function notes_update(Request $request){
        $notes = Notes::find($request->id);
        $notes->title  = $request->judul;
        $notes->content  = $request->isi;
        $notes->save();

        return redirect()->route('notes')->with('success','Notes have been updated');
    }

    public function notes_delete($id){
        $notes = Notes::find($id);
        $notes->delete();
        return redirect()->route('notes')->with('success','Notes have been deleted');
    }
}
