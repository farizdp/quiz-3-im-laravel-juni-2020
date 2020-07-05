<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function index() {
        $artikels = ArtikelModel::get_all();
        return view('layouts.artikel', compact('artikels'));
    }

    public function create() {
        return view('layouts.form_artikel');
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['slug'] = str_replace(" ", "-", $data['judul']);
        unset($data["_token"]);
        ArtikelModel::save($data);
        return redirect('/artikel');
    }

    public function show($id) {
        $artikel = ArtikelModel::find_by_id($id);
        return view('layouts.detail_artikel', compact('artikels, id'));
    }

    public function edit($id) {
        $artikel = ArtikelModel::find_by_id($id);
        return view('layouts.edit_artikel', compact('artikels', 'id'));
    }

    public function update(Request $request) {
        $data = $request->all();
        unset($data["_token"]);
        unset($data["_method"]);
        ArtikelModel::update($data);
        return redirect('/artikel');
    }

    public function delete($id) {
        ArtikelModel::delete($id);
        return redirect('/artikel');
    }
}
