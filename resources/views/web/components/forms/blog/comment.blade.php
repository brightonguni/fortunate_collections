{{--  @include('web._partials.marketing.blog-marketing')  --}}

    <form id="createContactForm"  
      method="POST" action="{{ route('web_blog_comment.store') }}"
      novalidate
    >
      <div class="form-row">
        <div class="form-group col-12 m-0 pt-3">
          <label 
            for="name"  
            class="col-form-label s-12"
          >
            <strong>{{ Auth::User()->name}}</strong>
          </label>

          <input 
            id="first_name" 
            name="user_id" 
            value="{{ Auth::User()->id}}" 
            required type="hidden"
            class="form-control 
            r-0 light s-12  
            @if($errors->first('user_id')) 
              is-invalid  @endif"
            >
            @if($errors->any())
              <div class="invalid-feedback">
                {{$errors->first('user_id')}}
              </div>
            @endif
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-12 m-0 pt-3">
            <h2>{{ $blog->title }}</h2>
            <lable>{{ $blog->description }}</lable>
            <input 
              id="first_name" 
              name="blog_id" 
              value="{{ $blog->id}}" 
              required type="hidden"
              class="form-control 
              r-0 light s-12  
              @if($errors->first('blog_id')) 
                is-invalid  @endif"
              >
              @if($errors->any())
                <div class="invalid-feedback">
                  {{$errors->first('blog_id')}}
                </div>
              @endif
            </div>
        </div>

      <div class="form-row">
        <div class="form-group col-12 m-0 pt-3">
          <label for="description" class="col-form-label s-12"><strong>Your Comment here *</strong></label>
          <textarea 
            style="height: 145px;" 
            required class="textarea form-control  
            @if($errors->first('description')) 
              is-invalid  
            @endif r-0" 
            name="description" 
            id="summary-ckeditor" 
            cols="10" rows="9"
          >
            {{ old('description') }}
          </textarea>
          @if($errors->any())
              <div class="invalid-feedback">
                  {{$errors->first('description')}}
              </div>
          @endif
        </div>
      </div>

       <div class="row" style="padding-top: 10px;">
          <div class="col-12">
            <button 
              type="submit" 
              class="float-right 
              btn-lg gradient-orange-black 
              "
            >
              Send 
            </button>
          </div>
        </div>
    </form>
  