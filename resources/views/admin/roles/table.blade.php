@extends('layouts.backend.master')

@section('title', '| Roles')

@push('css')
<link rel="stylesheet" href="{{asset('css/permission.css')}}">    
@endpush

@section('content')

  <div class="col-lg-9 col-md-8">
    <div class="accordion-box-content">
      <div class="tab-content clearfix">
        <div class="tab-pane fade" id="general">
          <h3 class="tab-content-title">general</h3>
          <div class="row">
            <div class="col-sm-8">
                <div class="form-group "><label for="name" class="col-md-3 control-label text-left">name<span class="m-l-5 text-red">*</span></label><div class="col-md-9"><input name="name" class="form-control " id="name" type="text" value="admin"></div></div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade in active" id="permissions">
          <h3 class="tab-content-title">permissions</h3>
          <div class="row">
            <div class="col-lg-9 col-md-12">
              <div class="btn-group permission-parent-actions pull-right">
                <button type="button" class="btn btn-default allow-all">allow all</button>
                <button type="button" class="btn btn-default deny-all">deny all</button>
                <button type="button" class="btn btn-default inherit-all">inherit all</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-9 col-md-12">
              <div class="col-md-12">
                  <div class="row">
                    <div class="permission-parent-head clearfix">
                        <h3>attribute</h3>
                    </div>
                  </div>
              </div>
              <div class="clearfix"></div>
              <div class="permission-group">
                <div class="row">
                  <div class="col-md-12">
                    <div class="permission-group-head">
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                              <h4>admin.attributes</h4>
                          </div>
                          <div class="col-md-8 col-sm-8">
                            <div class="btn-group permission-group-actions pull-right">
                                <button type="button" class="btn btn-default allow-all">allow all</button>
                                <button type="button" class="btn btn-default deny-all">deny all</button>
                                <button type="button" class="btn btn-default inherit-all">inherit all</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="permission-row">
                        <div class="row">
                          <div class="col-md-5 col-sm-4">
                            <span class="permission-label">index attribute</span>
                          </div>
                          <div class="col-md-7 col-sm-8">
                            <div class="row">
                              <div class="radio-btn clearfix">                                                                
                                <div class="radio">
                                  <input type="radio" value="0" id="admin.attributes-index-inherit" name="permissions[admin.attributes.index]" class="permission-inherit">
                                  <label for="admin.attributes-index-inherit">inherit</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="-1" id="admin.attributes-index-deny" name="permissions[admin.attributes.index]" class="permission-deny">
                                  <label for="admin.attributes-index-deny">deny</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="1" id="admin.attributes-index-allow" name="permissions[admin.attributes.index]" class="permission-allow" checked="">
                                  <label for="admin.attributes-index-allow">allow</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="permission-row">
                        <div class="row">
                          <div class="col-md-5 col-sm-4">
                            <span class="permission-label">create attribute</span>
                          </div>
                          <div class="col-md-7 col-sm-8">
                            <div class="row">
                              <div class="radio-btn clearfix">                                                                          
                                <div class="radio">
                                  <input type="radio" value="0" id="admin.attributes-create-inherit" name="permissions[admin.attributes.create]" class="permission-inherit">
                                  <label for="admin.attributes-create-inherit">inherit</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="-1" id="admin.attributes-create-deny" name="permissions[admin.attributes.create]" class="permission-deny">
                                  <label for="admin.attributes-create-deny">deny</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="1" id="admin.attributes-create-allow" name="permissions[admin.attributes.create]" class="permission-allow" checked="">
                                  <label for="admin.attributes-create-allow">allow</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="permission-row">
                        <div class="row">
                          <div class="col-md-5 col-sm-4">
                            <span class="permission-label">edit attribute</span>
                          </div>
                          <div class="col-md-7 col-sm-8">
                            <div class="row">
                              <div class="radio-btn clearfix">                                                                                
                                <div class="radio">
                                  <input type="radio" value="0" id="admin.attributes-edit-inherit" name="permissions[admin.attributes.edit]" class="permission-inherit">
                                  <label for="admin.attributes-edit-inherit">inherit</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="-1" id="admin.attributes-edit-deny" name="permissions[admin.attributes.edit]" class="permission-deny">
                                  <label for="admin.attributes-edit-deny">deny</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="1" id="admin.attributes-edit-allow" name="permissions[admin.attributes.edit]" class="permission-allow" checked="">
                                  <label for="admin.attributes-edit-allow">allow</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="permission-row">
                        <div class="row">
                          <div class="col-md-5 col-sm-4">
                            <span class="permission-label">delete attribute</span>
                          </div>
                          <div class="col-md-7 col-sm-8">
                            <div class="row">
                              <div class="radio-btn clearfix">                                                                                
                                <div class="radio">
                                  <input type="radio" value="0" id="admin.attributes-destroy-inherit" name="permissions[admin.attributes.destroy]" class="permission-inherit">
                                  <label for="admin.attributes-destroy-inherit">inherit</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="-1" id="admin.attributes-destroy-deny" name="permissions[admin.attributes.destroy]" class="permission-deny">
                                  <label for="admin.attributes-destroy-deny">deny</label>
                                </div>
                                <div class="radio">
                                  <input type="radio" value="1" id="admin.attributes-destroy-allow" name="permissions[admin.attributes.destroy]" class="permission-allow" checked="">
                                  <label for="admin.attributes-destroy-allow">allow</label>
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
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
{{-- <script src="{{asset('js/permission.js')}}"></script> --}}
@endpush