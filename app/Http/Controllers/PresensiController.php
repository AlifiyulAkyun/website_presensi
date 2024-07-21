<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Presensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::orderBy('created_at', 'desc')->get();
        return view('presensi.index', compact('presensi'));
    }

    public function store(Request $request)
    {
        $presensi = Presensi::create($request->all());
        return response()->json($presensi);
    }
    public function MQTT(Request $request)
    {
        \Log::info('Received MQTT request: ' . $request->getContent());
    
        if (!$request->isJson()) {
            return response()->json(['error' => 'Invalid JSON'], 400);
        }
    
        try {
            $data = $request->json()->all();
    
            // Validation
            $validator = Validator::make($data, [
                'status' => 'required|string',
                'label' => 'required|string',
                'confident' => 'required|numeric',
                'datetime' => 'required|date_format:Y-m-d H:i:s',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
    
            $presensi = Presensi::create([
                'status' => $data['status'],
                'label' => $data['label'],
                'confident' => $data['confident'],
                'datetime' => $data['datetime'],
            ]);
    
            return response()->json(['message' => 'Data saved successfully', 'data' => $presensi]);
        } catch (\Exception $e) {
            \Log::error('MQTT Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to process data: ' . $e->getMessage()], 500);
        }
    }
}