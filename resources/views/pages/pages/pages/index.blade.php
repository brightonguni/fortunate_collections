@extends('layouts.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="breadcrumbs-area">
    <h3>Pages</h3>
    <ul>
      <li>
          <a href="{{ route('page.index') }}">Home</a>
      </li>
    </ul>
  </div>
  @if(session()->has('permission_error'))
    <div class="alert alert-danger">
      {{ session()->get('permission_error') }}
    </div>
  @endif
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('components.tables.pages.pages',['pages' => $pages, 'stores' => $stores, 'licensors' => $licensors,'canDo' => $canDo ])
        page-table Component
      @endcomponent
    </div>
  </div>
@endsection
