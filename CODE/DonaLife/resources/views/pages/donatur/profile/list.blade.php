<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row gutter-40 col-mb-80">
                <div class="postcontent">

                    <h2>List Donasi Anda</h2>

                    <h3>Uang Donasi</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Judul Campaign</th>
                                <th>Pesan Kepada Penerima Donasi</th>
                                <th>Nominal Donasi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($uangDonasi as $i => $uang)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$uang->campaign->judul}}</td>
                                    <td>{{$uang->pesan}}</td>
                                    <td>Rp. {{number_format($uang->nominal)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h3>Paket Donasi</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Judul Campaign</th>
                                <th>Pesan Kepada Penerima Donasi</th>
                                <th>Jumlah Paket</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($paketDonasi as $i => $paket)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$paket->campaign->judul}}</td>
                                    <td>{{$paket->pesan}}</td>
                                    <td>1</td>
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