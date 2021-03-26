@if($case_studies)
  <section class="section-title text-center section-margin">
    <div class="card">
      <div class="card-body">
        <h3 class="sub-title">Case <span>Studies</span></h3>    
        <div class="page-sub-title">
          <p class="page-summary">
            What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industrys
            standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
          </p> 
        </div>
      </div> 
    </div>
  </section>

  <section class="main-content">
    <div class="row">
      <div class="col-md-3 section-col">
        <section id="case-categories">
          <div class ="row">
            <div class="col-md-12">
              <ul class="list-group">
              @foreach($case_categories as $category)
                <li class="list-group-item list-flush">
                   <a href="{{ route('web_case_study.show',['id' => $category->id]) }}"> {{ $category->title }} </a>
                </li>
              @endforeach 
              </ul>
            </div>
          </div>
        </section>
        @include('web.components.templates.services.partials._service')
      </div>
      <div class="col-md-9 section-col">
        <section id="case-studies bg-light">
          <div class="container">
              @foreach($case_studies as $case)  
                  <div class="card" style="padding-top: 20px;">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                          <div class="card-image">
                            <img class="card-img-top" style="width: 100%; padding: 20px;" src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                          <div class="card-title">
                            <h2 class="sub-title">{{ str_limit($case->title,'100') }}</h2>
                          </div>
                          <div class="card-description">
                            <p>{{ str_limit($case->description,'450') }}</p>
                          </div>
                          <div class="card-category">
                             <a class="btn btn-gradient-yellow btn-sm" href="#" ><span>Category: </span><small>{{ $case->category->title }}</small></a>
                          </div>
                          <div class="card-author">
                            <h3><small><span>published by:</span>{{ $case->user->name }}</small></h3>
                          </div>
                          <div class="card-link text-right">
                            <a class="card-text text-right btn 
                              flaticon-more-button-interface-symbol-of-three-horizontal-aligned-dots 
                              btn-gradient-yellow" 
                              href="{{ route('web_case_study.show',['id' => $case->id]) }}">
                              Find Out More <span class="fa fa-angle-double-right"></span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
  @endif