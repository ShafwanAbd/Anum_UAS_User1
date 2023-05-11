@extends('layouts.layout')

@section('content')
<div class="container1 home">
    <div class="card w-25" style="width: 18rem;"> 
        <div class="card-body p-4">
            <h3 class="card-title text-center mb-4 t-primary title">Regresi Linear</h3>

            <form method="GET" action="{{ url('/input') }}">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Banyak Input:</label>
                <input name="input" type="number" value="4" min="2" class="form-control" id="exampleInputEmail1" required> 
            </div>

            <p class="card-text pt-1">Berapa banyak inputan yang diinginkan pada aplikasi regresi linear.</p>
            
            <button type="submit" class="btn btn-primary w-100 mt-4 fw-bold fs-5">Submit</button>

            </form>
        </div>
    </div>
</div>
@endsection