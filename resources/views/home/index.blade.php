<!DOCTYPE html>
@include('home.includes.header')



<!--end modal style-->
<div id="tac-data"> 
    <div class="container-fluid header-text-content" style="background-image: url('/images/banner_bg.jpg'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="header">
                        <div class="content text-center">
                          @php
                         $param=Session::get('getParameters');
                            $string = trans("home.sort_page");
                            $replace = ['{X1}','{X2}','{X3}'];
                            if($param['parameters']['values']['comparison_type']=='pack'){
                            $x1=trans("home.dual_fuel");
                            }elseif($param['parameters']['values']['comparison_type']=='electricity'){
                            $x1=trans("home.Electricity");
                            }elseif($param['parameters']['values']['comparison_type']=='gas'){
                            $x1=trans("home.Gas");
                            }
                            $month=date("F");
                            if($month=='January'){
                            $x2=trans("home.1");
                            }
                            if($month=='February'){
                            $x2=trans("home.2");
                            }
                            if($month=='March'){
                            $x2=trans("home.3");
                            }
                            if($month=='April'){
                            $x2=trans("home.4");
                            }
                            if($month=='May'){
                            $x2=trans("home.5");
                            }
                            if($month=='June'){
                            $x2=trans("home.6");
                            }
                            if($month=='July'){
                            $x2=trans("home.7");
                            }
                            if($month=='August'){
                            $x2=trans("home.8");
                            }
                            if($month=='September'){
                            $x2=trans("home.9");
                            }
                            if($month=='October'){
                            $x2=trans("home.10");
                            }
                            if($month=='November'){
                            $x2=trans("home.11");
                            }
                            if($month=='December'){
                            $x2=trans("home.12");
                            }
                            $x3=date("Y");
                            $info = [
                            'X1' => $x1,
                            'X2'  => $x2,
                            'X3'   => $x3,
                            ];
                          @endphp
                            <h3>@lang('home.Kies_hieronder')<br>{{str_replace($replace, $info, $string)}}<br>
                          @php
                            $string1 = trans("home.sort_banner");
                            $replace1 = ['{X4}'];
                            $info1 = [
                            'X4' => '450',
                            ];
                          @endphp
                            <span class="banner-text-1">{{str_replace($replace1, $info1, $string1)}}</span><br>
                          @php
                          $customer_type=Session::get('customer_type');
                            $string2 = trans("home.sort_banner_last");
                            $replace2 = ['{X5}','{X6}'];
                            if($customer_type =='residential'){
                            $x6= trans("home.x6_res");
                            $x5= trans("home.x5_res");
                            } else{
                            $x6= trans("home.x6_pro");
                            $x5= trans("home.x5_pro");
                            }
                            $info2 = [
                            'X5' => $x5,
                            'X6'  => $x6,                              
                            ];
                          @endphp
                        <span class="banner-text-2">{{str_replace($replace2, $info2, $string2)}}</span>
                        </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2">
        <div class="container" id="main-data">
            <div class="row sec-2">
                @include('home.includes.sidebar')
                <input type="hidden" value="{{$po}}" id="po" >
                <div class="col-md-9 col-lg-9 col-sm-9 right-sec">
                    <div id="seperated" style="display:none;">
                        <div class="row head-1">
                            <div class="col-md-3 col-3 electricity electric_tab" id="elec_tab" style="cursor: pointer;">
                                <h5><i class="fa fa-bolt"></i> @lang('home.Electricity') <span class="ele-no ">{{Session::get('elec_count')}}</span></h5>
                            </div>
                            <div class="col-md-3 col-3  gas gas_tab" id="gas_tab" style="cursor: pointer;">
                                <h5><i class="fa fa-fire"></i> @lang('home.Gas') <span class="gas-no ">{{Session::get('gas_count')}}</span></h5>
                            </div>
                            <div class="col-md-5 text-right seperate-popup button-sec-2">
                                  <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal12"><i class="fa fa-envelope"></i> @lang('home.Email_me')</button>
                                    <div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">@lang('home.Email_me')</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                      <p class="modal-p">
                                      @lang('home.Please_enter')
                                      </p>
                                          <form method="POST" action="{{route('send-deals')}}" enctype="multipart/form-data">
                                          {{csrf_field()}}
                                          <div class="modal-body">

                                          <div class="form-group">
                                          <label for="recipient-name" class="col-form-label"> @lang('home.Email_Address')</label>
                                          <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="{{ old('recipient') }}" required="required">
                                          
                                          </div>
                                            <p class="error_email" id="error_email" style="color: red;"></p>
                                          </div>

                                          <div class="checkbox-sec">
                                          <label class="container-1">
                                          <input aria-label="send deals" type="checkbox">
                                          <span class="checkmark"></span>
                                          </label>
                                          <p>@lang('home.I_would_like')</p>
                                          </div>
                                          <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary" name="submit" id="send">@lang('home.Send')</button>
                                          </div>
                                          </form>
                                          <p class="text-center footer-p">@lang('home.We_never_give')</p>
                                          </div>
                                        </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sec-hide" style="margin-bottom: 15px;">
                        <div class="col-md-8">
                            <div class="sec-hide">
                                @if($getParameters['parameters']['values']['comparison_type']=='gas')
                                 <h3><span class="tot_count">{{$totalProducts}}</span> @lang('home.Deals_gas')</h3>
                                @elseif($getParameters['parameters']['values']['comparison_type']=='electricity')
                                 <h3><span class="tot_count">{{$totalProducts}}</span> @lang('home.Deals_elec')</h3>
                                @else
                                
                                 <h3><span class="tot_count">{{$totalProducts}}</span> @lang('home.Deals')</h3>
                                @endif
                             
                              <input type="hidden" id="totalPages"  value="{{$totalPages}}" />
                              <input type="hidden" id="currentPage" value="{{$currentPage}}" />
                              <input type="hidden" id="TPage" value="{{$totalProducts}}" />
                            </div>
                            <div class=" second-sec sec-show" style="display: none;">
                              <div class=" second-sec-left">
                                <p class="electricity-title" style="display:none">@lang('home.Please_select')</p>
                                <p class="gas-title" style="display:none" >@lang('home.Please_select')</p>
                              </div>
                            </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="second-sec-right text-right sec-show bunddle-sec" style="display: none;">
                          <div class="dropdown-sort">
                            <p><b>@lang('home.SORT_BY')</b>
                              <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                <option value="high">@lang('home.Low_To_High')</option>
                                <option value="low">@lang('home.High_To_Low')</option>
                                <option value="most" >@lang('home.Most_chosen')</option>
                                
                               
                              </select>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 button-sec-2 pack-popup text-right sec-hide">
                          <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope"></i> @lang('home.Email_me')</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('home.Email_me')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                <p class="modal-p">
                                @lang('home.Please_enter')
                                </p>
                                  <form method="POST" action="{{route('send-deals')}}" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                  <div class="modal-body">
                                  <div class="form-group {{ $errors->has('recipient') ? ' has-danger' : '' }}">
                                  <label for="recipient-name" class="col-form-label" id="email-label"> @lang('home.Email_Address')</label>
                                  <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="{{ old('recipient') }}" required="required">
                                  
                                  </div>
                                  <p class="error_email" id="error_email" style="color: red;"></p>
                                  </div>
                                  <div class="checkbox-sec">
                                  <label class="container-1">
                                  <input aria-label="send deals" type="checkbox">
                                  <span class="checkmark"></span>
                                  </label>
                                  <p>@lang('home.I_would_like')</p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" name="submit" id="send">@lang('home.Send')</button>
                                  </div>
                                  </form>
                                   <p class="text-center footer-p">@lang('home.We_never_give')</p>
                                 </div>
                                </div>
                            </div>
                          </div>
                       <!--  <div class="col-md-5 col-sm-3 col-lg-6 second-sec-right text-right sec-show">
                            <div class="dropdown-sort">
                              <p><b>{{strtoupper(trans('home.SORT_BY'))}}</b>
                                <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                  <option value="">@lang('home.Choose')</option>
                                  <option value="low">@lang('home.High_To_Low')</option>
                                  <option value="high">@lang('home.Low_To_High')</option>
                                </select>
                                </p>
                            </div>
                        </div> -->
                        </div>
                      </div>
                      </div>
                    <div class="row sec-show second-ele-gas" style="display: none;">
                        <div class="col-md-8">
                          <div class="sec-hide">
                            <h3>@lang('home.Found') <span class="tot_count">{{$totalProducts}}</span> @lang('home.Deals_gas')</h3>
                            <input type="hidden" id="totalPages"  value="{{$totalPages}}" />
                            <input type="hidden" id="currentPage" value="{{$currentPage}}" />
                            <input type="hidden" id="TPage" value="{{$totalProducts}}" />
                          </div>
                          <div class=" second-sec sec-show" style="display: none;">
                            <div class=" second-sec-left">
                              <div id="pro-select"></div>
                              <p class="electricity-title" style="display:none">@lang('home.Please_select')</p>
                              <p class="gas-title" style="display:none" >@lang('home.Please_select')</p>
                            </div>
                          </div>
                        </div> 
                    <div class="col-md-4">
                    <div class="second-sec-right text-right sec-show bunddle-sec" style="display: none;">
                            <div class="dropdown-sort dropdown-sort-2 ">
                                <p><b>@lang('home.SORT_BY')</b>
                                    <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                        <option value="high">@lang('home.Low_To_High')</option>
                                        <option value="low">@lang('home.High_To_Low')</option>
                                        <option value="most" >@lang('home.Most_chosen')</option>
                                         
                                        
                                    </select>
                                </p>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-sec-2 text-right sec-hide">
                            <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope"></i> @lang('home.Email_me')</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">@lang('home.Email_me')</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                  <p class="modal-p">
                                  @lang('home.Please_enter')
                                  </p>
                                      <form method="POST" action="{{route('send-deals')}}" enctype="multipart/form-data">
                                      {{csrf_field()}}
                                      <div class="modal-body">

                                      <div class="form-group">
                                      <label for="recipient-name" class="col-form-label"> @lang('home.Email_Address')</label>
                                      <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="{{ old('recipient') }}" required="required">
                                      
                                      </div>
                                        <p class="error_email" id="error_email" style="color: red;"></p>
                                      </div>

                                      <div class="checkbox-sec">
                                      <label class="container-1">
                                      <input aria-label="send deals" type="checkbox">
                                      <span class="checkmark"></span>
                                      </label>
                                      <p>@lang('home.I_would_like')</p>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="submit" id="send">@lang('home.Send')</button>
                                      </div>
                                      </form>
                                      <p class="text-center footer-p">@lang('home.We_never_give')</p>
                                      </div>
                                    </div>
                              </div>
                        </div>
                        <!-- <div class="col-md-5 col-sm-3 col-lg-6 second-sec-right text-right sec-hide">
                            <div class="dropdown-sort">
                                <p><b>{{strtoupper(trans('home.SORT_BY'))}}</b>
                                    <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                        <option value="">@lang('home.Choose')</option>
                                        <option value="low">@lang('home.High_To_Low')</option>
                                        <option value="high">@lang('home.Low_To_High')</option>
                                    </select>
                                </p>
                            </div>
                        </div> -->
                    </div>
                    </div>
                    </div>
                    @php $getParameters=Session::get('getParameters');   @endphp
                     
                    <div class="row second-sec sec-hide">
                        <div class="col-md-8 col-sm-3 second-sec-left">  
                            @if($getParameters['parameters']['values']['comparison_type']=='gas')
                            
                             <p class="gas-title" >@lang('home.now_please_select_plan_for_gas')</p>
                            @else                            
                             <p>@lang('home.do_not_wait_reuests')</p>                             
                            @endif
                        </div>   
                        <div class="col-md-4 text-right" style="padding-right: 0;">
                          <div class="dropdown-sort">
                                <!--<p><b>{{strtoupper(trans('home.SORT_BY'))}}</b>-->
                                <p><b>{{ucfirst(trans('home.SORT_BY'))}} :</b>
                                    <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                          <option value="high">@lang('home.Low_To_High')</option>
                                        <option value="low">@lang('home.High_To_Low')</option>
                                        <option value="most" >@lang('home.Most_chosen')</option>
                                        
                                    </select>
                                </p>
                            </div>
                        </div>                
                    </div>
                    
                  
                    @php 



