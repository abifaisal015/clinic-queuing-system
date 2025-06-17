<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'citizen' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'family_name' => 'required',
            'family_contact' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'citizen' => $request->citizen,
            'nik' => $request->nik,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'family_name' => $request->family_name,
            'family_contact' => $request->family_contact,
        ]);

        $user = User::create([
            'name' => $patient->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'patient',
        ]);

        if ($patient && $user) {
            return redirect()->route('home')->with(['success' => 'Data Pasien Berhasil Disimpan']);
        } else {
            return redirect()->back()->withInput()->with(['error' => 'Data Pasien Gagal Disimpan']);
        }
    }
}
