@extends('backend.common.template')

@section('title', 'Create Patient'))

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
            <h4 class="card-title float-left">Create Patient</h4>
            <div class="row">

                <div class="col-10">
                    @if(Session::has('msg')){!! Session::get('msg') !!}@endif
                    {{ (isset($patientData)) ? Form::model($patientData, ['url' => route('patients.update', [$patientData->id]), 'method' => 'PUT', 'files' => true]) : Form::open(['url' => route('patients.store'), 'files' => true]) }}
                    {{ csrf_field() }}
                    <div class="tab-content tab-content-vertical">
                        <div class="tab-pane fade show active" id="tab_common"
                             role="tabpanel" aria-labelledby="tab_common-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('national_id',  'National ID') }}
                                        {{ Form::text('national_id',isset($patientData) ? old('national_id', $patientData->national_id ?? null) : null, ['class' => 'form-control', 'placeholder' => 'National ID', 'required']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('name',  'Name') }}
                                        {{ Form::text('name',isset($patientData) ? old('name', $patientData->name ?? null) : null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{ Form::label('phone',  'Phone') }}
                                        {{ Form::text('phone',isset($patientData) ? old('phone', $patientData->phone ?? null) : null, ['class' => 'form-control', 'placeholder' => 'Phone', 'required']) }}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('plan',  'Plan') }}
                                        <select class="js-example-basic-single" style="width:100%" name="plan_id"
                                                required>
                                            <option value="">Select plan</option>
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                                            @endforeach
                                        </select>
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
