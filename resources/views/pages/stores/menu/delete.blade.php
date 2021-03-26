<div class="modal-dialog">
    <div class="modal-content">    
        <div class="modal-header">
         
            <h4  class="modal-title">Delete Menu</h4>
        </div>
        <div class="modal-body">
           
            <form class="pt-2" data-async  id="createMenuItem" action="{{route('store.deleteMenu')}}" novalidate _lpchecked="1" >
            <!-- <input type="hidden" id="_token" value="{{ csrf_token() }}"> -->
            @csrf
            <div class="row has-feedback" >
              <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-12 m-0 pt-3">
                          <p class="text-center">Are sure you want to delete this menu?</p>
                             <p class="product_id text-center alert alert-danger hidden-error"></p>
                    </div>
                      <input type="hidden" name="store_id" id="store_id" value="{{ $store->id }}">
                      <input type="hidden" name="item_id" id="item_id" value="{{ $storeMenu->id }}">
                </div>
            </div>
            </div>
           
            <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" id="closemodel" data-dismiss="modal">No</button>
            <button type="button" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark"  id="itemadd">Yes</a>
            </div>
           </button>
        </div>
        
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#closemodel').on('click', function(e){
          console.log('clicked')
          $(document).modal('hide');
          window.location.reload()
        })
        $('#itemadd').on('click', function(e){
            e.preventDefault()
          var $url = $('#createMenuItem').attr('action')
          var $data =  {
            'item_id':$('#item_id').val(),
            'store_id':$('#store_id').val(),
          }
          console.log('data', $data)
          
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

                    if(typeof result.errors.item_id !='undefined'){
                        $('.product_id.hidden-error').html(result.errors.item_id[0]).show()
                    }
                  
                }
            }
            
          })

            
        })
        function clear_errors(){
          $('.hidden-error').hide()
          $('.product_id').html('').hide()
        }

    })
</script>