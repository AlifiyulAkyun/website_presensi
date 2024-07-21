<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MqttController extends Controller
{
    protected $client;
    protected $supabaseUrl;
    protected $supabaseKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->supabaseUrl = env('SUPABASE_URL');
        $this->supabaseKey = env('SUPABASE_KEY');
    }

    public function saveData(Request $request)
    {
        $data = $request->all();

        try {
            $response = $this->client->post("{$this->supabaseUrl}/rest/v1/mqtt_data", [
                'headers' => [
                    'apikey' => $this->supabaseKey,
                    'Authorization' => "Bearer {$this->supabaseKey}",
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=minimal'
                ],
                'json' => [
                    'status' => $data['status'],
                    'label' => $data['label'],
                    'confident' => $data['confident'],
                    'datetime' => $data['datetime']
                ]
            ]);

            return response()->json(['message' => 'Data saved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}