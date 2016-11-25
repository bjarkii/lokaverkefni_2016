@extends('layouts.dashboard')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default" id="form-wrap">
                  <div class="panel-heading">Upload New Song</div>
                  <div class="panel-body form-wrap">
                    {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true, 'class'=>'dropzone')) !!}
                    <div class="dropzone">

                    </div>
                    <div class="input-wrap">
                      {!! Form::label('title', 'Title of the song'); !!}
                      {!! Form::text('title', 'Main title of your song') !!}
                    </div>
                    {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>


  <script>
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
      $(".dropzone").dropzone({
          renameFilename: function (filename) {
              return new Date().getTime() + '_' + filename;
          }
      });
    });
  </script>
@endsection
