<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function home() {
        return view('home');
    }

    public function input(Request $request) {

        $datas['input'] = $request->input;

        return view('input', compact(
            'datas'
        ));
    }

    public function hasil(Request $request ,int $input) { 
        
        // Initializing Variable
        $xtotal = 0;
        $ytotal = 0;
        $x2total = 0;
        $y2total = 0;
        $xytotal = 0;

        // Initializing Arrays
        $xinput = [];
        $yinput = [];
        $x2input = [];
        $y2input = [];
        $xyinput = [];

        for ($i = 1; $i <= $input; $i++){  
            $xinput[$i] = $request->input('xinput'.$i);
            $xtotal += $request->input('xinput'.$i); 
        }   
 

        for ($i = 1; $i <= $input; $i++){  
            $yinput[$i] = $request->input('yinput'.$i);
            $ytotal += $request->input('yinput'.$i); 
        } 

        for ($i = 1; $i <= $input; $i++){  
            $x2input[$i] = ($request->input('xinput'.$i) * $request->input('xinput'.$i));
            $x2total += ($request->input('xinput'.$i) * $request->input('xinput'.$i)); 
        } 

        for ($i = 1; $i <= $input; $i++){  
            $y2input[$i] = ($request->input('yinput'.$i) * $request->input('yinput'.$i)); 
            $y2total += ($request->input('yinput'.$i) * $request->input('yinput'.$i)); 
        } 

        for ($i = 1; $i <= $input; $i++){  
            $xyinput[$i] = ($request->input('xinput'.$i) * $request->input('yinput'.$i)); 
            $xytotal += ($request->input('xinput'.$i) * $request->input('yinput'.$i)); 
        }  

        $a = (($ytotal * $x2total) - ($xtotal * $xytotal)) / (($input * $x2total) - ($xtotal * $xtotal));
        $b = (($input * $xytotal) - ($xtotal * $ytotal)) / (($input * $x2total) - ($xtotal * $xtotal)); 

        $hasil['xinput'] = $xinput;
        $hasil['yinput'] = $yinput;
        $hasil['x2input'] = $x2input;
        $hasil['y2input'] = $y2input;
        $hasil['xyinput'] = $xyinput; 
        $hasil['xtotal'] = $xtotal;
        $hasil['ytotal'] = $ytotal;
        $hasil['x2total'] = $x2total;
        $hasil['y2total'] = $y2total;
        $hasil['xytotal'] = $xytotal; 
        $hasil['xrata'] = $xtotal / $input;
        $hasil['yrata'] = $ytotal / $input;
        $hasil['a'] = $a; 
        $hasil['b'] = $b;  

        $data['berapaInput'] = $input;

        return view('hasil', compact(
            'hasil', 'data'
        ));
    }
}
