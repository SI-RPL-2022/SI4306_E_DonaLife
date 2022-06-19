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
                        Data Berita Barang Campaign
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
                            <label for="campaign" class="required form-label">Campaign</label>
                            <select class="form-control" name="campaign" id="campaign">
                                <option value="" selected disabled>Pilih Campaign</option>
                                @foreach($campaign as $option)
                                    <option value="{{$option->id}}" {{$option->id == $data->campaign_barang_id ? 'selected' :''}}>{{$option->judul}}</option>
                                @endforeach
                            </select>
                        </div>
                   
                        <div class="col-lg-12 mb-10">
                            <label for="foto" class="required form-label">Foto Dokumentasi</label>
                            <input type="file" accept="image/*" class="form-control" id="foto" name="foto" onchange="loadFile(event)">
                        </div>
                        @if ($data->id)
                            <div class="col-lg-12 mb-10">
                                <img src="{{$data->image}}" style="max-width:200px;max-height:250px;" id="output" >
                            </div>
                        @endif
                        <div class="col-lg-12 mb-10">
                            <label for="deskripsi" class="required form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi">{{$data->deskripsi}}</textarea>
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="tanggal_mulai" class="required form-label">Tanggal Mulai Campaign</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ \Carbon\Carbon::parse($data->tanggal_mulai_campaign)->format('Y-m-d')  }}">
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="tanggal_selesai" class="required form-label">Tanggal Selesai Campaign</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ \Carbon\Carbon::parse($data->tanggal_selesai_campaign)->format('Y-m-d')  }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="min-w-150px pt-10 mt-10 text-end">
                            @if ($data->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.berita-campaignBarang.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.berita-campaignBarang.store')}}','POST');" class="btn btn-sm btn-primary">Simpan</button>
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
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>