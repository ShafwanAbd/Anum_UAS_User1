@extends('layouts.layout')

@section('content')
<div class="container2 hasil my-5">
    <div class="card w-75" style="width: 18rem;"> 
        <div class="card-body p-5">
            <a href="{{ url('/') }}" class="text-decoration-none t-primary fs-6 fw-bolder">Kembali</a>
            <h1 class="card-title mb-4 text-center mb-5 t-primary title">Regresi Linear</h1> 

            <h3 class="mx-5 mb-3 t-primary title">Tabel</h3>
            <table class="table table-hover table-bordered text-center mb-5">
                <thead>
                    <tr class="bg-primary fs-5"> 
                        <th scope="col">X</th>
                        <th scope="col">Y</th>
                        <th scope="col">X2</th>
                        <th scope="col">Y2</th>
                        <th scope="col">XY</th> 
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= $data['berapaInput']; $i++)
                    <tr> 
                        <td>{{ $hasil['xinput'][$i] }}</td>
                        <td>{{ $hasil['yinput'][$i] }}</td>
                        <td>{{ $hasil['x2input'][$i] }}</td>
                        <td>{{ $hasil['y2input'][$i] }}</td>
                        <td>{{ $hasil['xyinput'][$i] }}</td> 
                    </tr> 
                    @endfor
                </tbody>
                <tfoot>
                    <tr class="bg-secondary-025"> 
                        <td>{{ $hasil['xtotal'] }}</td>
                        <td>{{ $hasil['ytotal'] }}</td>
                        <td>{{ $hasil['x2total'] }}</td>
                        <td>{{ $hasil['y2total'] }}</td>
                        <td>{{ $hasil['xytotal'] }}</td> 
                    </tr> 
                </tfoot>
            </table>

            <div>
                <h3 class="mx-5 mb-3 t-primary title">Cara 1</h3>

                <div id="carake1" class="my-4 w-100 fs-4"> 
                    <div class="d-flex justify-content-evenly mx-8">
                        <div class="">
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $hasil['ytotal'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})({{ $hasil['xytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $hasil['ytotal'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])}}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>a</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div>

                        <div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }})</mi>
                                        <msup>
                                            <mrow>
                                                <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                            </mrow>
                                            <mn>2</mn>
                                        </msup>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="my-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }}</mi>
                                        <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div>
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mfrac>
                                        <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal']) }}</mi>
                                        <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                    </mfrac>
                                </math>
                            </div>
                            <div class="mt-4">
                                <math>
                                    <mi>b</mi>
                                    <mo>=</mo>
                                    <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                                </math>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
 
            <h3 class="mx-5 mt-5 mb-3 t-primary title">Cara 2</h3>

            <div id="carake2" class="my-4 text-center fs-5">
                <div class="w-50 mx-auto mb-5">
                    <math>
                        <mrow>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                    <mn>{{ $hasil['xtotal'] }}</mn>
                                </mfrac>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                    <mn>{{ $hasil['x2total'] }}</mn>
                                </mfrac>
                            <mo>)</mo>
                        </mrow>
                        <mrow>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2 py-1">
                                    <mi class="mb-2">a</mi>
                                    <mi>b</mi>
                                </mfrac>
                            <mo>)</mo>
                        </mrow>
                        <mo>=</mo>
                        <mrow>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2 py-1">
                                    <mo class="mb-2">{{ $hasil['ytotal'] }}</mo>
                                    <mo>{{ $hasil['xytotal'] }}</mo>
                                </mfrac>
                            <mo>)</mo>
                        </mrow>
                    </math>
                </div>

                <div class="w-50 mx-auto text-start">

                    <math> 
                        <mrow>
                            <mo>A</mo><mo>=</mo>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                    <mn>{{ $hasil['xtotal'] }}</mn>
                                </mfrac>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                    <mn>{{ $hasil['x2total'] }}</mn>
                                </mfrac>
                            <mo>)</mo>
                        </mrow>
                    </math>

                    <div class="mb-5">
                        <math>                                                                        
                            <mo>det A</mo> 
                            <mo>=</mo>
                            <mo>(</mo><mn>{{ $data['berapaInput'] }}</mn><mo>)</mo>
                            <mo>(</mo><mn>{{ $hasil['x2total'] }}</mn><mo>)</mo>
                            <mo>-</mo>
                            <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                            <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                            <mo>=</mo>
                            <mn>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mn>
                        </math>
                    </div>

                    <math>
                        <mrow>
                            <msub>                                                                   
                                <mi>A</mi>
                                <mn>1</mn>
                            </msub>
                            <mo>=</mo>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $hasil['ytotal'] }}</mn>
                                    <mn>{{ $hasil['xytotal'] }}</mn>
                                </mfrac>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $hasil['xtotal'] }}</mn>
                                    <mn>{{ $hasil['x2total'] }}</mn>
                                </mfrac>
                            <mo>)</mo>
                        </mrow> 
                    </math>

                    <div class="mb-5">
                        <math>                                                                   
                            <msub>                                                                   
                                <mi>det A</mi>
                                <mn>1</mn>
                            </msub>
                            <mo>=</mo>
                            <mo>(</mo><mn>{{ $hasil['ytotal'] }}</mn><mo>)</mo>
                            <mo>(</mo><mn>{{ $hasil['x2total'] }}</mn><mo>)</mo>
                            <mo>-</mo>
                            <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                            <mo>(</mo><mn>{{ $hasil['xytotal'] }}</mn><mo>)</mo>
                            <mo>=</mo>
                            <mn>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal']) }}</mn>
                        </math>
                    </div>

                    <math>
                        <mrow>
                            <msub>                                                                   
                                <mi>A</mi>
                                <mn>2</mn>
                            </msub>
                            <mo>=</mo>
                            <mo>(</mo>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $data['berapaInput'] }}</mn>
                                    <mn>{{ $hasil['xtotal'] }}</mn>
                                </mfrac>
                                <mfrac linethickness="0" class="px-2">
                                    <mn class="mb-2">{{ $hasil['ytotal'] }}</mn>
                                    <mn>{{ $hasil['xytotal'] }}</mn>
                                </mfrac>
                            <mo>)</mo>
                        </mrow>
                    </math>

                    <div class="mb-5">
                        <math>
                            <msub>                                                                   
                                <mi>det A</mi>
                                <mn>2</mn>
                            </msub>
                            <mo>=</mo>
                            <mo>(</mo><mn>{{ $data['berapaInput'] }}</mn><mo>)</mo>
                            <mo>(</mo><mn>{{ $hasil['xytotal'] }}</mn><mo>)</mo>
                            <mo>-</mo>
                            <mo>(</mo><mn>{{ $hasil['ytotal'] }}</mn><mo>)</mo> 
                            <mo>(</mo><mn>{{ $hasil['xtotal'] }}</mn><mo>)</mo>
                            <mo>=</mo>
                            <mn>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal']) }}</mn>
                        </math>
                    </div>
                </div>

                <div class="d-flex justify-content-evenly w-50 mx-auto mt-4">
                    <div class="">
                        <math>
                            <mi>a</mi>
                            <mo>=</mo>
                            <mfrac>
                                <mi>{{ ($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal']) }}</mi>
                                <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                            </mfrac>
                            <mo>=</mo>
                            <mn>{{ (($hasil['ytotal'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mn>
                        </math>
                    </div>
                    <div class="">
                        <math>
                            <mi>b</mi>
                            <mo>=</mo>
                            <mfrac>
                                <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal']) }}</mi>
                                <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                            </mfrac>
                            <mo>=</mo>
                            <mn>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['ytotal'] * $hasil['xtotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mn>
                        </math>
                    </div> 
                </div>
            </div>
    
            <h3 class="mx-5 mt-5 mb-3 t-primary title">Cara 3</h3>

            <div id="carake3" class="my-4 fs-4">
                <div class="d-flex justify-content-evenly w-75 mx-auto">
                    <div class="">
                        <div>
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>({{ $data['berapaInput'] }})({{ $hasil['xytotal'] }})-({{ $hasil['xtotal'] }})({{ $hasil['ytotal'] }})</mi>
                                    <msup>
                                        <mrow>
                                            <mi>({{ $data['berapaInput'] }})({{ $hasil['x2total'] }})-({{ $hasil['xtotal'] }})</mi>
                                        </mrow>
                                        <mn>2</mn>
                                    </msup>
                                </mfrac>
                            </math>
                        </div>
                        <div class="my-4">
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>{{ $data['berapaInput'] * $hasil['xytotal'] }}-{{ $hasil['xtotal'] * $hasil['ytotal'] }}</mi>
                                    <mi>{{ $data['berapaInput'] * $hasil['x2total'] }}-{{ $hasil['xtotal'] * $hasil['xtotal'] }}</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div>
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mfrac>
                                    <mi>{{ ($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])}}</mi>
                                    <mi>{{ ($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal']) }}</mi>
                                </mfrac>
                            </math>
                        </div>
                        <div class="mt-4">
                            <math>
                                <mi>b</mi>
                                <mo>=</mo>
                                <mi>{{ (($data['berapaInput'] * $hasil['xytotal']) - ($hasil['xtotal'] * $hasil['ytotal'])) / (($data['berapaInput'] * $hasil['x2total']) - ($hasil['xtotal'] * $hasil['xtotal'])) }}</mi>
                            </math>
                        </div>
                    </div>

                    <div>
                        <div>
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mi>{{ $hasil['yrata'] }}-{{ $hasil['b'] }}({{ $hasil['xrata'] }})</mi>
                            </math>
                        </div>
                        <div class="my-4">
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mi>{{ $hasil['yrata'] }}-{{ $hasil['b'] * $hasil['xrata'] }}</mi>
                            </math>
                        </div>
                        <div>
                            <math>
                                <mi>a</mi>
                                <mo>=</mo>
                                <mi>{{ $hasil['yrata'] - ($hasil['b'] * $hasil['xrata']) }}</mi>
                            </math>
                        </div> 
                    </div> 
                </div>
            </div>

            <h3 class="mx-5 mt-5 mb-3 t-primary title">Persamaan Regresi Linear</h3>

            <p class="text-center fst-italic fs-4"><math><mi>Y</mi><mo>=</mo><mi>{{ $hasil['a'] }} + {{ $hasil['b'] }}x</mi></math></p>

        </div>
</div>
@endsection