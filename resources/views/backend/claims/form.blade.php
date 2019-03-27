@extends('backend.common.template')

@section('title', 'Create Claim'))

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
            <h4 class="card-title float-left">Create Claim</h4>
            <div class="row">

                <div class="col-10">
                    @if(Session::has('msg')){!! Session::get('msg') !!}@endif
                    {{ Form::open(['url' => route('claims.store'), 'files' => true]) }}
                    {{ csrf_field() }}
                    <div class="tab-content tab-content-vertical">
                        <div class="tab-pane fade show active" id="tab_common"
                             role="tabpanel" aria-labelledby="tab_common-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        {{ Form::label('patient',  'Patient') }}
                                        <select class="js-example-basic-single" style="width:100%" name="patient_id"
                                                required>
                                            <option value="">Select patient</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-8">
                                        {{ Form::label('patient',  'Service') }}
                                        <select class="js-example-basic-single" style="width:100%" name="service_id"
                                                required>
                                            <option value="">Select patient</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->service }}</option>
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
