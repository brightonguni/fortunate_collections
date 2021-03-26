
<div class="marketing-background" style="background-image: url('{{ asset('assets/images/image_1.jpg')}}');">
    <div class="row">
      <div class="col-12 guni-marketing">
        <div class="row">
          <div class="col-md-5 col-lg-5"></div>
          <div class="marketing-wrapper col-md-7 col-lg-7">
            <h2 class="main-title">Case Studies  @Manux Kitchen</h2>
            <h2 class="sub-title">Your Mobile Kitchen Platform</h2>
            <p class="marketing-content">
              {{ str_limit('What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the 
                  industrys standard dummy text ever since the 1500s when an unknown printer took a galley of
                  type and scrambled it to make a type specimen book it has?'
              ,'300')}}
            </p>
            <ul class="marketing-events-list list-unstyled list-group list-group-flush">
              @foreach($case_studies->take(5) as $key => $case)
                <li class="marketing-icons fa fa-calendar-check">
                  {{ $case->title }}
                </li>
              @endforeach
            </ul>
            <div class="marketing-url text-left">
              <a  class="btn  btn-md btn-default marketing-url-link" href="{{ route('web_case_study.index') }}">
                Find Out More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>