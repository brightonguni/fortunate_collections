<div class="container-fluid">
  <div class="row">
    <div class="col-12">
    @if(count($recipes) > 0)
      @foreach($recipes as $recipe)
        <a href="{{ route('web_recipe.show',['id' => $recipe->id]) }}">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-md-12 col-lg-12 text-center">
                      <img class ="recipe-image img-responsive img-thumbnail m-0 p-0 w-100"style="height: 100px; width: 100%;" 
                        src="{{ URL::asset('assets/images/recipes/'.$recipe->avatar) }}"
                         alt="{{ $recipe->avatar }}"
                      >
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-1 m-1">
                      <div class="widget-sidebar-content p-1">
                        <h3 class="recipe-name m-0 p-0 text-hover text-height"><strong><small>{{ $recipe->title }}</small></strong></h3>
                        <p class="recipe-description pb-0 text-hover text-height">
                          <small>{{ str_limit($recipe->ingredients,'100') }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      @endforeach
      <div class="row">
        <div class="col-12">
          <div class="paginations text-right">
            <div class="row">
              <div class="col-12 text-right">
                 <p style="padding: 10px;"> {{ $recipes->links() }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    </div>
  </div>
</div>