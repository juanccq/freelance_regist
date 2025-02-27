@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('title') Tracking time list @stop
@section('top_title') Tracking time list @stop
@section('top_button')
@stop
@section('content')

<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">@yield('top_title')</h4>
        @yield('top_button')
    </header>
    <div class="card-body px-6 pb-6">
        <div class="overflow-x-auto -mx-6 dashcode-data-table">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 datatableajax">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class=" table-th ">
                                    Project
                                </th>
                                <th scope="col" class=" table-th ">
                                    Task
                                </th>
                                <th scope="col" class=" table-th ">
                                    Date
                                </th>
                                <th scope="col" class=" table-th ">
                                    Duration
                                </th>
                                <th scope="col" class=" table-th ">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const __dataTableUrl = "{{ route('tracking.index-ajax') }}";
    const __controlCodeId = 1;
    const __deleteActivoUrl = "{{ route('tracking.destroy', -1) }}";


    async function makeDeleteRequest(deleteURL) {
        const hRequest = new Request(deleteURL);

        const response = await fetch(hRequest, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                _method: 'DELETE'
            })
        })

        return await response.json();
    }

    function deleteActivo() {
        const id = this.dataset.id;
        const deleteUrl = __deleteActivoUrl.replace('-1', id);

        Swal.fire({
            title: 'Esta seguro de eliminar?',
            text: "Una vez eliminado, este registro y todos los registros relacionados se perderán y no podran ser recuperados.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar !'
        }).then(async (result) => {
            if (result.value) {
                const response = await makeDeleteRequest(deleteUrl);

                if (response.status == 200) {
                    __table.clearPipeline().draw();

                    Swal.fire(
                        'Eliminado !',
                        'El registro fue eliminado',
                        'success'
                    );
                } else {
                    Swal.fire("No se pudo eliminar el registro");
                }
            } else {
                Swal.fire("Su registro esta a salvo, no se elimino.");
            }
        })
    }
</script>
@endsection