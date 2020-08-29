@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div >
                <div class="card">
                    <div class="card-header bg-success text-white ">
                        <strong>Search for Products </strong>
                    </div>
                    <div class="card-body">
                        @livewire('search')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
