<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
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

}
