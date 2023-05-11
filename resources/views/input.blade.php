@extends('layouts.layout')

@section('content') 
<div class="container1 input">
    <div class="card w-75" style="width: 18rem;"> 
        <div class="card-body p-4">
            <h1 class="card-title mb-4 text-center t-primary title">Regresi Linear</h1> 

            <form method="GET" action="{{ url('/hasil/'.$datas['input']) }}"> 
            @csrf

            <div class="row">

                <div class="col"> 
                    <h3 class="text-center mb-3 fw-bolder">X</h3> 
                    @for($i = 1; $i <= $datas['input']; $i++)
                    <div class="input-group mb-3">
                        <span class="input-group-text px-4 bg-secondary" id="basic-addon1">{{$i}}</span>
                        <input name="xinput{{$i}}" type="number" min="0" class="form-control" placeholder="Input" required>
                    </div>
                    @endfor 
                </div> 

                <div class="col"> 
                    <h3 class="text-center mb-3 fw-bolder">Y</h3> 
                    @for($i = 1; $i <= $datas['input']; $i++)
                    <div class="input-group mb-3">
                        <span class="input-group-text px-4 bg-secondary" id="basic-addon1">{{$i}}</span>
                        <input name="yinput{{$i}}" type="number" min="0" class="form-control" placeholder="Input" required>
                    </div>
                    @endfor 
                </div> 

            </div>
            
            <button type="submit" class="btn btn-primary w-100 mt-4 p-2 fw-bold fs-5">Submit</button> 

            </form>

        </div>
    </div>
</div>
@endsection