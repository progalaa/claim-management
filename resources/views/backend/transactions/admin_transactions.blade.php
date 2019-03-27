@extends('backend.common.template')

@section('title', 'HIA Transactions')

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
            <h4 class="card-title float-left">HIA Transactions</h4>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient</th>
                                <th>Service</th>
                                <th>HIA</th>
                                <th>Company</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->patient->name }}</td>
                                    <td>{{ $transaction->service->service }}</td>
                                    <td>{{ $transaction->company->name }}</td>
                                    <td>{{ $transaction->claim->provider->name }}</td>
                                    <td>{{ $transaction->service->cost }} EGP</td>
                                    <td>
                                        @if ($transaction->payment_status == 'done')
                                            <label class='badge badge-success'>{{ $transaction->payment_status }}</label>
                                        @elseif ($transaction->payment_status == 'rejected')
                                            <label class='badge badge-danger'>{{ $order->status->getTrans()->title }}</label>
                                        @else
                                            <label class='badge badge-info'>{{ $transaction->payment_status}}</label>
                                        @endif
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
        (function ($) {
            $('.destroyBtn').on('click', function (e) {
                e.preventDefault();
                showSwal($(this));
            });

            function showSwal(btn) {
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
                    if (value) {
                        btn.parent('form').submit();
                    }
                })
            }
        })(jQuery);
    </script>
@stop