Session::put('uuid',$getParameters['parameters']['uuid']);
Session::put('customer_group',$getParameters['parameters']['values']['customer_group']);
Session::put('region',$getParameters['parameters']['values']['region']);
Session::put('usage_single',$getParameters['parameters']['values']['usage_single']);
Session::put('usage_day',$getParameters['parameters']['values']['usage_day']);
Session::put('usage_night',$getParameters['parameters']['values']['usage_night']);
Session::put('usage_excl_night',$getParameters['parameters']['values']['usage_excl_night']);
Session::put('usage_gas',$getParameters['parameters']['values']['usage_gas']);
Session::put('meter_type',$getParameters['parameters']['values']['meter_type']);
Session::put('comparison_type',$getParameters['parameters']['values']['comparison_type']);
                    @endphp
                    <div id="packages">   
                        @php $gas="0"; $elec="0"; $si="0"; $totalProducts=$totalProducts;
                          $postal_code=$getParameters['parameters']['values']['postal_code'];
                        @endphp                      
                          @foreach($products as $getdetails)
                              @php  $si++; 



                              @endphp
                              <!-- Start of listing-1 -->
                              {!! \View::make('elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code','si','packType','feature','min','service'))->render() !!}
                              <!-- End of listing-1 -->
                          @endforeach   
                    </div>
                      <div class="row load-more" id="hideload">
                        <div class="col-md-12 load-more-sec">                           
                            <a href="#" id="loadMore" >@lang('home.load_more_deals')...</a>
                                <button class="btn btn-primary load-more-sec more-loader" type="button" disabled style="display:none;">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                @lang('home.load_more_deals')...
                                </button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<div class="slide-up">
        <div id="comp-items">
                    <div class="compare-sec" style="display:none;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 sec-part-1">
                                  <span class="com-button">
                                  @lang('home.Compare_plans') <i class="fa fa-chevron-up"></i>
                                  </span>
                                </div>
                                <div class="col-md-3 sec-part-2">
                                  <div class="selected-span">
                                    <span>@lang('home.select') "@lang('home.Compare')" @lang('home.above')</span>	
                                  </div>
                                </div>
                                <div class="col-md-3 sec-part-3">
                                  <div class="selected-span">
                                    <span>@lang('home.select') "@lang('home.Compare')" @lang('home.above')</span>	
                                  </div>
                                </div>
                                <div class="col-md-3 sec-part-4">
                                  <div class="selected-span">
                                  <span>@lang('home.select') "@lang('home.Compare')" @lang('home.above')</span>	
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          <div class="slide-sec" id="slide-sec">
      </div>
