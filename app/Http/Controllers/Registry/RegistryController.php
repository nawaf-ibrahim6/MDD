<?php

namespace App\Http\Controllers\Registry;

use App\Http\Controllers\Controller;
use App\Http\Requests\AskRequest;
use App\Models\Registery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('Ask.ask');
    }
    public function store(AskRequest $request)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);
        $text = $request->text;
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'text' => $text
        ]);
        $response = json_decode($response);
        $predicted_class = $response->predicted_class;
        $probabilities = $response->probabilities;
        $registry = Registery::query()->create([
            'user_id' => auth()->user()->id,
            'text' => $request->text,
            'predicted_class' => $predicted_class,
            'probabilities' => json_encode($probabilities)
        ]);
        $registry->probabilities = json_decode($registry->probabilities);
        return view('Predict.predict')->with('registry', $registry);
    }
}
