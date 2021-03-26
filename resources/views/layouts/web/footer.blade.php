<!-- Footer -->
<footer class="page-footer font-small">
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-md-3 mx-auto footer-heading">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Blog articles</h5>
        <ul class="list-unstyled list-group-flush">
          @foreach ($blogs->take(5) as $blog)
            <li>
               <a class="card-text card-footer-url" href="{{ route('web_blog.show',['id' => $blog->id]) }}">{{ str_limit($blog->title, '50') }}</a>
            </li>
            <li class="divider"></li>
          @endforeach
        </ul> 
      </div>
      <hr class="clearfix w-100 d-md-none">
      <!-- Grid column -->
      <div class="col-md-3 mx-auto footer-heading">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Events</h5>
        <ul class="list-unstyled list-group-flush">
          @foreach($events->take(5) as $event)
            <li>
              <a  class="card-footer-url" href="{{ route('web_event.show',['id' => $event->id]) }}">{{ $event->title }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <hr class="clearfix w-100 d-md-none">
      <div class="col-md-3 mx-auto footer-heading">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Our Services</h5>
        <ul class="list-unstyled list-group-flush">
          @foreach($services->take(3) as $service)
          <li>
            <a class="card-footer-url" href="{{ route('web_service.show',['id'=>$service->id]) }}">{{ str_limit($service->title,'50') }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-3 mx-auto footer-heading">
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Get in touch</h5>
        <ul class="list-unstyled list-group-flush">
           <li>
            <a class="card-footer-url" 
              href="{{ url('/home') }}">
              {{ 'Home' }}
            </a>
          </li>
          <li>
            <a class="card-footer-url" 
              href="{{ route('web_service.index') }}">
              {{ 'Service' }}
            </a>
          </li>
         <li>
            <a class="card-footer-url" 
              href="{{ route('web_blog.index') }}">
              {{ 'Blog'}}
            </a>
          </li>
          <li>
            <a class="card-footer-url" 
              href="{{ route('web_faq.index') }}">
              {{ 'Frequently Asked Questions - FAQs' }}
            </a>
          </li>
          <li>
            <a class="card-footer-url" 
              href="{{ route('web_product.index') }}">
              {{ 'Products' }}
            </a>
          </li>
          <li>
            <a class="card-footer-url" 
              href="{{ route('web_contact_us.index') }}">
              {{ 'Contact' }}
            </a>
          </li>
          <li>
            <a class="card-footer-url " 
              href="{{ route('web_about_us.index') }}">
              {{ 'About' }}
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Footer social media Links -->
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center">
          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg fa fa-facebook white-text mr-md-5 mr-3 fa-2x"></i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg  fa fa-instagram white-text mr-md-5 mr-3 fa-2x"></i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa fa-pinterest fa-lg white-text fa-2x"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->
  <div class="copyright text-center mb-5 pd-5">
      © Copyrights <a href="#"></a> 2020. All rights reserved. Designed by
      <a
          href="#">Guni IT Solutions
      </a>
  </div>
  <!-- Copyright -->
</footer>
