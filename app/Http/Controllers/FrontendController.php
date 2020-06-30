<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers;
use App\Tasks;
use App\Developers;

class FrontendController extends Controller
{

    public function index(){
        $provides = Providers::all();
        return view('index')->with('viewData', $provides);
    }

    public function ajax(Request $request){
        $providers = new Providers();
        $data = $providers->getData($request->provider);
        $tasks =  new Tasks();
        $response = $tasks->saveData($data, $request->provider_id);

        if ($response->getData()->hata == 0){
            return response()->json(["success" => $response->getData()->success]);
        }else{
            return response()->json(["error" => 'Veriler Kaydedilirken Bir Hata Oluştu']);
        }

    }

    public function isPlaniHesapla(){
        $developers = new Developers();
        $data = $developers->hesapla();
        return $data;
    }
}
