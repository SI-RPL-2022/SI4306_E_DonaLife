@if($collection->count() > 0)
<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center">No</th>
            <th class="text-center">Nama Paket</th>
            <th class="text-center">Campaign</th>
            <th class="text-center">Gambar</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Jumlah Paket Yang Dibutuhkan</th>
            <th class="text-end min-w-70px">Aksi</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">

        @foreach ($collection as $i => $item)
        <tr>

            <td class="text-center">
                {{ $i+1 }}
            </td>
   
            <td class="text-center">
                {{ $item->nama_paket }}
            </td>
         
            <td class="text-center">
                {{ $item->campaign->judul }}
            </td>

            <td class="text-center">
                <img src=" {{ $item->image }}" style="max-width:100px;max-height:100px;">
            </td>

            <td class="text-center">
                {!! $item->deskripsi !!}
            </td>

            <td class="text-center">
                {{ $item->qty }}
            </td>

            <td class="text-end">
                <div class="btn-group" role="group">
                    <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" aria-labelledby="aksi">
                        <div class="menu-item px-3">
                            <a href="javascript:;" onclick="load_input('{{route('admin.paket.edit',$item->id)}}');" class="menu-link px-3">Ubah</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="javascript:;" onclick="handle_delete('{{route('admin.paket.destroy',$item->id)}}');" class="menu-link px-3">Hapus</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('theme.admin.pagination')}}
@else
<div class="text-center px-4 mb-3">
    <h1>
        Data kosong
        <br>
    </h1>
    <img class="mw-100" src="{{asset('img/terms-1.png')}}" style="max-height:300px;">
</div>
@endif