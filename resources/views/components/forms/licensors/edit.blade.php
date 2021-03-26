<form class="pt-2 " data-async data-target="#edit" id="licensorForm" enctype="multipart/form-data" action="{{ route('licensors.update', ['id' => $licensor->id]) }}" novalidate
      _lpchecked="1" method="POST">
    @csrf

    <input name="_method" type="hidden" value="PUT" />

    <div class="row">
        <div class="col-md-12">

            <div class="p-0 col-md-12">
                <p>The grey background for the image previews is for display purposes</p>
            </div>
            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3">
                    <label for="name" class="col-form-label s-12">Name</label>
                    <input id="name" name="name" placeholder="{{ $licensor->name }}"
                           value="{{ $licensor->name }}"
                           maxlength="255"
                           class="form-control r-0 light s-12  @error('name') is-invalid @enderror "
                           required type="text" />
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
          

                <div class="form-group col-4 m-0 pt-3">
                    <label for="font-color" class="col-form-label d-flex s-12">Color</label>
                        <input  id="font-color" class="form-control jscolor {position:'right'} r-0 light s-12  @error('color') is-invalid @enderror" value="{{ $licensor->color }}" name="color" required>
                            @error('color')
                                <div class="invalid-feedback">
                                    {{$message }}
                                </div>
                                @enderror
                </div>




                 <div class="form-group col-4 m-0 pt-3">
                        <label for="font-color" class="col-form-label d-flex s-12">Secondary Color</label>

                              <input id="secondary-color"  class="form-control jscolor {position:'right'} r-0 light s-12  @error('secondary_color') is-invalid @enderror" value="{{ $licensor->secondary_color }}"  name="secondary_color">


                            @error('secondary_color')
                                <div class="invalid-feedback">
                                    {{$message }}
                                </div>
                                @enderror

                    
                        </div>
          

                <div class="form-group col-4 m-0 pt-3">
                        <label for="font-color" class="col-form-label d-flex s-12">Additional Color</label>

                              <input id="additional-color" class="form-control jscolor {position:'right'} r-0 light s-12  @error('additional_color') is-invalid @enderror" value="{{ $licensor->additional_color }}"  name="additional_color">


                            @error('additional_color')
                                <div class="invalid-feedback">
                                    {{$message }}
                                </div>
                                @enderror

                    
                        </div>


            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    @error('licensor_logo')
                    <div class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                    <div class="col-md-12 licensor-up pl-0">
                        <input hidden="" type="file" id="licensor_logo" name="licensor_logo">
                        <div class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="licensor-logo-up">
                            <div style="" class="dz-preview dropzone-previews"></div>
                            <div class="dz-default dz-message">
                                <div>Upload Logo Image</div>
                                <div>Click to open file browser</div>
                            </div>
                        </div>
                        <img style="background-color: #eee" class="text-center img-responsive" src="{{ Storage::url('logo') . '/'. $licensor->logo }}" />
                    </div>
                </div>
                <div class="form-group col-6">
                    @error('licensor_splash_screen')
                    <div class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                    <div class="col-md-12 pr-0 licensor-up needsclick ">
                        <input hidden type="file" id="licensor_splash_screen" name="licensor_splash_screen">
                        <div style="" class="dropzone dropzone-file-area pt-4 pb-4 dz-clickable" id="licensor-splash-screen-up">
                            <div class="dz-preview dropzone-previews"></div>
                            <div class="dz-default dz-message">
                                <div>Upload Splash Screen Image</div>
                                <div>Click to open file browser</div>
                            </div>
                        </div>
                        <img style="background-color: #eee" class="text-center" src="{{ Storage::url('splash_screen') . '/'. $licensor->splash_screen }}" />
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="material-switch">
                    <input id="link_active"
                           {{(old('link_active') || count($licensor->urls))? 'checked': '' }}
                           name="link_active"
                           type="checkbox">
                    <label for="link_active"> Do you want to add external links for radio/tickets or something else?</label>
                </div>
                <div class="form-group row col-md-12  pt-3" {{ (!old('link_active') && !count($licensor->urls)) ? 'hidden' : '' }} >

                    @if(!old('licensor_url_name') && !count($licensor->urls) )
                        @include('components.form.licensors.link_clean_partial', ['number' =>1, 'no_remove' => false] )
                    @endif

                    @if(old('licensor_url_name'))

                    @foreach(old('licensor_url_name') as $ke => $v )
                        @include('components.form.licensors.link_clean_partial', ['number' =>$ke, 'v' => $v,
                        'errors' => $errors, 'no_remove' => ($loop->first) ? false : true ])
                    @endforeach

                    @else

                    @foreach($licensor->urls as $ke => $url )
                        @include('components.form.licensors.link_partial', ['url' => $url, 'ke' =>$ke,
                         'no_remove' => ($loop->first) ? false : true])
                    @endforeach

                    @endif

                    <div style="width: 100%;" class="licensor_url_wrap">

                    </div>

                        <input id="countL" hidden
                               value="{{ (old('licensor_url_name')) ? count(old('licensor_url_name')) : count($licensor->urls)+1 }}" />

                        <div class="form-group col-md-12">

                            <button class="btn-fill-sm btn-gradient-yellow  btn-hover-bluedark" id="addLinks"><i class="fas fa-plus text-green"> </i> Add one</button>
                        </div>

                    @error('link_active')
                    <div class="invalid-feedback">
                        {{$message }}
                    </div>
                    @enderror
                </div>


            </div>

            <div class="form-row">
                <div class="form-group col-12 m-0 pt-3 ">
                    <label class="my-1 mr-2" for="active">Status</label>
                    <div class="material-switch">
                        <input id="active"
                               {{($licensor->active)? 'checked': '' }} name="active"
                               type="checkbox">
                        <label for="status"> Active</label>
                        @error('active')
                        <div class="invalid-feedback">
                            {{$message }}
                        </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
        </div>
    </div>
</form>
