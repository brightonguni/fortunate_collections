<div class="height-auto" id="index-card">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>All Frequently Asked Questions (FAQs)</h3>
      </div>
      <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
         data-toggle="dropdown" aria-expanded="false">...</a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
          <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
        </div>
      </div> 
    </div>
    <div class="table-responsive">
      <table class="table display data-table text-nowrap">
        <thead>
          <tr>
            <th>
              <div class="form-check">
                <input type="checkbox" class="form-check-input checkAll">
                <label class="form-check-label">&nbsp;</label>
              </div>
            </th>
            <th>ID</th>
            <th>Image</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Licensor</th>
            <th>Store</th>
            <th>Status</th>
            <th></th>
          </tr>
          </thead>
            <tbody>
              @foreach($faqs as  $faq)
                <tr>
                  {{--<td class="p-0"></td>--}}
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input">
                      <label class=" form-check-label">&nbsp;</label>
                    </div>
                  </td>
                  <td>{{ $faq->id }}</td>
                  <td>
                    <img 
                      style="padding-right: 15px;" 
                      src="{{URL::asset('assets/images/faqs/category/'.$faq->category->avatar)}}" 
                      alt="no image"
                    >
                  </td>
                  <td>{{ $faq->question}}</td>
                  <td>{{ str_limit($faq->answer ,'80')}}</td>
                  <td>{{ $faq->licensor->name }}</td>
                  <td>{{ $faq->store->name}}</td>
                  <td class="text-center">
                    <span>
                      <i class="fas {{(!empty($faq->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"
                      >
                      </i>
                    </span> 
                    &nbsp; 
                    <span hidden>{{ ($faq->active) }}</span>
                  </td>
                  <td>
                    @component('components.menus.faqs', ['canDo' => $canDo])
                      @slot('id')
                        {{$faq->id}}
                      @endslot
                        faq-Menu Component
                      @endcomponent
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

