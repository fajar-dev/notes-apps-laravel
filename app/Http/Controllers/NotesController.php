<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){
        $data = Notes::all();
        return view('main', compact('data'));
    }

    public function notes_add(Request $request){
        $notes = new Notes;
        $notes->title  = $request->judul;
        $notes->content  = $request->isi;
        $notes->save();

        return redirect()->route('notes')->with('success','Data berhasil ditambahkan');
    }

    public function notes_update(Request $request){
        $notes = Notes::find($request->id);
        $notes->title  = $request->judul;
        $notes->content  = $request->isi;
        $notes->save();

        return redirect()->route('notes')->with('success','Data berhasil diupdate');
    }

    public function notes_delete($id){
        $notes = Notes::find($id);
        $notes->delete();
        return redirect()->route('notes')->with('success','Data berhasil dihapus');
    }
}
