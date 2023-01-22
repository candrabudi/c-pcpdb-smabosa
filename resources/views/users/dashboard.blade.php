@extends('layouts.user.app')

@section('title')
Dashboard | SMABOSA YOGYAKARTA
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('users.dashboard.header')
        <div class="row mt-4">
            @include('users.dashboard.navigation')
            @include('users.dashboard.faq')
        </div>
    </div>
</div>
@endsection