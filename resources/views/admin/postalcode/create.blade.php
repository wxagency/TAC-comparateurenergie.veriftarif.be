@extends('layouts.admin-layout')

@section('title', 'Postal Code')



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
                          Postal Code - {{$id}}
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

                    <!--begin::Form-->
                  
                      <form class="kt-form kt-form--label-right" method="POST" action="{{route('postalcode.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                      <div class="kt-portlet__body">  
                          
                          <!--<div class="form-group row {{ $errors->has('postalcode') ? ' has-danger' : '' }}">-->
                          <!--    <label for="example-search-input" class="col-2 col-form-label">Postal Code</label>-->
                          <!--    <div class="col-8">-->
                          <!--        <input class="form-control" type="text" id="example-search-input" placeholder="postal code" name="postalcode" value="{{ old('postalcode') }}" required="required">-->
                          <!--        @if ($errors->has('postalcode'))-->
                          <!--        <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('postalcode') }}</div>-->
                          <!--        @endif-->
                          <!--    </div>-->
                          <!--</div>-->
                          <div class="form-group row {{ $errors->has('area') ? ' has-danger' : '' }}">
                              <label for="example-search-input" class="col-2 col-form-label">Municipality</label>
                              <div class="col-8">
                                  @foreach($municipality as $subpostal)
                                      <input class="form-control" type="text" id="example-search-input"  name="area" value="{{$subpostal}}" required="required">
                                      
                                  @endforeach
                              </div>
                          </div>
                       
                      </div>

                        <div class="clearfix"></div>
                        <!--<div class="offset-5 kt-portlet__foot kt-portlet__foot--fit ">-->
                        <!--    <div class="kt-form__actions">-->
                        <!--        <button type="submit" class="btn btn-success submit">-->
                        <!--            Submit-->
                        <!--        </button>-->
                        <!--        <a href="{{route('postalcode.index')}}" class="btn btn-secondary">-->
                        <!--            Back-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </form>
                  </div>

                  <!--end::Portlet-->
                </div>


              
              </div>
            </div>

            <!-- end:: Content -->

  @endsection
 




