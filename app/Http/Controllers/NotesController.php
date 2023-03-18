<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Notes::where('title','LIKE','%'.$request->search. '%')->where('uid', Auth::user()->id)->paginate(6);
        }else{
            $data = Notes::where('uid', Auth::user()->id)->paginate(6);
        };
        $value = [
            'route' => 'Notes',
            'description' => 'This is the about page.',
        ];
        return view('main', compact('data'), compact('value'));
    }

    public function notes_add(Request $request){
        $notes = new Notes;
        $notes->uid  = Auth::user()->id;
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
