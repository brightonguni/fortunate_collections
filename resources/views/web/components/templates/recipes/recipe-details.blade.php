<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      @include('web.components.templates.recipes.partials.page.recipe-page')
      <div class="row p-2">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 p-0">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="card-image-large" style="background-image: url('{{ asset('assets/images/recipes/'.$recipe->avatar)}}')"></div>       
                  <div class="project-title text-center">
                    <h2 class="text-hover text-height"><strong>{{ $recipe->title }}</strong></h2>
                  </div>
                  <div class="card-description mb-2" style="height: 180px;">
                    <h3 class="text-hover">Ingredients</h3>
                    @if(count($recipe->ingredients) > 0)
                      @foreach($recipe->ingredients as $ingredient)
                        <ul class="list-unstyled mb-2">
                          <li class="fa fa-gear pr-2 ml-2"><span class="ml-2">{{ $ingredient->description }}</span></li>
                        </ul>
                      @endforeach
                      @else
                        <div class="container">
                         <div class="row">
                           <div class="col-12">
                             <div class="card">
                               <div class="card-body">
                                 <p>sorry no recipe ingredients supplied yet ....</p>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                    @endif
                  </div>
                  <div class="card-description mb-2">
                    <h3 class="text-hover">Method</h3>
                    @if(count($recipe->methods) > 0)
                      @foreach($recipe->methods as $method)
                      <ul class="list-unstyled mb-2">
                        <li class="fa fa-folder-o pr-2 ml-2"><span class="ml-2">{{ $method->description }}</span></li>
                      </ul>
                       @endforeach
                       @else
                       <div class="container">
                         <div class="row">
                           <div class="col-12">
                             <div class="card">
                               <div class="card-body">
                                 <p>sorry no recipe methods supplied yet ....</p>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 p-0">
            @include('web.components.templates.recipes.partials.categories')
        </div>
      </div>
    </div>
  </div>
</div>
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif

