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
                        Data Campaign Uang
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
                            <label for="condition" class="required form-label">Inisiator</label>
                            <select class="form-control" name="inisiator" id="inisiator">
                                <option value="" selected disabled>Pilih Nama Inisiator</option>
                                @foreach($user as $inisiator)
                                    <option value="{{$inisiator->id}}" {{$inisiator->id == $data->user_id ? 'selected' :''}}>{{$inisiator->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="judul" class="required form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Campaign..." value="{{ $data->judul }}">
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="gambar" class="required form-label">Gambar</label>
                            <input type="file" accept="image/*" class="form-control" id="gambar" name="gambar" onchange="loadFile(event)">
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
                            <label for="target_nominal" class="required form-label">Target Nominal</label>
                            <input type="tel" class="form-control" id="target_nominal" name="target_nominal" placeholder="Masukkan Target Nominal Campaign..." value="{{ number_format($data->target_nominal) }}">
                        </div>
                        <div class="col-lg-12 mb-10">
                            <label for="tanggal_selesai" class="required form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('Y-m-d')  }}">
                        </div>
                        @if ($data->id)
                            <div class="col-lg-12 mb-10">
                                <label for="status" class="required form-label">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="pengecekan" {{$data->status == 'pengecekan' ? 'selected' : ''}}>Pengecekan</option>
                                    <option value="mengumpulkan" {{$data->status == 'mengumpulkan' ? 'selected' : ''}}>Mengumpulkan</option>
                                    <option value="disalurkan" {{$data->status == 'disalurkan' ? 'selected' : ''}}>Disalurkan</option>
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="min-w-150px pt-10 mt-10 text-end">
                            @if ($data->id)
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.uang-campaign.update',$data->id)}}','PATCH');" class="btn btn-sm btn-primary">Simpan</button>
                            @else
                            <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.uang-campaign.store')}}','POST');" class="btn btn-sm btn-primary">Simpan</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    select2("inisiator","Pilih Nama Inisiator");
    ribuan('target_nominal');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>