@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Project Information</h3>
          <ul>
            <li>
                <a href="{{ route('web_project.index') }}">Home</a>
            </li>
            <li>All projects</li>
          </ul>
        </div>
      </div>
    </div>
   </div>
  <!-- Dashboard summery End Here -->
  <!-- Dashboard Content Start Here -->
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.projects.project-details',
      [
        'stores'=>$stores,
        'products'=> $products, 'service_categories'=>$service_categories, 
        'project' => $project,'blog_page'=>$blog_page,'project_page'=>$project_page,
        'projects' => $projects, 
        'services' => $services ,
        'blogs' =>$blogs,
        'faqs' => $faqs,
        'projectByCategories' => $projectByCategories
      ])
        projects-table Component
      @endcomponent
    </div>
  </div>
@endsection
