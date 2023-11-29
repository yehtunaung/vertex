@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            Facality Trash List

            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn button btn-secondary" onclick="history.back()">
                        Back
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-AuditLog">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Facality Type Name
                            </th>
                            <th>
                                Facality Name
                            </th>
                            <th>
                                Icon
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facalities as $key => $facality)
                            <tr data-entry-id="{{ $facality->id }}">
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>

                                    {{ $facality->facalityType->facality_type ?? '' }}
                                </td>
                                <td>
                                    {{ $facality->facality_name ?? '' }}
                                </td>
                                <td>
                                    {{ $facality->icon ?? '' }}
                                </td>
                                <td>
                                    @can('facality_delete')
                                        <form id="orderDelete-{{ $facality->id }}"
                                            action="{{ route('admin.facality.trashDelete', $facality->id) }}" method="POST"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button
                                                style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                class=" p-0 glow" title="delete"
                                                onclick="return confirm('Are you sure to delete?')">
                                                <i class="bx bx-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endcan
                                    <a
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                        class=" p-0 glow" title="restore"
                                        onclick="return confirm('Are you sure to restore?')" href="{{ route('admin.facality.restore',$facality->id) }}">
                                        <i class="bx bx-reset text-success"></i>
                                    </a>
                                </td>
                            @empty
                                <td colspan="5" class="text-center">Data No Record</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3" style="float: right;">
                    {{-- {{ $facalityType->links() }} --}}
                </div>
            </div>
        </div>
        <div class="container text-center">
            <p class="text-danger">The data in the trash can will be automatically deleted after 30 days !</p>
        </div>
    </div>
@endsection
