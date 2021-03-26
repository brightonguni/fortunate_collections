@include('web.components.templates.products.partials.page.product-page')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col-12">
      <div class="card pt-5 pb-5">
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
              <div class="card">
                <div class="card-header">
                  @if($product->categories)
                    <ul>
                      @foreach($product->categories as $category)
                        <li class="btn btn-info">{{ $category->title }}</li>
                      @endforeach
                    </ul>
                  @endif
                </div>
                <div class="card-body text-center">
                  <div class="card-image-large" style="background-image: url('{{ asset('assets/images/products/'.$product->avatar)}}');"></div>
                    <div class="sub-categories float-left">
                      @if($product->sub_categories)
                        <ul>
                          @foreach($product->sub_categories as $sub_category)
                            <li class="btn btn-info">{{ $sub_category->title }}</li>
                          @endforeach
                        </ul>
                      @endif
                    </div>
                  <div class="product-name">
                    <p class="text-capitalize">{{ $product->name }}</p>
                  </div>
                  <div class="product-price "><h3>{{ $product->unit_price }}</h3></div>
                </div>
                <card-foot>
                  <div class="product-options">
                    <a class="btn btn-success btn-lg btn-block" href="#">Add to Cart</a>
                    <a class="btn btn-info btn-lg btn-block" href="#">Order</a>
                  </div>
                </card-foot>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="product-information text-center">
                      <h2 class="product-name text-uppercase">{{ $product->name }}</h2>
                      <p>{{ str_limit($product->description,'150') }}</p>
                    </div>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Brand</td>
                          <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                          <td>Brand Image</td>
                          <td><img class="img-responsive img-thumbnail" style="height: 50px; width: 50px;" src="{{ URL::asset('assets/images/products/brand/'.$product->brand->avatar) }}"</td>
                        </tr>
                        <tr>
                          <th></th>
                          <td>
                            <div class="accordion">
                            	<div class="card p-2">
                            		<div class="card-header"  id="infraOne"> 
                                  <a href="#{{('brand-description') }}" data-toggle="collapse" data-target="#{{('brand-description') }}" aria-expanded="false" aria-controls="{{ $product->description }}">
                                    <p class="mb-0">{{ str_limit($product->description ,'200')}}</p>
                            			</a>
                            		</div>
                                <div id="{{('brand-description') }}" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                          			<div class="card-body">
                                  <div class="faq-answer">
                                    <p>{{ $product->description }}</p>
                                  </div>
                          			</div>
                          		</div>
                            </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Colors</td>
                          <td>{{ $product->color->name }}</td>
                        </tr>
                        <tr>
                          <td>Color Image</td>
                          <td><img class="img-responsive img-thumbnail" style="height: 50px; width: 50px;" src="{{ URL::asset('assets/images/products/color/'.$product->color->avatar) }}"</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td>{{ $product->color->description }}</td>
                        </tr>
                        @if($product->stock == 0)
                        <tr>
                          <td></td>
                          <td class="bg-ash pulse-animation">{{ 'out of stock - please order' }}</td>
                        </tr>
                        @else
                          <tr>
                            <td>Available</td>
                            <td>{{ $product->stock }}</td>
                          </tr>
                        @endif
                        
                        @if($product->description)
                          <tr>
                            <td>Product Summary</td>
                            <td>
                              <div class="accordion">
                              	<div class="card p-2">
                              		<div class="card-header"  id="infraOne"> 
                                    <a href="#{{('description') }}" data-toggle="collapse" data-target="#{{('description') }}" aria-expanded="false" aria-controls="{{ $product->description }}">
                                     <h5 class="mb-1  pl-2">Click to <strong>find out more</strong></h5>
                                      <p class="mb-0">{{ str_limit($product->description ,'200')}}</p>
                              			</a>
                              		</div>
                                  <div 
                                    id="{{('description') }}" class="collapse" 
                                    aria-labelledby="infraOne" 
                                    data-parent="#accordion"
                                  >
                            			<div class="card-body">
                                    <div class="faq-answer">
                                      <p>{{ $product->description }}</p>
                                    </div>
                            			</div>
                            		</div>
                              </div>
                              </div>
                            </td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('web.components.templates.products.partials.product_by_category')
@if(count($blogs) > 0)
  @include('web._partials.blogs._blog')
@endif