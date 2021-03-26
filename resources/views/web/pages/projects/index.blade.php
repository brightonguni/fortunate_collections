@extends('layouts.web.app')
@section('content')
  <!-- Breadcubs Area Start Here -->
   <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Projects</h3>
          <ul>
            <li>All Projects</li>
            <li>
                <a href="{{ route('web_project.index') }}">View projects</a>
            </li>
            <li>Project Categories</li>
            <li>
                <a href="{{ route('web_project_category.index') }}">View project categories</a>
            </li>
            <li>Project Sub Categories</li>
            {{-- <li>
                <a href="{{ route('web_project_sub_category.index') }}">View project sub categories</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
   </div>
   
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.projects.projects',
      [
        'stores'=>$stores,
        'products'=> $products,
        'events'=>$events,'service_categories'=>$service_categories,
        'projects' => $projects, 
        'services' => $services, 
        'blogs' =>$blogs,'blog_page'=>$blog_page,'project_page'=>$project_page,
        'faqs' => $faqs ])
        projects-table Component
      @endcomponent
    </div>
  </div>
@endsection
