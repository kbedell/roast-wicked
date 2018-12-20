@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <a href="/recipe" class="btn btn-primary">Add a Recipe</a>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <recipe-list />
        </div>
    </div>
@endSection