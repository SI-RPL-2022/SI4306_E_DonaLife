<x-donatur-layout title="Request Campaign">
    <section id="page-title">
        <div class="container clearfix">
            <h1>Berita Donasi Uang</h1>
        </div>

    </section>
        
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row col-mb-50">
                    @foreach($beritaUang as $berita1)
                    <div class="col-md-6">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <img src="{{$berita1->image}}" alt="Why choose Us?">
                            </div>
                            <div class="fbox-content px-0">
                                <h2>{{$berita1->campaignUangId->judul}} <br> <span class="subtitle">Donasi Terkumpul : <i>Rp. {{number_format($nominalDonasi)}}</i> </span></h2>
                                <h3> Inisiator : {{$berita1->campaignUangId->inisiator->nama}}</h3>
                                <p>{{$berita1->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>

    <section id="page-title">
        <div class="container clearfix">
            <h1>Berita Donasi Barang</h1>
        </div>

    </section>
        
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row col-mb-50">
                    @foreach($beritaBarang as $berita2)
                    <div class="col-md-6">
                        <div class="feature-box media-box">
                            <div class="fbox-media">
                                <img src="{{$berita2->image}}" alt="Why choose Us?">
                            </div>
                            <div class="fbox-content px-0">
                                <h2>{{$berita2->campaignBarangId->judul}} <br> <span class="subtitle">Donasi Terkumpul : <i>{{$paketDonasi}}</i> Paket </span></h2>
                                <h3> Inisiator : {{$berita2->campaignBarangId->inisiator->nama}}</h3>
                                <p>{{$berita2->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </section>
        
</x-donatur-layout>