@extends('layouts.app')

@section('content')
    <div class="continer">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Home page</h1>
            </div>
        </div>
    </div>
@endsection

{{-- if use 'Stack' in compornats need to add @push --}}
{{-- page wise using --}}
@push('css')
    <style>
        .page-title {
            padding-top:6vh ;
            font-size: 5rem;
            color: rgb(123, 122, 122);
        }
    </style>
@endpush
