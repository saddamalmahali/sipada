<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\RegWilayah;
class ToolsController extends Controller
{
    public function index_migrate_wilayah(Request $request){
        
        return view('client.tools.migration.index');
        
    }

    public function migrasi_wilayah(Request $request){
         $file = $request->file_migrasi;

         if(is_null($file)){
             echo "Tidak Ada Migrasi";
         }else{
             $customerArr = $this->csvToArray($file);

             foreach ($customerArr as $data) {
                 $wilayah = new Wilayah();
                 $wilayah->wilayah_id = $data['wilayah_id'];
                 $wilayah->parent_id = $data['parent'];
                 $wilayah->nama = $data['nama'];
                 $wilayah->save();
                 echo var_dump($data). " sukses";
                 echo "<br />";
             }
         }
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen(public_path() . '/wilayah.csv','r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public function index_registrasi_wilayah(){
        $wilayah = Wilayah::where('parent_id', '=', '27714')->paginate(10);
        return view('client.preferences.registrasi_wilayah.index', ['data_wilayah'=>$wilayah]);
    }

    public function tambah_registrasi_wilayah($id)
    {
        $wilayah = Wilayah::where('wilayah_id', '=', $id)->first();
        return view('client.preferences.registrasi_wilayah.tambah', ['wilayah'=>$wilayah]);
    }

    public function simpan_registrasi_wilayah(Request $request)
    {
        $wilayah_id = $request->input('wilayah_id');
        $lat = $request->input('lat');
        $long = $request->input('long');

        $regis = new RegWilayah();
        $regis->wilayah_id = $wilayah_id;
        $regis->lat = $lat;
        $regis->long = $long;
        
        if($regis->save()){
            $request->session()->flash('status', 'Konfigurasi Wilayah Sukses!');
            return redirect('/client/preferences/registrasi_wilayah');
        }
    }

    public function detile_wilayah($id){
        $wilayah = Wilayah::where('wilayah_id', '=', $id)->first();
        return view('client.preferences.registrasi_wilayah.detile', ['wilayah'=>$wilayah]);
    }

}
