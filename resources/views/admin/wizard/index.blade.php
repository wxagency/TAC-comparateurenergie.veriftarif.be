@extends('layouts.admin-layout')

@section('title', 'Home')



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
                          Edit Wizards
                        </h3>
                      </div>
                      <div class="kt-portlet__head-tools">
                        <a href="{{route('postalcode.index')}}" class="btn btn-secondary">
                            <span>
                                <i class="fa fa-chevron-left"></i>
                                <span>
                                    Back
                                </span>
                            </span>
                        </a>
                     </div>
                    </div>

                    @if($errors->any())
<p style="color: green;">{{$errors->first()}}</p>
@endif

                    <!--begin::Form-->
                  
                      <form class="kt-form kt-form--label-right" method="POST" action="{{url('admin/update-wizard')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value ="{{$wizard->id}}"/>
                      <div class="kt-portlet__body">  
                          
                          <div class="form-group row">
                              <label for="example-search-input" class="col-2 col-form-label">Input your data (Title)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="change_title" value="{{$wizard->change_title}}" required="required">
                                  @if ($errors->has('postalcode'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('postalcode') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row ">
                              <label for="example-search-input" class="col-2 col-form-label">Input your data (Details)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="change_details" value="{{$wizard->change_details}}" required="required">
                                  @if ($errors->has('area'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('area') }}</div>
                                  @endif
                              </div>
                          </div>


                          <div class="form-group row">
                              <label for="example-search-input" class="col-2 col-form-label">More info (Title)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="sort_title" value="{{$wizard->sort_title}}" required="required">
                                  @if ($errors->has('postalcode'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('postalcode') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row ">
                              <label for="example-search-input" class="col-2 col-form-label">More info (Details)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="sort_details" value="{{$wizard->sort_details}}" required="required">
                                  @if ($errors->has('area'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('area') }}</div>
                                  @endif
                              </div>
                          </div>



                          <div class="form-group row">
                              <label for="example-search-input" class="col-2 col-form-label">Filter results (Title)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="tarief_title" value="{{$wizard->tarief_title}}" required="required">
                                  @if ($errors->has('postalcode'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('postalcode') }}</div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row ">
                              <label for="example-search-input" class="col-2 col-form-label">Filter results (Details)</label>
                              <div class="col-8">
                                  <input class="form-control" type="text" id="example-search-input"  name="tarief_details" value="{{$wizard->tarief_details}}" required="required">
                                  @if ($errors->has('area'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('area') }}</div>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row ">
                              <label for="example-search-input" class="col-2 col-form-label">Wizard</label>
                              <div class="col-8">
                                  <select class="form-control"  id="example-search-input"  name="wizard"  required="required">
                                    @if($wizard->wizard==1)
                                    <option value="1">enable</option>
                                    <option value="0">disable</option>
                                    @else
                                    <option value="0">disable</option>
                                    <option value="1">enable</option>
                                    @endif
                                  </select>
                                  @if ($errors->has('area'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('area') }}</div>
                                  @endif
                              </div>
                          </div>
                       
                      </div>


                        <div class="clearfix"></div>
                        <div class="offset-5 kt-portlet__foot kt-portlet__foot--fit ">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-success submit">
                                    Save Changes
                                </button>
                                <a href="{{route('postalcode.index')}}" class="btn btn-secondary">
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
 





