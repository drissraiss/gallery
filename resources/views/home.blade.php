@extends('layouts.master')
@section('content')
    @for ($i = 0; $i < 20; $i++)
        <div class="col mb-2 ">
            <div class="card m-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('assets/gallery.jpg') }}">
                <div class="card-body">
                    <form action="" class="card-title">
                        <input type="text" value="Name" readonly class="input-text-custom">
                    </form>
                    <p class="card-text">2022-05-10 10:20:36</p>
                    <button class="btn btn-success"><i class="bi bi-arrows-angle-expand"></i></button>
                    <button class="btn btn-primary"><i class="bi bi-download"></i></button>
                    <a href="" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></a>
                </div>
            </div>
        </div>
    @endfor
@endsection