</div>


    <!--loading-->

<div id="loading" style="display:none;">
        <div class="animation-sec"  >
            <div class="container">
                <div class="row">
                    <div class="col-md-3 data-col">
                        <div class="data-sec">
                            <h2>@lang('home.Your_Data')</h2>
                           <div class="type">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span>
                    <p>Type</p>
                    <h6 style="text-transform: capitalize">@if($getParameters['parameters']['values']['customer_group']=='residential') @lang('home.residential') @else @lang('home.Professional') @endif</h6>
                </span>
            </div>
            <div class="type">
                <span class="icon"><i class="fa fa-map-marker-alt"></i></span>
                <span>
                    <p>@lang('home.Postal_Code')</p>
                    <h6>{{$getParameters['parameters']['values']['postal_code']}}</h6>
                </span>
            </div>
            @if($getParameters['parameters']['values']['usage_single']>0)
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span>
                    <p>@lang('home.Electricity')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_single'])}}</strong> <span class="light-font"> kWh @lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
            @if($getParameters['parameters']['values']['usage_day']>0)
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span>
                    <p>@lang('home.Electricity') @lang('home.day')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_day'])}}</strong> <span class="light-font"> kWh @lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
             @if($getParameters['parameters']['values']['usage_night']>0)
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span>
                    <p>@lang('home.Electricity') @lang('home.night')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_night'])}}</strong> <span class="light-font"> kWh @lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
            @if($getParameters['parameters']['values']['usage_excl_night']>0)
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span>
                    <p>@lang('home.Electricity') @lang('home.excl_night')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_excl_night'])}}</strong> <span class="light-font"> kWh @lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
            @if($getParameters['parameters']['values']['usage_gas']>0)
            <div class="type">
                <span class="icon"><i class="fas fa-fire"></i></span>
                <span>
                    <p>@lang('home.Gas')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_gas'])}}</strong> <span class="light-font">kWh @lang('home.Year')</span> </h6>
                </span>
            </div>
            @endif
                            <div class="button-change">
                                <span class="change-sec-btn">@lang('home.change')</span>
                            </div>
                        </div>

                        <div class="animation-1">
                            <div id="container">
                                <div id="seven"></div>
                                <div id="seven" class="seven"></div>
                                <div id="four"></div>
                                <div id="six"></div>
                                <div id="five"></div>
                                <div id="nine"></div>
                                <div id="ten"></div>
                                <div id="eleven"></div>
                                <div id="twelve"></div>
                                <div id="thirteen"></div>
                                <div id="fourteen"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 ani-sec">
                        <h4>@lang('home.loading_text')</h4>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
