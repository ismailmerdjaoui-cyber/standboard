@extends('layouts.app')

@section('title', __('messages.empty_page'))

@section('page-title', __('messages.empty'))

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('messages.pages') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.empty') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <h6 class="mb-0">{{ __('messages.empty_card') }}</h6>
                    <p class="text-muted mb-0">{{ __('messages.empty_card_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
