@extends('layouts.app')

@section('title', 'Empty Page')

@section('page-title', 'Empty')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page">Empty</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <h6 class="mb-0">Empty Card</h6>
                    <p class="text-muted mb-0">Use this card as a blank canvas for new sections.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
