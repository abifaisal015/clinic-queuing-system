<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    public function index()
    {
        $poli = Poli::get();
        $queue = Queue::count();
        $generate = $queue + 1;

        $data = [
            'poli' => $poli,
            'queue' => $generate
        ];

        return view('patient.index', $data);
    }

    public function get_queue(Request $request)
    {
        $this->validate($request, [
            'poli' => 'required',
            'queue' => 'required',
        ]);

        $queue = Queue::create([
            'name' => Auth::user()->name,
            'poli_code' => $request->poli,
            'queue_number' => $request->queue,
        ]);

        if ($queue) {
            return redirect()->back()->with(['success' => 'Pengambilan Antrian Berhasil']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Pengambilan Antrian Gagal']);
        }
    }

    public function print_queue()
    {
        $name = Auth::user()->name;
        $queue = Queue::where('name', $name)->first();

        $data = [
            'data' => $queue
        ];

        return view('patient.print_queue', $data);
    }
}
