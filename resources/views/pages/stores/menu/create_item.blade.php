<div class="modal-dialog">
    <div class="modal-content">    
        <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
            <h4  class="modal-title">Add a new Menu Item</h4>
        </div>
        <div class="modal-body">
           
            <form class="pt-2" data-async  id="createMenuItem" action="{{route('store.storeMenuItem')}}" novalidate _lpchecked="1" >
            <!-- <input type="hidden" id="_token" value="{{ csrf_token() }}"> -->
            @csrf
            <div class="row has-feedback">
              <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                           <div class="form-group">
                                <select class="form-control" name="product_id" id="product_id">
                                  <option value="">Select Product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->description}}</option>
                                    @endforeach

                                </select>
                            </div>
                             <p class="product_id text-center alert alert-danger hidden-error"></p>
                    </div>
                  
                        <div class="form-group col-12 m-0 pt-3">
                           <div class="form-group">
                            <label for="stock" class="col-form-label s-12">Stock *</label>
                            <input id="stock"  min="0" name="stock" autofocus placeholder="{{'Stock'}}" maxlength="50"
                                class="form-control r-0 light " required type="number">
                          
                             <p class="stock text-center  alert alert-danger hidden-error"></p>
                           </div>
                        </div>
                    
                        <div class="form-group col-12 m-0 pt-3 ">
                           <div class="form-group">
                            <label class="my-1 mr-2" for="status">Publish</label>
                            <div class="material-switch">
                                <input id="activate_status" name="status" type="checkbox">
                                <label for="status">Yes</label>
                            </div>
                            <p class="status text-center  alert alert-danger hidden-error"></p>
                          </div>
                        </div>
                    <input type="hidden" name="menu_id" id="menu_id" value="{{ $storeMenu->id }}">
                      <input type="hidden" name="store_id" id="store_id" value="{{ $store->id }}">
                </div>
            </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" id="closemodel" data-dismiss="modal">Cancel</button>
            <button type="button" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark"  id="itemadd">Save</a>
            </div>
           </button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#closemodel').on('click', function(e){
          // $(document).modal('hide');
          window.location.reload()
        })
        $('#itemadd').on('click', function(e){
            e.preventDefault()
          var $url = $('#createMenuItem').attr('action')
          var $data =  {
            'product_id':$('#product_id').val(),
            'active': $("#activate_status").is(":checked") ? 1 : 0,
            'stock':$('#stock').val(),
            'menu_id':$('#menu_id').val(),
            'store_id':$('#store_id').val(),
          }
          console.log('data', $data, $url)
          
          clear_errors()
          $.ajax({
            url: $url,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data:$data,
            dataType:'json',
            success: function(result){
                console.log('result', result)
                if(result.status){
                  
                    window.location.href = result.url
                }else{

                    // setTimeout(function () {
                    //     toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                    // }, 500);


                    if(typeof result.errors.active !='undefined'){
                        $('.status.hidden-error').html(result.errors.active[0]).show()
                    }
                    if(typeof result.errors.product_id !='undefined'){
                        $('.product_id.hidden-error').html(result.errors.product_id[0]).show()
                    }
                    if(typeof result.errors.stock !='undefined'){
                      console.log('error')
                        $('.stock.hidden-error').html(result.errors.stock[0]).show()
                    }
                }
            }
            
          })

            
        })
        function clear_errors(){
          $('.hidden-error').hide()
          $('.product_id').html('').hide()
          $('.stock').html('').hide()
          $('.status').html('').hide()
        }

    })
</script>