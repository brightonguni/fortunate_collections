@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area pb-5 mb-5">
          <h3 class="text-hover">Our Team</h3>
          <ul>
            <li>
                <a href="{{ route('web_team.index') }}">Home</a>
            </li>
            <li>Team</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
 
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.teams.teams',[
        'teams' => $teams,
        'stores'=>$stores,
        'service_categories' => $service_categories,
        'faqs' => $faqs , 'blog_page'=>$blog_page,'team_page'=>$team_page,
        'services' => $services,
        'blogs' =>$blogs, 
        'events' => $events,
        'products'=>$products ])
        Teams-table Component
      @endcomponent
    </div>
  </div>
@endsection
