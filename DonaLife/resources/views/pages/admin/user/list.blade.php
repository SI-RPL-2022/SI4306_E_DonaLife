@if($collection->count() > 0)
<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="min-w-125px">No</th>
            <th class="min-w-125px">Nama</th>
            <th class="min-w-125px">Email</th>
            <th class="min-w-125px">Alamat</th>
            <th class="min-w-125px">Telepon</th>
            <th class="min-w-125px">No Rekg</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">

        @foreach ($collection as $i => $item)
        <tr>
            <td>
                {{ $i+1 }}
            </td>

            <td>
                {{ $item->nama }}
            </td>

            <td>
                {{ $item->email }}
            </td>

            <td>
                {{ $item->alamat }}
            </td>

            <td>
                {{ $item->telepon }}
            </td>

            <td>
                {{ $item->rekening }}
            </td>

            <td>
                {{ $item->tanggal_selesai }}
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