</div>
    <!--loading end-->

   

  @php $arr=Session::get('select-pro');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
Session::put('urls',$actual_link);

  @endphp
  

    @include('home.includes.footer')

  </div>

   <script type="text/javascript">
   
    // modal show

    $(document).ready(function() {
        $("#squarespaceModal").modal('show');
    }); 

    $(document).on('click','#orlando-field-submit', function(e) {
        e.preventDefault()
        var email = $('#orlando-field-email').val();
        $.ajax({
            url: '{{url("modal-data/")}}',
            type: "GET",
            data: {
               "email" : email,
            },
            success: function(data) {
                console.log(data);
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });

    // end modal
    
    $('#month').click(function() {
        $('.month').addClass("active");
        $('.years').removeClass("active");
        $('.month').css('display', 'block');
        $('.years').css('display', 'none');
    });

    $('#years').click(function() {
        $('.years').addClass("active");
        $('.month').removeClass("active");
        $('.years').css('display', 'block');
        $('.month').css('display', 'none');
    });
    
    $('.radiobtn2-show').hide();
    $(document).ready(function() {
      $('.radiobtn1').on('click', function() {
        $('.radiobtn2-show').hide();
        $('.radiobtn1-show').slideToggle();
      });
      $('.radiobtn2').on('click', function() {
        $('.radiobtn1-show').hide();
        $('.radiobtn2-show').slideToggle();
      });
    });
   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
				}
	 });  
    
  function loadMoreData(nextPage){
        //   console.log(nextPage);
          var packtype=$('.load-type').val(); 
          $("#loadMore").hide();
          $(".more-loader").show();

          $.post('{{route('loadmore')}}',{'page':nextPage,'packType':packtype},function(response){
            if(response.status == 'success') {
                  $('#packages').append(response.html);
                  $('#currentPage').val(parseInt($('#currentPage').val()) + 1);
                  $(".more-loader").hide();
                  $("#loadMore").show();
            }
          },'json')
    }
 
  
      // Load more content with jQuery
    $(function () {
        $(".pagemore").slice(0, 4).show();
            $("#loadMore").on('click', function (e) {
                e.preventDefault();
                nextPage = parseInt($('#currentPage').val()) + 1;
                totalPages = parseInt($('#totalPages').val());
                if(nextPage <= totalPages){
                   loadMoreData(nextPage);
                }
                if (nextPage == totalPages){
                    $("#hideload").hide();
                }
        });
    });

   
