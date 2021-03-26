@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Services</h3>
    <ul>
      <li>
          <a href="{{ route('about_us.index') }}">Home</a>
      </li>
    </ul>
  </div>
 
  @if(session()->has('permission_error'))
    <div 
      class="alert alert-danger"
    >
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.tables.aboutus.aboutus',['aboutPage' => $aboutPage, 'canDo' => $canDo ])
        services-table Component
      @endcomponent
    </div>
  </div>
@endsection
