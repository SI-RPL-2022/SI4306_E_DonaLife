<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <h6>
                        @if ($data->id)
                            Ubah
                        @else
                            Tambah
                        @endif
                        Data Paket
                    </h6>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-sm btn-primary">Kembali</button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <form id="form_input">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <label for="nama_paket" class="required form-label">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Masukkan Nama Paket..." value="{{ $data->nama_paket }}">
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="deskripsi" class="required form-label">Deskripsi</label>
                           <textarea name="deskripsi" class="form-control"  style="white-space: pre-wrap;" id="deskripsi">{!! strip_tags($data->deskripsi) !!}</textarea>
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="campaign" class="required form-label">Pilih Campaign</label>
                            <select class="form-control" name="campaign" id="campaign">
                                <option value="" selected disabled>Pilih Campaign</option>
                                @foreach($campaign as $option)
                                    <option value="{{$option->id}}" {{$option->id == $data->campaign_id ? 'selected' :''}}>{{$option->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="paket_foto" class="required form-label">Gambar</label>
                            <input type="file" accept="image/*" class="form-control" id="paket_foto" name="paket_foto" onchange="loadFile(event)">
                        </div>
                        @if ($data->id)
                            <div class="col-lg-12 mb-10">
                                <img src="{{$data->image}}" style="max-width:200px;max-height:250px;" id="output" >
                            </div>
                        @endif
                        <div class="col-lg-12 mb-5">
                            <label for="qty" class="required form-label">Jumlah Paket Yang Dibutuhkan</label>
                            <input type="tel" class="form-control" id="qty" name="qty" placeholder="Masukkan Nama Paket..." value="{{ $data->qty }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="min-w-150px pt-10 mt-10 text-end">
                            @if ($data->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.paket.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.paket.store')}}','POST');" class="btn btn-sm btn-primary">Simpan</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    select2("campaign","Pilih Campaign");
    number_only('qty');
    ribuan('target_nominal');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>