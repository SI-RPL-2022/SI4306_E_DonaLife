<x-donatur-layout title="Checkout">
    <section id="content">
        <div class="content-wrap">
            <form id="form_bayar">
                <div class="col-lg-12" id="payment_content">
                    <button type="button" class="btn btn-primary" onclick="window.history.back();">Kembali</button>
                    <div class="accordion clearfix">
                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-line-minus"></i>
                                <i class="accordion-open icon-line-check"></i>
                            </div>
                            <div class="accordion-title">
                                Direct Bank Transfer
                            </div>
                        </div>
                        <div class="accordion-content clearfix">
                            Harap transfer ke bank <strong><i>{{\Str::upper($inisiator->nama_bank)}}</i></strong><br>
                            Transfer ke Rekening : <strong><i>{{\Str::upper($inisiator->rekening)}}</i></strong><br>
                            Atas Nama : <strong><i>{{\Str::upper($inisiator->nama)}}</i></strong><br>
                            Selain no rek diatas, jangan pernah melakukan transfer<br>
                            Bukti transfer maksimal 1x24 jam
                        </div>
                        <div class="col-12 form-group">
                            <input type="tel" id="nominal" name="nominal" class="form-control" placeholder="Masukan Jumlah Nominal">
                        </div>
                        <div class="col-12 form-group">
                            <textarea name="pesan" class="form-control" placeholder="Masukan Pesan anda kepada penerima donasi disini"></textarea>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12 form-group">
                            <input name="photo" type="file" onchange="loadFile(event)" accept="image/*" class="form-control" data-allowed-file-extensions='[]' data-show-preview="false">
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <img src="" id="output" stlye="max-width:10%;max-height:10%;">
                    </div>
                    <button id="tombol_bayar" onclick="handle_upload('#tombol_bayar','#form_bayar','{{route('uang-donasi.store', $campaign->id)}}','POST','Send')" class="button button-3d float-end">Kirim</button>
                </div>
            </form>
        </div>
        </div>
    </section>
    @section('custom_js')
    <script>
        ribuan('nominal');
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    @endsection
</x-donatur-layout>