@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => 'Home'])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center align-items-center">
      <div class="col">
        {{-- <h1 class="text-white text-center">{{ __('Home') }}</h1> --}}
        <img src="/assets/images/logo_full.png" style="filter: drop-shadow(1px 1px 4px white); max-width: 100%;" >
      </div>
  </div>
</div>
@endsection
