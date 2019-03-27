@extends('backend.common.template')

@section('title', 'Confirm Payment'))

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
            <div class="clearfix"></div>
            <h4 class="card-title float-left">Receipt Details</h4>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td class="py-1">#</td>
                            <td>{{ str_pad($claim->id, 5, "0", STR_PAD_LEFT) }}</td>
                        </tr>

                        <tr>
                            <td class="py-1">Patient Name</td>
                            <td>{{ $claim->patient->name }}</td>
                        </tr>

                        <tr>
                            <td class="py-1">Patient Credit</td>
                            <td>{{ $claim->patient->credit }} EGP</td>
                        </tr>

                        <tr>
                            <td class="py-1">Health Insurance Authority</td>
                            <td>{{ $claim->company->name }}</td>
                        </tr>

                        <tr>
                            <td class="py-1">Service</td>
                            <td>{{ $claim->service->service }}</td>
                        </tr>

                        <tr>
                            <td class="py-1">Service Cost</td>
                            <td>{{ $claim->service->cost }} EGP</td>
                        </tr>
                        </tbody>
                    </table>
                    <br/>
                    @if ($claim->status != 'transferred')
                        <div class="col-10">
                            @if(Session::has('msg')){!! Session::get('msg') !!}@endif
                            {{ Form::open(['url' => route('admin.saveTransaction'), 'files' => true]) }}
                            {{ csrf_field() }}
                            {{ Form::hidden('claim_id', $claim->id) }}
                            <div class="box-footer">
                                {{ Form::submit('Confirm Payment', array('class' => 'btn btn-primary')) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/admin/js/select2.js') }}"></script>
@stop