</script>
<script src="{{url('js/home.js')}}" type="text/javascript"></script>
<!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com :: Campaign Title: WFL - popup - signup - NL --><div id="om-wpaugqy5szc7p3oc9tbt-holder"></div><script>var wpaugqy5szc7p3oc9tbt,wpaugqy5szc7p3oc9tbt_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){wpaugqy5szc7p3oc9tbt_poll(function(){if(window['om_loaded']){if(!wpaugqy5szc7p3oc9tbt){wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();return wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="https://a.omappapi.com/app/js/api.min.js",o.async=true,o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script><!-- / OptinMonster -->


@if($wizard->wizard==1)
<!-- tour -->

<?php

$wizard=DB::table('wizard')->first();



?>

@if(!isset($_COOKIE['wizard']))

<link rel="stylesheet" href="{{url('tutorial/css/iGuider.css')}}">
<script src="{{url('tutorial/js/jquery.iGuider.js')}}"></script>

<link rel="stylesheet" href="{{url('tutorial/themes/material/iGuider-theme-material.css')}}">
<script src="{{url('tutorial/themes/material/iGuider-theme-material.js')}}"></script>  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(window).on('load',function(){

  var preseOpt = {
    intro:{
        enable:false
      },

    tourTitle:'Tariefchecker',
    
    overlayColor:'#111626',
    loc:'',
    
    // tourMap: {
    //   open:false
    // },
   
    lang:{
      introTitle:'Welcome to Tariefchecker',
      introContent:'Now this tour will tell you about Tariefchecker'
    },
    steps:[
    {
      title:'<?php echo $wizard->change_title; ?>',     
      content:'<?php echo $wizard->change_details; ?>',        
      target:'el-1'
    },
    {
      title:'<?php echo $wizard->tarief_title; ?>',        
      content:'<?php echo $wizard->tarief_details; ?>', 
      target:'el-2',
      width:500
    },

    {
      title:'<?php echo $wizard->sort_title; ?>',     
      content:'<?php echo $wizard->sort_details; ?>',       
      target:'el-3'
     // overlayColor:'#ff8a00'
    }
    
    ],
    debug:false
  }
  function myTour(){
    iGuider(preseOpt);
  }
  
  $('.start-tour').on('click',function(){
    myTour();
    return false;
  });
  iGuider('button',preseOpt);
  myTour();
  
  $('.custom-el-drag').draggable({
    drag: function( event, ui ) {
      iGuider('update');  
    } 
  });

  $('.add-new-item-1').on('click',function(){
    if(!$('.add-new-item-2').length){
      setTimeout(function(){
        $('.add-new-item-1').after('<span class="custom-element add-new-item-2"> New element </span>');
      },1000);
    }
  });
})
</script> 
<style>
.custom-el-drag { cursor:move}
form input {
  height: 60px;
  padding: 0 30px;
}
</style>



<?php  
setcookie(
  "wizard",
  "true",
  time() + (10 * 365 * 24 * 60 * 60)
);



?>
@endif


<!-- tour end -->
@endif



</body>