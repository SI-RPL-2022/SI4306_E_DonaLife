<x-donatur-layout title="Home">
    <section id="page-title">

        <div class="container clearfix">
            <h1>Uang Campaign</h1>
        </div>

    </section><!-- #page-title end -->
    
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <!-- Shop
                ============================================= -->
                <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">
                    @foreach($uangCampaign as $uc)
                    @php
                         $totalDonasi = \DB::table('uang_donasi')->where('campaign_uang_id',$uc->id)->sum('nominal');
                    @endphp
                        <div class="product col-6 col-sm-12 col-lg-6">
                            <div class="grid-inner row g-0">
                                <div class="product-image col-lg-4 col-xl-3">
                                    <a href="{{route('uang-campaign.show',$uc->id)}}"><img src="{{$uc->image}}"></a>
                                    <a href="{{route('uang-campaign.show',$uc->id)}}"><img src="{{$uc->image}}"></a>
                                    @if($uc->status == 'mengumpulkan')
                                        <div class="sale-flash badge bg-secondary p-2">{{$uc->status}}</div>
                                    @elseif($uc->status == 'disalurkan')
                                        <div class="sale-flash badge bg-success p-2">{{$uc->status}}</div>
                                    @endif
                                </div>
                                <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                                    <div class="product-title"><h3><a href="{{route('uang-campaign.show',$uc->id)}}">{{$uc->judul}}</a></h3></div>
                                    <div class="product-price">Target Donasi : <ins>Rp. {{number_format($uc->target_nominal)}}</ins></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width:{{($totalDonasi / $uc->target_nominal)*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax=""></div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="product-price">Terkumpul : <ins>Rp. {{number_format($totalDonasi)}}</ins></div>
                                    <p class="mt-3 d-none d-lg-block">{{$uc->deskripsi}}</p>
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
            <h1>Barang Campaign</h1>
        </div>

    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">

                    @foreach($barangCampaign as $bc)
                        <div class="product col-6 col-sm-12 col-lg-6">
                            <div class="grid-inner row g-0">
                                <div class="product-image col-lg-4 col-xl-3">
                                    <a href="{{route('barang-campaign.show',$bc->id)}}"><img src="{{$bc->image}}"></a>
                                    <a href="{{route('barang-campaign.show',$bc->id)}}"><img src="{{$bc->image}}"></a>
                                    @if($bc->status == 'mengumpulkan')
                                        <div class="sale-flash badge bg-secondary p-2">{{$bc->status}}</div>
                                    @elseif($bc->status == 'disalurkan')
                                        <div class="sale-flash badge bg-primary p-2">{{$bc->status}}</div>
                                    @endif
                                </div>
                                <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                                    <div class="product-title"><h3><a href="{{route('barang-campaign.show',$bc->id)}}">{{$bc->judul}}</a></h3></div>
                                    <div class="product-price"> 
                                        Paket Yang Tersedia: <br>
                                            @foreach($bc->paket as $paket)
                                                <br> <ins>{{$paket->nama_paket}} => </ins> {!!$paket->deskripsi!!} <br> 
                                             @endforeach
                                        </div>
                                    <p class="mt-3 d-none d-lg-block">{{$bc->deskripsi}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

</x-donatur-layout>