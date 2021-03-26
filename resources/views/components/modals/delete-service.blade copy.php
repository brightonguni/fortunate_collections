<!-- Delete User Modal -->
<div class="modal fade" id="delete-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div id="deleteForm" class="col-md-12">
      <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="card p-0">
            <div class="card-body">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div role="alert" class="alert p-0 p-4">
                      <button type="button" class="close" id="close-btn" data-dismiss="modal" aria-label="Close"><span
                          aria-hidden="true"><i class="icon text-primary icon-close2"></i></span>
                      </button>
                      <form method="POST" action="{{ route('service.delete','id') }}">
                        <div class="text-center message-box-wrap">
                          <div class="message-error-box">
                            <div class="item-content">
                              <div class="item-icon">
                                <i class="fas fa-exclamation-circle"></i>
                              </div>
                            </div>
                          </div>
                          <h4 class="my-3">Are you sure you want to delete this Service?</h4>
                          <p>If you delete, you will permanently lose your data</p>
                          <button type="button submit" id="delete-btn" data-target-id="null"
                            class="delete_btn btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Delete</button>
                        </div>
                      </form>
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
</div>