<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row gutter-40 col-mb-80">
                <div class="postcontent">

                    <h4>Permintaan Campaign</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $i => $requestUser)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$requestUser->judul}}</td>
                                    <td><img src="{{$requestUser->image}}" style="max-width: 100px;max-height:100px;"></td>
                                    <td>{{$requestUser->deskripsi}}</td>
                                    <td>{{$requestUser->jenis}}</td>
                                    @if($requestUser->status == 'decline')
                                    <td>Ditolak</td>
                                    @elseif($requestUser->status == 'accept')
                                    <td>Diterima</td>
                                    @else
                                    <td>Menunggu Konfirmasi Admin</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>