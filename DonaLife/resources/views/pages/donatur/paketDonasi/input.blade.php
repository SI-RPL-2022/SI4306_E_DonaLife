<x-donatur-layout title="Checkout">
    <section id="content">
        <div class="content-wrap">
                <form id="form_bayar">
                    <div class="col-lg-12" id="payment_content">
                        <button type="button" class="btn btn-primary"onclick="window.history.back();">Kembali</button>
                        <div class="accordion clearfix">
                            <div class="accordion-header">
                                <div class="accordion-icon">
                                    <i class="accordion-closed icon-line-minus"></i>
                                    <i class="accordion-open icon-line-check"></i>
                                </div>
                                <div class="accordion-title">
                                   Alamat Pengiriman
                                </div>
                            </div>
                            <div class="accordion-content clearfix">
                                Harap Kirim paket ke alamat berikut : <strong><i>{{\Str::upper($inisiator->province->name)}}</i></strong><br>
                                Kota : <strong><i>{{\Str::upper($inisiator->city->name)}}</i></strong><br>
                                Kecamatan : <strong><i>{{\Str::upper($inisiator->subdistrict->name)}}</i></strong><br>
                                Alamat : <strong><i>{{\Str::upper($inisiator->alamat)}}</i></strong><br>
                            </div>
                            <div class="row">
                                @foreach($campaign->paket as $pk)
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <p>
                                        {{$pk->nama_paket}}
                                    </p>
                                    <p>
                                        {!! $pk->deskripsi !!}
                                    </p>
                                    <label for="{{$pk->paket_foto}}">
                                        <img src="{{$pk->image}}" style="max-width:150px;max-heoght:150px;">
                                    </label>
                                    <input type="checkbox" name="paket[]" id="{{$pk->paket_foto}}" value="{{$pk->id}}">
                                </div>
                                @endforeach
                            </div>
                            <div class="col-12 form-group">
                                <input type="hidden" name="campaign_barang_id" id="campaign_barang_id" value="{{$campaign->id}}">
                              <textarea name="pesan" class="form-control" placeholder="Masukan Pesan anda kepada penerima donasi disini"></textarea>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-12 form-group">
                                <label class="control-label">Foto Resi</label>
                                <input name="photo_resi" type="file" onchange="loadFile(event)" accept="image/*" class="form-control" data-allowed-file-extensions='[]' data-show-preview="false">
                            </div>
                            <div class="col-12 form-group">
                                <img src="" id="output" stlye="max-width:150px;max-height:150px%;">
                            </div>
                            <div class="col-12 form-group">
                                <label class="control-label">Foto Paket</label>
                                <input name="photo_paket" type="file" onchange="loadFile2(event)" accept="image/*" class="form-control" data-allowed-file-extensions='[]' data-show-preview="false">
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <img src="" id="output2" stlye="max-width:150px;max-height:150px%;">
                        </div>
                        <button id="tombol_bayar" onclick="handle_upload('#tombol_bayar','#form_bayar','{{route('paket-donasi.store', $campaign->id)}}','POST','Send')" class="button button-3d float-end">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @section('custom_js')
        <script>
            ribuan('nominal');
            var loadFile = function(event,id) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            var loadFile2 = function(event) {
                var image2 = document.getElementById('output2');
                image2.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    @endsection
</x-donatur-layout>