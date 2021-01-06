<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use Carbon\Carbon;

class document extends Controller
{
    //
    public function createWordDoc($id){

        $permisos = Permiso::find($id);

        $mytime = Carbon::now();
        
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $wordTest->addSection();

        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Arial');
        $fontStyle->setSize(14);

        if($permisos->tipo_permiso == "Permiso")
        {
            $desc1 = "                                                                                     Tuxtla Gutiérrez, Chis. ". $mytime; 
            $desc2 = "";
            $desc3 = "";
            $desc4 = "";
            $desc5 = "                                FORMATO PERMISO";
            $desc6 = "";
            $desc7 = "DR. JOE MICELI HERNANDEZ";
            $desc8 = "GERENTE MÉDICO";
            $desc9 = "";
            $desc10 = "Por este conducto solicito su autorización para faltar a mis labores en la(s) siguiente(s) fecha(s) ". $permisos->fecha_permiso;

            $newSection->addText($desc1);
            $newSection->addText($desc2);
            $newSection->addText($desc3);
            $newSection->addText($desc4);
            $newSection->addText($desc5, $fontStyle);
            $newSection->addText($desc6);
            $newSection->addText($desc7);
            $newSection->addText($desc8);
            $newSection->addText($desc9);
            $newSection->addText($desc10);

            $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, "Word2007");
            try{
                $objectWriter->save(storage_path("TestWordFile.docx"));
            }catch(Exception $e){
    
            }
            return response()->download(storage_path("TestWordFile.docx"));
        } elseif($permisos->tipo_permiso == "Vacaciones")
        {

        
        }
        

    }
}
