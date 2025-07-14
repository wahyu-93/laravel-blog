<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::get();
        return view('back.config.index', compact('configs'));
    }

    public function update(Request $request, $id)
    {
        $config  = Config::where('id', $id)->firstOrFail();
        $data = $request->all();
        
        // managemen image
        if($request->hasFile('value')){
            $image = $request->file('value');
            $imageName = uniqid() .    '.' . $image->getClientOriginalExtension();

            // simpan file foto ke storage
            $image->storeAs('public/back/config/' . $imageName);

            $data['value'] = $imageName;

             // hapus foto terdahulu
            Storage::delete('public/back/config/' . $request->oldImg);
        }

        // update data
        $config->update($data);
        return redirect()->route('configs.index')->with('success', 'Config Berhasil Diubah');
    }
}
