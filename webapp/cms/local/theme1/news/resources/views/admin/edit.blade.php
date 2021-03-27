@extends('layout::admin.master')

@section('title','news')
@section('style')
{!! Cms::style("theme/vendors/switchery/dist/switchery.min.css") !!}

@endsection
@section('body')
    <div class="x_content">

        @if($layout == "create")
            {{ Form::open(array('role' => 'form', 'route'=>array('news.store'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'id' => 'news-form','novalidate' => 'novalidate')) }}
        @elseif($layout == "edit")
            {{ Form::open(array('role' => 'form', 'route'=>array('news.update',$data->id), 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'id' => 'user-form','novalidate' => 'novalidate')) }}
        @endif
        <div class="box-header with-border mar-bottom20">
            {{ Form::button('<i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Save', array('type' => 'submit', 'id' => 'submit_btn', 'name' => 'submit_cat' , 'value' => 'Edit_news' , 'class' => 'mybuttn btn btn-sm btn-dafault pull-right')) }}

            <a class="btn btn-default btn-sm pull-right btn-right-spacing" href="{{route('news.index')}}" ><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;&nbsp;&nbsp;Back</a>

            {{ Form::button('<i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;&nbsp;Clear', ['type' => 'reset','class' => 'mybuttn btn btn-sm btn-dafault pull-right btn-right-spacing']) }}
        </div>

        <span class="section">News Info</span>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Is video<span class="required">*</span>
                </label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    {{Form::hidden('is_video',0)}}
                    {{ Form::checkbox('is_video',1,(@$data->is_video==1) ? true : false, array('class' => 'js-switch', 'id' => 'video-switch')) }}

                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('title',@$data->title,array('id'=>"title",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Title",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group non-video">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="short_content">Short Description<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::textarea('short_content',@$data->short_content,array('id'=>"short_content",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('url',@$data->url,array('id'=>"url",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"Url",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group non-video">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Image url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('image',@$data->image,array('id'=>"image",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"image",'required'=>"required"))}}
                </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Source <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{Form::text('source',@$data->source,array('id'=>"source",'class'=>"form-control col-md-7 col-xs-12" ,
                    'placeholder'=>"source",'required'=>"required"))}}
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
    {!! Cms::script("theme/vendors/switchery/dist/switchery.min.js") !!}
    <script type="text/javascript">
        function videoDomChange(v) {
            if(v) {
                $('.non-video').addClass('hidden');
            } else {
                $('.non-video').removeClass('hidden')
            }
        }
        $('#video-switch').on('change', function(e) {
            videoDomChange(e.target.checked)
        })
        videoDomChange($('#video-switch').attr('checked'));
    </script>
@endsection
