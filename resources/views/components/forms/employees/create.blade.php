      <form 
        class="pt-2"  
        id="createUserProfileForm" 
        action="{{route('employees.store')}}"  
        method="POST"
      >
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3">
                <label for="email"  class="col-form-label s-12">
                  Email
                </label>
                <input 
                  id="email" 
                  name="email" 
                  autofocus 
                  placeholder="Enter Email Address"
                  value="{{ old('email') }}" 
                  maxlength="191"  
                  required type="email"
                  class="form-control r-0 light s-12  
                  @if($errors->first('email')) 
                    is-invalid  
                  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
                @endif
              </div>
            </div>
              <div class="form-row">
                <div class="form-group col-6 m-0 pt-3">
                  <label 
                    for="first_name" 
                    class="col-form-label s-12"
                  >
                    First Name
                  </label>
                  <input 
                    id="first_name" 
                    name="first_name" 
                    placeholder="Enter First Name"
                    value="{{ old('first_name') }}" 
                    maxlength="50" 
                    required 
                    type="text"
                    class="form-control r-0 light s-12  
                    @if($errors->first('first_name'))
                      is-invalid  
                    @endif"
                  >
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('first_name')}}
                    </div>
                  @endif
                </div>
              <div class="form-group col-6 m-0 pt-3">
                <label  
                  for="last_name" 
                  class="col-form-label s-12 "
                >
                  Last Name
                </label>
                <input 
                  id="last_name" 
                  name="last_name" 
                  placeholder="Enter Last Name" 
                  value="{{ old('last_name')}}"
                  maxlength="50" 
                  required type="text"
                  class="form-control r-0 light s-12 
                  @if($errors->first('last_name')) 
                    'is-invalid'  
                  @endif"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                      {{$errors->first('last_name')}}
                  </div>
                @endif
              </div>
            </div>
            <div class="form-row mt-1">
              <div class="form-group col-6 m-0 pt-3">
                <label 
                  for="phone" 
                  class="col-form-label s-12"
                >
                  Phone Number
                </label>
                <input 
                  id="phone" 
                  placeholder=" Enter Phone Number (phone starts with 0)"
                  value="{{ old('phone')}}"  
                  name="phone"  
                  required
                  class="form-control r-0 light s-12  
                  @if($errors->first('phone')) 
                    'is-invalid'  
                  @endif"
                  type="tel"
                >
                @if($errors->any())
                  <div class="invalid-feedback">
                    {{$errors->first('phone')}}
                  </div>
                @endif
              </div>
              <div class="form-group col-6 m-0 pt-3">
                <label 
                  class="my-1 mr-2" 
                  for="role_id"
                >
                  Role 
                </label>
                <select 
                  required 
                  name="role_id" 
                  class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="role_id"
                >
                  @foreach($roles as $role)
                    <option value="{{$role->id}}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            {{--  <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="job_title_id" 
                  class="col-form-label s-12"
                >
                  Select Job Title (what is your job title, eg:- Developer, Project Manager))
                </label>
                <select name="job_title_id" required class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="job_title_id"
                >
                @if($job_titles)
                  @foreach($job_titles as $job_title)
                    <option value="{{$job_title->id}}">{{ $job_title->name }}</option>
                  @endforeach
                  @endif
                </select>
              </div>
            </div>  --}}
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="contract_id" 
                  class="col-form-label s-12"
                >
                  Select Contract 
                </label>
                <select 
                  name="contract_id" 
                  required 
                  class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="contract_id"
                >
                  @foreach($contracts as $contract)
                    <option value="{{$contract->id}}">{{ $contract->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label for="contract_type_id" class="col-form-label s-12">
                  Select Contract Type (a contract can be permanent,temporary, Contract, fixed etc)
                </label>
                <select name="contract_type_id" required 
                  class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="contract_type_id"
                >
                  @foreach($contractTypes as $contractType)
                    <option value="{{$contractType->id}}">{{ $contractType->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-row mt-1">
                <div class="form-group col-md-7 m-0 pt-3">
                  <label 
                    for="Skill_id" 
                    class="col-form-label s-12"
                  >
                    Select your Skills
                  </label>
                  <select 
                    name="skill_id" 
                    required 
                    class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                    id="skill_id"
                  >
                  @if($skills)
                      @foreach($skills as $skill)
                        <option value="{{$skill->id}}">{{ $skill->name }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-5 m-0 pt-3">
                   <label 
                    for="skill_duration" 
                    class="col-form-label s-12"
                  >
                    Years(Commercial yrs)Exprience
                  </label>
                  <select name="skill_duration" required 
                    class="custom-select my-1 mr-sm-2 form-control r-0 light s-12">
                    <?php for ($i = 1; $i <= 50; $i++) : ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                  </select>
                  @if($errors->any())
                    <div class="invalid-feedback">
                      {{$errors->first('skill_duration')}}
                    </div>
                  @endif
              </div>
            </div>
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label for="licensor_id" class="col-form-label s-12">
                  Select Licensor
                </label>
                <select name="licensor_id" required class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="licensor_id"
                >
                  @foreach($licensors as $licensor)
                    <option value="{{$licensor->id}}">{{ $licensor->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
            <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="project_id" 
                  class="col-form-label s-12"
                >
                  Select Project Assigned
                </label>
                <select 
                  name="project_id" 
                  required 
                  class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="project_id"
                >
                  @foreach($projects as $project)
                    <option value="{{$project->id}}">{{ $project->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-row mt-1">
              <div class="form-group col-12 m-0 pt-3">
                <label 
                  for="department_id" 
                  class="col-form-label s-12"
                >
                  Select Department
                </label>
                <select 
                  name="department_id" 
                  required 
                  class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" 
                  id="department_id"
                >
                  @foreach($departments as $department)
                    <option value="{{$department->id}}">{{ $department->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-12 m-0 pt-3 ">
                <label 
                  class="my-1 mr-2" 
                  for="active"
                >
                  Publish
                </label>
                <div class="material-switch">
                  <input 
                    id="active" 
                    name="active" 
                    type="checkbox"
                  >
                  <label for="active">Yes</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
      <div class="col-12">
        <button 
          type="submit" 
          class="float-right btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
        >
          Save
        </button>
      </div>
    </div>
  </form>
