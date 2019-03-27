@extends('backend.common.template')

@section('title', 'claims')

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
            <h4 class="card-title float-left">claims</h4>
            <a href="{{ route('claims.create') }}" class="btn btn-info btn-sm float-right"><i class="mdi mdi-note-plus"></i> Create New</a>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient</th>
                                <th>HIA</th>
                                <th>Service</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th>{{ trans('actions.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($claims as $claim)
                                <tr>
                                    <td>{{ $claim->id }}</td>
                                    <td>{{ $claim->patient->name }}</td>
                                    <td>{{ $claim->company->name }}</td>
                                    <td>{{ $claim->service->service }}</td>
                                    <td>{{ $claim->service->cost }} EGP</td>
                                    <td>{{ $claim->status }}</td>
                                    <td>
                                        <form action="{{ route('claims.destroy', $claim->id) }}" method="post" class="">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                               <button type="button" class="btn btn-outline-danger btn-sm destroyBtn">{{ trans('actions.remove') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center">
                                        {{ trans('common.no-items') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('assets/admin/js/alerts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/data-table.js') }}"></script>
    <script>
        (function($) {
            $('.destroyBtn').on('click', function (e) {
                e.preventDefault();
                showSwal($(this));
            });

            function showSwal(btn){
                swal({
                    title: '{{ trans("actions.confirm") }}',
                    text: '{{ trans("actions.confirm_text") }}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3f51b5',
                    cancelButtonColor: '#ff4081',
                    confirmButtonText: 'Great ',
                    buttons: {
                        cancel: {
                            text: '{{ trans("actions.cancel") }}',
                            value: false,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true,
                        },
                        confirm: {
                            text: '{{ trans("actions.ok") }}',
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then((value) => {
                    if(value) {
                        btn.parent('form').submit();
                    }
                })
            }
        })(jQuery);
    </script>
@stop
