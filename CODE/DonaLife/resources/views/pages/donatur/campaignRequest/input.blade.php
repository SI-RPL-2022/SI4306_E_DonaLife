<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="form-widget">

                <div class="form-result"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <form class="row" id="form_permintaan">
                            <div class="form-process">
                                <div class="css3-spinner">
                                    <div class="css3-spinner-scaler"></div>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
                                <label>Nama Lengkap:</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{Auth::user()->nama}}" readonly>
                            </div>
                            <div class="col-6 form-group">
                                <label>Judul Campaign:</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukan Judul Campaign">
                            </div>
                            <div class="col-12 form-group">
                                <label>Gambar Pendukung:</label>
                                <input type="file" accept="image/*" name="gambar" id="gambar" class="form-control">
                            </div>
                            <div class="col-12 form-group">
                                <label>Jenis</label>
                                <select class="form-select" name="jenis" id="jenis">
                                    <option value="">-- Pilih Jenis Campaign --</option>
                                    <option value="uang">Uang Campaign</option>
                                    <option value="barang">Barang Campaign</option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label>Deskripsi Campaign:</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <div class="col-12">
                                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_permintaan','{{route('campaign-request.store')}}','POST','Ajukan');" class="btn btn-dark">Ajukan Campaign!</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>