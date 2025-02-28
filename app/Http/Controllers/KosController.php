<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class KosController extends Controller
{
    // Halaman survei
    public function index()
    {
        $facilitiesByCategory = [
            'Fasilitas Kamar' => [
                'AC',
                'Kamar Mandi Dalam',
                'Lemari Pakaian',
                'Meja Rias',
                'Water Heater',
                'Hewan Peliharaan',
                'Smart TV',
                'Kasur',
                'Meja Belajar',
                'Shower',
                'Cermin',
                'Jendela'
            ],
            'Fasilitas Umum' => ['Wifi', 'Dapur Bersama', 'Parkir Motor', 'Parkir Mobil', 'Kamar Mandi Bersama', 'Listrik', 'Air', 'Mesin Cuci'],
            'Lingkungan' => ['Bebas Sopan', 'Tidak berisik', 'Akses 24 Jam', 'Non 24 Jam'],
        ];

        // Kirim data ke view
        return view('survey', compact('facilitiesByCategory'));
    }

    // Pencarian kos
    // public function search(Request $request)
    // {
    //     $kosQuery = Kos::query();

    //     // Filter berdasarkan lokasi
    //     $kosQuery->when($request->filled('location'), function ($query) use ($request) {
    //         $query->where('address', 'LIKE', '%' . $request->location . '%');
    //     });

    //     // Filter berdasarkan tipe kost
    //     $kosQuery->when($request->filled('typekost'), function ($query) use ($request) {
    //         $query->where('typekost', 'LIKE', '%' . $request->typekost . '%');
    //     });

    //     // Filter berdasarkan harga
    //     $kosQuery->when($request->filled('price'), function ($query) use ($request) {
    //         $query->where('price', '<=', $request->price);
    //     });

    //     // Filter berdasarkan fasilitas
    //     $kosQuery->when($request->filled('facilities'), function ($query) use ($request) {
    //         $query->where(function ($q) use ($request) {
    //             foreach ($request->facilities as $facility) {
    //                 $q->orWhere('facilities', 'LIKE', '%' . $facility . '%');
    //             }
    //         });
    //     });

    //     $kos = $kosQuery->get();

    //     // Hitung relevansi (score) untuk setiap kost
    //     $weights = [
    //         'location' => 0.4,
    //         'typekost' => 0.1,
    //         'price' => 0.3,
    //         'facilities' => 0.2,
    //     ];

    //     $results = $kos->map(function ($kost) use ($request, $weights) {
    //         $score = 0;

    //         // Perhitungan skor berdasarkan lokasi
    //         if ($request->filled('location')) {
    //             $score += $weights['location'] * (str_contains($kost->address, $request->location) ? 1 : 0);
    //         }

    //         // Perhitungan skor berdasarkan tipe kost
    //         if ($request->filled('typekost')) {
    //             $score += $weights['typekost'] * (str_contains($kost->typekost, $request->typekost) ? 1 : 0);
    //         }

    //         // Perhitungan skor berdasarkan harga
    //         if ($request->filled('price')) {
    //             $score += $weights['price'] * ($kost->price <= $request->price ? 1 : 0);
    //         }

    //         // Perhitungan skor berdasarkan fasilitas
    //         if ($request->filled('facilities')) {
    //             $matchedFacilities = collect($request->facilities)->filter(function ($facility) use ($kost) {
    //                 return str_contains($kost->facilities, $facility);
    //             })->count();

    //             $totalFacilities = count($request->facilities);
    //             $score += $weights['facilities'] * ($matchedFacilities / $totalFacilities);
    //         }

    //         $kost->score = $score; // Tambahkan skor ke setiap kost

    //         return $kost;
    //     });

    //     // Filter hanya hasil dengan skor lebih besar dari 0 dan urutkan berdasarkan skor
    //     $filteredResults = $results->filter(function ($kost) {
    //         return $kost->score > 0.5;
    //     })->sortByDesc('score');

    //     return view('results', ['results' => $filteredResults]);
    // }

    public function search(Request $request)
    {
        $kos = Kos::all();
        $preferences = [
            'location' => $request->location,
            'typekost' => $request->typekost,
            'price' => $request->price,
            'facilities' => $request->facilities
        ];

        $weights = [
            'location' => 0.4,
            'typekost' => 0.1,
            'price' => 0.3,
            'facilities' => 0.2
        ];

        $results = $kos->map(function ($kost) use ($preferences, $weights) {
            $score = 0;

            if (!empty($preferences['location'])) {
                $score += $weights['location'] * ($kost->address === $preferences['location'] ? 1 : 0);
            }

            if (!empty($preferences['typekost'])) {
                $score += $weights['typekost'] * ($kost->typekost === $preferences['typekost'] ? 1 : 0);
            }

            if (!empty($preferences['price'])) {
                $score += $weights['price'] * ($kost->price <= $preferences['price'] ? 1 : 0);
            }

            if (!empty($preferences['facilities'])) {
                $matchedFacilities = collect($preferences['facilities'])->filter(function ($facility) use ($kost) {
                    return str_contains($kost->facilities, $facility);
                })->count();

                $totalFacilities = count($preferences['facilities']);
                $score += $weights['facilities'] * ($matchedFacilities / $totalFacilities);
            }

            $kost->score = $score;

            return $kost;
        });

        $filteredResults = $results->filter(function ($kost) {
            return $kost->score > 0;
        });

        $sortedResults = $filteredResults->sortByDesc('score');

        return view('results', ['results' => $sortedResults]);
    }

    public function showRoute($id)
    {
        $kos = Kos::findOrFail($id);

        $googleMapsUrl = $kos->link;

        return redirect($googleMapsUrl);
    }

    public function create()
    {
        return view('addKos');
    }

    public function store(Request $request)
    {
        // Pastikan validasi sudah sesuai
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'typekost' => 'required|string',
            'price' => 'required|numeric',
            'facilities' => 'nullable|array',
            'link' => 'required|url',
        ]);

        // Simpan data ke database
        Kos::create([
            'name' => $request->name,
            'address' => $request->location,  // Pastikan field sesuai dengan kolom di DB
            'typekost' => $request->typekost,
            'price' => $request->price,
            'facilities' => $request->facilities ? implode(', ', $request->facilities) : null,
            'link' => $request->link,
        ]);

        return redirect()->route('home')->with('success', 'Kos berhasil ditambahkan!');
    }
};
