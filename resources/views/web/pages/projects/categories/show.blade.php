@extends('layouts.web.app')
@section('content')
  <div class="container pt-5 mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="breadcrumbs-area">
          <h3>Project Category Details</h3>
          <ul>
            <li>
                <a href="{{ route('web_project_category.index') }}">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.projects.categories.category-details',
      ['stores'=>$stores,
      'products' =>$products,
      'projectByCategories' =>$projectByCategories,
      'categories' =>$categories,'service_categories'=>$service_categories,
      'events' => $events,'category' => $category,'project_page'=>$project_page,
      'blogs' => $blogs,'blog_page'=>$blog_page,'project_page'=>$project_page,
      'services' =>$services,
      'faqs' =>$faqs, ])
       product category-table Component
      @endcomponent
    </div>
  </div>
@endsection
