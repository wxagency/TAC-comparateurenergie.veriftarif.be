

@extends('layouts.admin-layout')
@section('content')
  <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
              <div class="row">
                  
                <div class="col-md-12">
                    
                  <!--begin::Portlet-->
                  <div class="kt-portlet">
                    <div class="kt-portlet__head">
                      <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                          Update Profile
                        </h3>
                      </div>

                    </div>

                    <!--begin::Form-->
                  
                      <form class="kt-form kt-form--label-right " method="POST" action="{{route('profile.update', Auth::guard('admin')->user()->id)}}" enctype="multipart/form-data" autocomplete="off">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                      <div class="kt-portlet__body">  
                          
                          <div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-3 col-form-label">Name</label>
                              <div class="col-7">
                                  <input class="form-control" type="text" id="example-search-input" placeholder="Name" name="name" value="{{Auth::guard('admin')->user()->name}}" required="required">
                                  @if ($errors->has('name'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('name') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-3 col-form-label">Email</label>
                              <div class="col-7">
                                  <input class="form-control" type="text" id="example-search-input" placeholder="email" name="email" value="{{Auth::guard('admin')->user()->email}}" required="required">
                                  @if ($errors->has('email'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('email') }}</div>
                                  @endif
                              </div>
                          </div>
                          
                          <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-3">
                                  Enter Current Password
                              </label>
                              <div class="col-7">
                                  <input class="form-control m-input" type="password"  name="current_password"  placeholder="Enter Current Password">
                              </div>
                          </div>
                          
                          <div class="form-group kt-form__group row">
                            <label for="example-text-input" class="col-3">
                                Enter New Password
                            </label>
                            <div class="col-7">
                                <input class="form-control kt-input" type="password"  name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group kt-form__group row">
                            <label for="example-text-input" class="col-3">
                                Re-enter Password
                            </label>
                            <div class="col-7">
                                <input class="form-control kt-input" type="password"  name="password_confirmation"  placeholder="Re-Enter Password">
                                @if ($errors->has('password'))
                                <span class="text-danger">*{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div> 
                       
                      </div>

                        <div class="clearfix"></div>
                        <div class="offset-5 kt-portlet__foot kt-portlet__foot--fit ">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-success submit">
                                    Submit
                                </button>
                                <a href="{{url('admin/home')}}" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                  </div>

                  <!--end::Portlet-->
                </div>


              
              </div>
            </div>

            <!-- end:: Content -->
@endsection


