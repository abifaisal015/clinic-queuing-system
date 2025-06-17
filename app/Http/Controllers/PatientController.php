<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patient::get();

        $data = [
            'patient' => $patient
        ];

        return view('patient', $data);
    }
}
