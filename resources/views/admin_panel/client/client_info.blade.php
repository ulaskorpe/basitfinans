
<div class="x_content">
            <form class="form-horizontal form-label-left input_mask" id="update-client"
                  action="{{route('client-update-post')}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" id="id" name="id" value="{{$client['id']}}">
                <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('admin.client_name')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="name" value="{{$client['name']}}"
                                   name="name" placeholder="{{__('admin.client_name')}}">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>


                            <div id="name_error"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('admin.client_title')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="title" value="{{$client['title']}}"
                                   name="title" placeholder="{{__('admin.client_title')}}">
                            <span class="fa fa-asterisk form-control-feedback left" aria-hidden="true"></span>


                            <div id="title_error"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.email')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="email" name="email" value="{{$client['email']}}"
                                   placeholder="{{__('general.email')}}">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            <div id="email_error"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.phone')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="phone" name="phone" value="{{$client['phone']}}"
                                   placeholder="{{__('general.phone')}}">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            <div id="phone_error"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.website')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="website" value="{{$client['website']}}"
                                   name="website"
                                   placeholder="{{__('general.website')}}">
                            <span class="fa fa-signal form-control-feedback left" aria-hidden="true"></span>
                            <div id="website_error"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.address')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="address" value="{{$client['address']}}"
                                   name="address"
                                   placeholder="{{__('general.address')}}">
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                            <div id="address_error"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.description')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" id="decription" class="form-control" cols="30"
                                              rows="10" placeholder="{{__('general.description')}}">{{$client['description']}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 form-group">
                        <label class="control-label col-md-2 col-sm-2 ">{{__('general.logo')}}</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="file" class="form-control has-feedback-left" id="logo" name="logo"
                                   onchange="showImage('logo','target','logo_img')"
                                   placeholder="{{__('general.logo')}}">
                            <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                            <div id="avatar_error"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        @if(!empty($client['logo']))
                            <img src="{{makeCommonFileUrl($client['logo'],120,120,1)}}" alt="" id="logo_img" style="margin-left: 100px">
                        @endif
                        <img id="target" width="120" style="display: none;margin-left: 100px">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-9 col-offset-12">

                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">{{__('general.submit')}}</button>
                    </div>
                </div>

            </form>
        </div>

