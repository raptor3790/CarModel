<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use App\Models\VehicleModel;

class VehicleController extends Controller
{
    public function index()
    {
        // make
        $makes = VehicleModel::select('make')
            ->groupBy('make')
            ->orderBy('id', 'ASC')
            ->pluck('make');

        // model
        $models = array();
        foreach ($makes as $make) {
            $model = VehicleModel::select('model')
                ->where('make', $make)
                ->orderBy('id', 'ASC')
                ->pluck('model');
            $models[$make] = $model;
        }

        // data
        $data = (object) FormData::where('id', 1)->first();

        return view('detail')->with(['makes' => $makes, 'models' => $models, 'data' => $data]);
    }

    public function properyPage()
    {
        $data = FormData::where('id', 1)->first();
        $milage = $data['milage'];
        $model = $data['model'];
        $data = (object) FormData::where('id', 1)->first();

        return view('property')->with(['milage' => $milage, 'model' => $model, 'data' => $data]);
    }

    public function update($field, $value)
    {
        FormData::updateOrInsert(['id' => 1], [$field => $value]);

        return response()->json(['Success' => true]);
    }
}
