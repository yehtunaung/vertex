@extends('layouts.admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-edit">
            <!-- Invoice Edit-->
            <div class="col-lg-9 col-12 mb-lg-0 mb-4" id="print_div">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        @if ($creditRecords->count() > 0)
                            <div class="d-flex svg-illustration mb-4 gap-2">
                                <span class="app-brand-text h3 mb-0 fw-bold">Credit History</span>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>{{ trans('cruds.customerList.fields.name') }}</td>
                                        <td>{{ trans('cruds.customerList.fields.date') }}</td>
                                        <td>{{ trans('cruds.creditRecord.fields.status') }}</td>
                                        <td class="text-end">{{ trans('cruds.creditRecord.fields.credit_amount') }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creditRecords as $creditRecord)
                                        <tr>
                                            <td>{{ $creditRecord->customer->name }}</td>
                                            <td>{{ $creditRecord->date }}</td>
                                            <td>{{ $creditRecord->status }}</td>
                                            <td class="text-end">{{ intval($creditRecord->credit_amount) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end">
                                            {{ trans('cruds.customerList.fields.credit_left') }}:
                                        </td>
                                        <td class="text-end">
                                            {{ number_format((int) App\Helpers\helper::getTotalCreditLeft($creditRecord->customer->id)) ?? 0 }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <h3 class="text-center">No Credit Record!</h3>
                        @endif
                        <hr class="my-4 mx-n4" />
                    </div>
                </div>
            </div>
            <!-- /Invoice Edit-->
            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
                <div class="card mb-4">
                    <div class="card-body">

                        @if ($creditRecords->count() > 0)
                            <a href="{{ route('admin.admin.export-creditRecords', ['customerId' => $creditRecord->customer->id]) }}"
                                class="btn btn-success text-white d-block w-100 me-3 mb-3">Export Excel</a>
                        @endif

                        <div class="my-3">
                            <a class="btn btn-secondary text-white d-block w-100 me-3" onclick="history.back()">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>


    </div>
@endsection
