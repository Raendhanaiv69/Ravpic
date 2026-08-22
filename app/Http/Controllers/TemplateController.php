<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        // Contoh kategori filter
        $category = $request->query('category', 'all');

        // Dummy data atau ambil dari database: Template::when(...)->get();
        return view('templates.index', compact('category'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'layout_type' => 'required|string',
            'frame_image' => 'required|image|mimes:png|max:5120', // Frame PNG transparan
        ]);

        // Simpan file & database logic...

        return redirect()->route('templates.index')->with('success', 'Template baru berhasil ditambahkan!');
    }

    public function setActive($id)
    {
        // Set template aktif untuk photobooth...
        
        return redirect()->back()->with('success', 'Template aktif berhasil diubah!');
    }
}