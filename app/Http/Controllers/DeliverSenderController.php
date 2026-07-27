<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Deliver;
class DeliverSenderController extends Controller
{
    public function index()
    {
        $senders = DB::table('deliver as ds')
            ->join('provinces as p','p.id','=','ds.receiver_province_id')
            ->join('regencies as r','r.id','=','ds.receiver_regency_id')
            ->join('subdistrics as d','d.id','=','ds.receiver_district_id')
            ->join('villages as v','v.id','=','ds.receiver_village_id')
            ->select(
                'ds.id',
                'ds.sender_name',
                'ds.sender_phone',
                'ds.receiver_name',
                'ds.receiver_phone',
                'ds.receiver_postal',
                'ds.status',
                DB::raw("CONCAT(v.name, ', ', d.name, ', ', r.name, ', ', p.name) as address")
            )
            ->orderByDesc('ds.id')
            ->paginate(10);

        return view('deliver.sender.index', compact('senders'));
    }

    public function create()
    {
        $provinces = DB::table('provinces')->get();
        return view('deliver.sender.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        DB::table('deliver')->insert([
            'sender_name' => $request->sender_name,
            'sender_phone' => $request->sender_phone,
            'receiver_name' => $request->receiver_name,
            'receiver_phone' => $request->receiver_phone,
            'receiver_province_id' => $request->receiver_province_id,
            'receiver_regency_id' => $request->receiver_regency_id,
            'receiver_district_id' => $request->receiver_district_id,
            'receiver_village_id' => $request->receiver_village_id,
            'receiver_postal' => $request->receiver_postal,
            'receiver_notes' => $request->receiver_notes,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('deliver.sender.index')->with('success', 'Data pengiriman berhasil ditambahkan');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,picked_up,on_delivery,delivered,cancelled'
    ]);

    DB::table('deliver')
        ->where('id', $id)
        ->update([
            'status' => $request->status, // Laravel akan escape otomatis
            'updated_at' => now()
        ]);

    return response()->json(['ok' => true]);
}
     public function edit($id)
    {
        $deliver = Deliver::findOrFail($id);
        return view('deliver.sender.edit', compact('deliver'));
    }

    public function update(Request $request, $id)
    {
        $deliver = Deliver::findOrFail($id);

        $deliver->update($request->only([
            'sender_name',
            'sender_phone',
            'receiver_name',
            'receiver_phone',
            'receiver_province_id',
            'receiver_regency_id',
            'receiver_district_id',
            'receiver_village_id',
            'receiver_postal',
            'receiver_notes',
            'status',
            'weight',
            'volumetric_weight',
            'final_weight',
            'price_per_kg',
            'total_cost',
        ]));

        return redirect()
            ->route('deliver.sender.index')
            ->with('success', 'Data pengiriman berhasil diperbarui');
    }



    public function destroy($id)
    {
        DB::table('deliver')->where('id', $id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
