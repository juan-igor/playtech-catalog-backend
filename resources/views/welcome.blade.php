@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => 'Home'])

@section('content')
<div class="container" style="height: auto; align-items: stretch; display: flex;">
  <div class="row justify-content-center align-items-center w-100">
      <div class="col" style="text-align: center;">
        <img src="/assets/images/logo_full.png" style="filter: drop-shadow(1px 1px 4px white); max-width: 700px; width: 100%;" >
      </div>
  </div>
</div>
@endsection
