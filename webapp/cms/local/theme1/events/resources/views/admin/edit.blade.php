@extends('layout::admin.master')

@section('title','events')
@section('style')


@endsection
@section('body')
    <div class="x_content">

        @if($layout == "create")
            {{ Form::open(array('role' => 'form', 'route'=>array('events.store'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'id' => 'events-form','novalidate' => 'novalidate')) }}
        @elseif($layout == "edit")
            {{ Form::open(array('role' => 'form', 'route'=>array('events.update',$data->id), 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'id' => 'user-form','novalidate' => 'novalidate')) }}
        @endif
        <div class="box-header with-border mar-bottom20">
            {{ Form::button('<i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Save', array('type' => 'submit', 'id' => 'submit_btn', 'name' => 'submit_cat' , 'value' => 'Edit_events' , 'class' => 'mybuttn btn btn-sm btn-dafault pull-right')) }}

            <a class="btn btn-default btn-sm pull-right btn-right-spacing" href="{{route('events.index')}}" ><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back</a>

            {{ Form::button('<i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Clear', ['type' => 'reset','class' => 'mybuttn btn btn-sm btn-dafault pull-right btn-right-spacing']) }}
        </div>

        <span class="section">events Info</span>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('title',@$data->title,array('id'=>"title",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Events Title",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="short_content">Short Description<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::textarea('short_content',@$data->short_content,array('id'=>"short_content",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="event_date"> Date<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::date('event_date',@$data->event_date,array('id'=>"event_date",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Location <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('location',@$data->location,array('id'=>"location",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Location",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Source <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('source',@$data->source,array('id'=>"source",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Source",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('url',@$data->url,array('id'=>"url",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Url",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">No.of Days <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::number('day_count',@$data->day_count,array('id'=>"day_count",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"No.of Days",'required'=>"required"))}}
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('status',array("1"=>"Enable","0"=>"Disable"),@$data->status ,
             array('id'=>'status','class' => 'form-control','required' => 'required' )) }}
                </div>
            </div>

        </div>

        {{Form::close()}}
    </div>

@endsection

@section('script')

    <!-- validator -->
    {!! Cms::script("theme/vendors/validator/validator.js") !!}

@endsection
