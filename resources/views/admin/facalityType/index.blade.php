@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="custom-header">
            Facality Type List
            @can('role_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <button class="btn button btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Facality Type
                        </button>
                    </div>
                </div>
            @endcan
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
                                Action
                             </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facalityTypes as $key => $facalityType)
                        <tr data-entry-id="{{ $facalityType->id }}">
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $facalityType->facality_type ?? '' }}
                            </td>
                            <td>
                                @can('facality_type_show')
                                    <a class="p-0 glow"
                                        style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                        title="view" >
                                        <i class='bx bx-show text-primary'></i>
                                    </a>
                                @endcan

                                @can('facality_type_edit')
                                    <a class="p-0 glow edit" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="edit"
                                    data-id="{{ $facalityType->id }}" data-facality-type="{{ $facalityType->facality_type }}">
                                        <i class='bx bx-edit text-success'></i>
                                    </a>
                                @endcan
                                @can('user_delete')
                                        <form id="orderDelete-{{ $facalityType->id }}"
                                            action="{{ route('admin.facality-type.destroy', $facalityType->id) }}" method="POST"  style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button
                                                style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                class=" p-0 glow" title="delete"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bx bx-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endcan
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-3" style="float: right;">
                    {{-- {{ $facalityType->links() }} --}}
                </div>
            </div>
        </div>
    </div>

  
    <!--Create Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Facality Type Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="" class="corm-label">Facality Type Name</label>
                  <input type="text" class="form-control" name="facality_type" id="facality_type" >
                  @if ($errors->has('facality_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facality_type') }}
                    </div>
                  @endif
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="" class="btn btn-success" id="save-facality" >Save</button>
              </div>
            </div>
          </div>
    </form>
    </div>
    {{-- End Create Modal  --}}


    {{-- Edit Modal Box  --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <form action="" method="POST">
            @method("PUT")
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Facality Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <label for="" class="corm-label">Facality Type Name</label>
                      <input type="text" class="form-control" name="ed_facality_type" id="ed_facality_type" >
                      @if ($errors->has('facality_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facality_type') }}
                        </div>
                      @endif
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="" class="btn btn-success update-facality" id="update-facality" >Update</button>
                  </div>
                </div>
              </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script>
        $('#save-facality').on('click', function(e) {
            let facality_type = $('#facality_type').val();
            
            $.ajax({
                type: "POST",
                url: `/admin/facality-type/save`,
                data: {
                    _token: "{{ csrf_token() }}",
                    facality_type: facality_type,
                },
                success: function(response) {
                    console.log(response);
                }
            });
        })

        $('.edit').on('click',function(e){
            var id = $(this).data('id');
            var facality_type = $(this).data('facality-type');
            $('#ed_facality_type').val(facality_type);
        });

        $('#update-facality').on('click', function(e) {
            let facality_type = $('#ed_facality_type').val();
            
            $.ajax({
                type: "POST",
                url: `/admin/facality-type/update/${id}`,
                data: {
                    _token: "{{ csrf_token() }}",
                    facality_type: facality_type,
                },
                success: function(response) {
                    console.log(response);
                }
            });
        })
    </script>
@endsection
