@extends('backend.common.template')

@section('title', 'Health Providers'))

@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            {!! Session::get('msg') !!}
        </div>
    @endif
    @if(!empty($errors->all()))
        <ul class="alert alert-danger">
            @foreach($errors->all('<li>:message</li>') as $message) {!! $message !!}  @endforeach
        </ul>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title float-left">Create Health Provider</h4>
            <div class="row">

                <div class="col-10">
                    @if(Session::has('msg')){!! Session::get('msg') !!}@endif
                    {{ (isset($adminData)) ? Form::model($adminData, ['url' => route('admins.update', [$adminData->id]), 'method' => 'PUT', 'files' => true]) : Form::open(['url' => route('admins.store'), 'files' => true]) }}
                    {{ csrf_field() }}
                    <div class="tab-content tab-content-vertical">
                        <div class="tab-pane fade show active" id="tab_common"
                             role="tabpanel" aria-labelledby="tab_common-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name',  'Provider Name') }}
                                        {{ Form::text('name',isset($adminData) ? old('name', $adminData->name ?? null) : null, ['class' => 'form-control', 'placeholder' => 'Provider Name', 'required']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('phone',  'Phone') }}
                                        {{ Form::text('phone',isset($adminData) ? old('phone', $adminData->phone ?? null) : null, ['class' => 'form-control', 'placeholder' => 'Provider phone', 'required']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('email',  'Email') }}
                                        {{ Form::email('email',isset($adminData) ? old('email', $adminData->email ?? null) : null, ['class' => 'form-control', 'placeholder' => 'email', 'required']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('password',  'Password') }}
                                        <input type="password" name="password"
                                               class="form-control form-control-lg {{ $errors->has('password') ? ' form-control-danger' : '' }}"
                                               id="inputPassword" placeholder="{{ trans('admins.password') }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('type',  'Provider Type') }}
                                        <select class="js-example-basic-single" style="width:100%" name="type" required>
                                            <option value="hospital">hospital</option>
                                            <option value="clinic">clinic</option>
                                            <option value="laboratory">laboratory</option>
                                            <option value="pharmacy">pharmacy</option>
                                            <option value="radiology">radiology</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('avatar',  'Provider Logo') }}
                                        {{ Form::file('avatar', ['class' => 'form-control', 'placeholder' => trans('admins.avatar')]) }}
                                    </div>

                                    <div class="form-group col-md-6">
                                        <img src="{{ (isset($adminData) && $adminData->avatar) ? route('image.show', ['images', $adminData->avatar]) : asset('assets/admin/images/no-image-found.jpg') }}" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ Form::submit(trans('actions.save'), array('class' => 'btn btn-primary')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/js/select2.js') }}"></script>
@stop
