<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Artical::all(); // Mengambil semua artikel
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = Artical::create($request->all()); // Menyimpan artikel baru
        return response()->json($article, 201); // Mengembalikan respons JSON dengan status 201 (created)
    }

    /**
     * Mendapatkan Artikel
     */
    public function show(string $id)
    {
        return Artical::findOrFail($id); // Mengambil artikel berdasarkan ID atau gagal jika tidak ditemukan
    }

    /**
     * Memperbarui Artikel
     */
    public function update(Request $request, string $id)
    {
        $article = Artical::findOrFail($id); // Mencari artikel berdasarkan ID
        $article->update($request->all()); // Memperbarui artikel dengan data baru
        return response()->json($article, 200); // Mengembalikan respons JSON dengan status 200 (OK)
    }

    /**
     * Menghapus Artikel
     */
    public function destroy(string $id)
    {
        Artical::findOrFail($id)->delete(); // Menghapus artikel berdasarkan ID atau gagal jika tidak ditemukan
        return response()->json(null, 204); // Mengembalikan respons JSON dengan status 204 (No Content)
    }
}
