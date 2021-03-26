@extends('layouts.web.app')
@section('content')
   <div class="container p-5 m-5">
     <div class="row">
       <div class="col-12">
        <div class="about pt-2">
          @include('web._partials.about.about')
        </div>
        <div class="services pt-2 bg-ash">
          @include('web._partials.services._services')
        </div>

        <div class="products pt-2">
          @include('web._partials.products._products')
        </div>

        <div class="projects pt-2 bg-aqua">
          @include('web._partials.projects.projects')
        </div>

        <div class="packages pt-2 bg-aqua">
          @include('web._partials.prockages.packages')
        </div>

        {{-- <div class="our-videos" style="padding-top: 40px;">
          @include('web._partials.videos.videos')
        </div>
         --}}
        <div class="faq pt-2">
          @include('web._partials.FAQ._faq')
        </div>

        <div class="blog pt-2">
           @include('web._partials.blogs._blog')
        </div>
       </div>
     </div>
   </div>
   

 
@endsection
