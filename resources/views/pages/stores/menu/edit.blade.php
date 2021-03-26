<div class="modal-dialog">
    <div class="modal-content">    
        <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->
            <h4  class="modal-title">Edit Menu</h4>
        </div>
        <div class="modal-body">
           
            <form class="pt-2" data-async  id="createMenuItem" action="{{route('store.updateMenu')}}" novalidate _lpchecked="1" >
            <!-- <input type="hidden" id="_token" value="{{ csrf_token() }}"> -->
            @csrf
            <div class="row has-feedback">
              <div class="col-md-12">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="title" class="col-form-label s-12">Title *</label>
                    <input id="edittitle" name="title" autofocus value="{{ $storeMenu->title}}"  maxlength="50"
                        class="form-control r-0 light" type="text">
                     <p class="title text-center  alert alert-danger hidden-error"></p>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="rank" class="col-form-label s-12">Rank *</label>
                    <input id="editrank" name="rank" autofocus value="{{ $storeMenu->rank}}" class="form-control r-0 light "
                        required type="number">
                     <p class="rank text-center  alert alert-danger hidden-error"></p>
                </div>
            </div>
            <input type="hidden" name="store_id"  id="store_id" value="{{ $store->id }}">
             <input type="hidden" name="item_id"  id="item_id" value="{{ $storeMenu->id }}">
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="status">Publish</label>
                    <div class="material-switch">
                      @if( $storeMenu->active == 1 )
                        <input id="activate_status" name="active" checked="true" value="{{ $storeMenu->active}}" value="active" type="checkbox">
                      @else
                       <input id="activate_status" name="active" value="{{ $storeMenu->active}}" value="active" type="checkbox">
                      @endif
                        <label for="status">Yes</label>
                    </div>
                      <p class="status text-center  alert alert-danger hidden-error"></p>
                </div>
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
          console.log('clicked')
          $(document).modal('hide');
          window.location.reload()
        })
        $('#itemadd').on('click', function(e){
            e.preventDefault()
          var $url = $('#createMenuItem').attr('action')
          var $data =  {
            'rank':$('#editrank').val(),
            'active': $("#activate_status").is(":checked") ? 1 : 0,
            'title':$('#edittitle').val(),
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

                    // setTimeout(function () {
                    //     toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                    // }, 500);


                    if(typeof result.errors.active !='undefined'){
                        $('.status.hidden-error').html(result.errors.active[0]).show()
                    }
                    if(typeof result.errors.rank !='undefined'){
                        $('.rank.hidden-error').html(result.errors.rank[0]).show()
                    }
                    if(typeof result.errors.title !='undefined'){
                      console.log('error')
                        $('.title.hidden-error').html(result.errors.title[0]).show()
                    }
                }
            }
            
          })

            
        })
        function clear_errors(){
          $('.hidden-error').hide()
          $('.rank').html('').hide()
          $('.title').html('').hide()
          $('.status').html('').hide()
        }

    })
</script>