@extends('layouts.web.app')
@section('content')
  <div class="breadcrumbs-area pb-5 mb-5">
    <h3>Frequently Asked Questions FAQs</h3>
    <ul>
      <li>Frequently Asked Questions (FAQs)</li>
      <li>
          <a href="{{ route('web_faq.index') }}">Home</a>
      </li>
    </ul>
  </div>
  <div class="row gutters-20">
    <div class="col-12 col-xl-12 col-12-xxxl">
      @component('web.components.templates.FAQ.faq-details',['faq_page'=>$faq_page,'blog_page'=>$blog_page,'faq_categories'=>$faq_categories,'stores'=>$stores,'faq' => $faq, 'services' => $services,'blogs' =>$blogs, 'events' => $events ])
        faq-table Component
      @endcomponent
    </div>
  </div>
@endsection

