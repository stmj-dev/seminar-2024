<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromoCreateRequest;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promo = Promo::all(); // mengambil seluruh data
        // Promo::where('nama', '17 Agustus')->get(); // mengambil seluruh data, filter
        // Promo::where('nama', '17 Agustus')->first(); // mengambil seluruh data, filter, null
        // list data
        return view('promo.index', [
            'listPromo' => $promo,
        ]);
    }

    public function create()
    {
        // form tambah promo
        return view('promo.create');
    }

    public function store(PromoCreateRequest $request)
    {
        // interaksi model untuk menyimpan promo
        $payload = $request->only('nama', 'keterangan');
        if (Promo::create($payload)) {
            // berhasil
            return redirect()->route('promo.index');
        }

        // gagal
        return redirect()
            ->back()
            ->withInput();
    }

    public function edit(Promo $promo)
    {
        // form edit promo
        return view('promo.edit', [
            'promo' => $promo
        ]);
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ]);

        $payload = $request->only('nama', 'keterangan');
        if ($promo->update($payload)) {
            return redirect()->route('promo.index');
        }

        // gagal
        return redirect()
            ->back()
            ->withInput();
    }

    public function show(Promo $promo)
    {
        // menampilkan detail data
        return view('promo.show', [
            'promo' => $promo
        ]);
    }

    public function destroy(Promo $promo)
    {
        if ($promo->delete()) {
            return redirect()->route('promo.index');
        }

        return redirect()->route('promo.index');
    }
}
