@extends('crudbooster::admin_template')
@section('content')

    <div>
        @if(request('return_url'))
            <p><a title='Return' href='{{request("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                    &nbsp; {{ cbTrans("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a>
            </p>
        @else
            <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                    &nbsp; {{ cbTrans("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a>
            </p>
        @endif


        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title or "Page Title" !!}
                </strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: request('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                    @if($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif
                    <div class="box-body" id="parent-form-area">
                        @include("crudbooster::form.form_detail", ['forms' => $forms])
                    </div><!-- /.box-body -->

                    <br><br><br><br><br>
                    <div class="box-footer" style="background: #F5F5F5">
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if(CRUDBooster::canCreate() || CRUDBooster::canUpdate())
                                    <input type="submit" name="submit" value='' class='btn btn-success'>
                                @endif

                            </div>
                        </div>
                    </div><!-- /.box-footer-->
                </form>

            </div>
        </div>
    </div><!--END AUTO MARGIN-->

@endsection