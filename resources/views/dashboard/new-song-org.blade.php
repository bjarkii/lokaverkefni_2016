@extends('layouts.dashboard')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Upload New Song</div>
                  <div class="panel-body">
                    {{-- Success box --}}
                    @if(Session::has('success'))
                      <div class="alert-box success">
                        <h2>{!! Session::get('success') !!}</h2>
                      </div>
                    @endif
                    {{-- Error box --}}
                    <p class="errors">{!!$errors->first('song')!!}</p>
                    @if(Session::has('error'))
                      <div class="alert-box error">
                         <p class="errors">{!! Session::get('error') !!}</p>
                      </div>
                    @endif
                    {{-- Form --}}
                    {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
                      <div class="input-wrap input-upload">
                        {!! Form::label('song', 'Upload the song'); !!}
                        {!! Form::file('song') !!}
                      </div>
                      <div class="input-wrap">
                        {!! Form::label('title', 'Title of the song'); !!}
                        {!! Form::text('title', 'Main title of your song') !!}
                      </div>
                      <div class="input-wrap">
                        {!! Form::label('desc', 'Description'); !!}
                        {!! Form::text('desc', 'Describe the song') !!}
                      </div>
                      <div class="input-wrap">
                        {!! Form::label('tags', 'Tags'); !!}
                        {!! Form::text('tags', 'tag, tag2, tag3') !!}
                      </div>
                      <div class="input-wrap submit-button">
                        {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                      </div>
                    {!! Form::close() !!}
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
