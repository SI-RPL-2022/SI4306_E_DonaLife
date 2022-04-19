<x-donatur-layout title="Uang Campaign">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-product">
                    <div class="product">
                        <div class="row gutter-40">

                            <div class="col-md-5">
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap" data-lightbox="gallery">
                                                <div class="slide" data-thumb="{{$barangCampaign->image}}"><a href="{{$barangCampaign->image}}" title="Pink Printed Dress - Back View" data-lightbox="gallery-item"><img src="{{$barangCampaign->image}}" alt="Pink Printed Dress"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($barangCampaign->status == 'mengumpulkan')
                                        <div class="sale-flash badge bg-secondary p-2">{{$barangCampaign->status}}</div>
                                    @elseif($barangCampaign->status == 'disalurkan')
                                        <div class="sale-flash badge bg-success p-2">{{$barangCampaign->status}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 product-desc">

                                <div class="product-title">
                                    <h3>
                                       {{$barangCampaign->judul}}
                                    </h3>
                                </div>

                                <div class="line"></div>

                                
                                <form class="cart mb-0 d-flex justify-content-between align-items-center" >
                                    <div class="quantity ">
                                        @php
                                             $banyakOrangDonasi = \DB::table('paket_donasi')->where('campaign_barang_id',$barangCampaign->id)->count();
                                        @endphp
                                       <input type="text" name="quantity" value="{{$banyakOrangDonasi;}} Donasi" class="form-control" disabled/>
                                    </div>
                                    @if($barangCampaign->status == 'mengumpulkan')
                                        @guest
                                            <a href="{{route('auth.index')}}" class="add-to-cart button m-0">Donasi Sekarang</a>
                                        @endguest
                                        @auth
                                            <a  href="{{route('paket-donasi.create', $barangCampaign->id)}}" class="add-to-cart button m-0">Donasi Sekarang</a>
                                        @endauth
                                    @endif
                                </form>

                                <div class="line"></div>
                                <strong>Deskripsi:</strong>
                                <p>{{$barangCampaign->deskripsi}}</p>
                                
                                <div class="line w-100"></div>

                                <div class="line"></div>
                                <b>
                                    <p>Paket Yang Tersedia Dan Dibutuhkan : </p>
                                </b>
                                @foreach($barangCampaign->paket as $paket)
                                    <p>{{ $paket->nama_paket }}</p>
                                    <ins>
                                        <p>{!! $paket->deskripsi !!}</p>
                                    </ins>                                    
                                @endforeach
                                <div class="line w-100"></div>

                                <div id="reviews" class="clearfix">

                                    <ol class="commentlist clearfix">

                                        <div class="comment-author"><i>Inisiator</i></div>
                                        <li class="comment even thread-even depth-1" id="li-comment-1">
                                            <div id="comment-1" class="comment-wrap clearfix">
                                                
                                                <div class="comment-meta">
                                                    <div class="comment-author vcard">
                                                        <span class="comment-avatar clearfix">
                                                        <img alt='Image' src='{{'https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60'}}' height='60' width='60' /></span>
                                                    </div>
                                                </div>
                                                <div class="comment-content clearfix">
                                                    <div class="comment-author">{{$barangCampaign->inisiator->nama}}<i class="icon-ok" style="color:blue;"></i><span><a title="Permalink to this comment">Bergabung pada {{$barangCampaign->inisiator->created_at->format('Y-m-d')}}</a></span></div>
                                                    <p> 
                                                        <i>Menggalang untuk <a>#{{$barangCampaign->judul}}</a> </i>
                                                    </p>
                                                </div>

                                                <div class="clear"></div>

                                            </div>
                                        </li>

                                    </ol>

                                </div>

                                <div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
                                    <span>Share:</span>
                                    <div>
                                        <a href="#" class="social-icon si-borderless si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus">
                                            <i class="icon-gplus"></i>
                                            <i class="icon-gplus"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-email3">
                                            <i class="icon-email3"></i>
                                            <i class="icon-email3"></i>
                                        </a>
                                    </div>
                                </div>


                            </div>

                            <div class="w-100"></div>

                            <div class="col-12 mt-5">

                                <div class="tabs clearfix mb-0" id="tab-1">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Description</span></a></li>
                                        <li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Histori </span></a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <p>{{$barangCampaign->deskripsi}}
                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">

                                                <ol class="commentlist clearfix">


                                                    @foreach($donator as $data)
                                                        <li class="comment even thread-even depth-1" id="li-comment-1">
                                                            <div id="comment-1" class="comment-wrap clearfix">

                                                                <div class="comment-meta">
                                                                    <div class="comment-author vcard">
                                                                        <span class="comment-avatar clearfix">
                                                                        <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                                                    </div>
                                                                </div>

                                                                <div class="comment-content clearfix">
                                                                    <div class="comment-author">{{\Str::of($data->donatur->nama)->limit(5)}}<span><a href="#" title="Permalink to this comment">{{$data->created_at->format('Y-m-d H:i:s')}}</a></span></div>
                                                                    <p>{{$data->pesan}}</p>
                                                                    <div class="review-comment-ratings">
                                                                      1 Paket
                                                                    </div>
                                                                </div>

                                                                <div class="clear"></div>

                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ol>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="w-100">

                    <h4>Campaign Lain nya</h4>

                    <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                        @foreach($allBarangCampaign as $data)
                        @php
                            $donasiTotal =  \DB::table('uang_donasi')->where('campaign_uang_id',$data->id)->sum('nominal');
                        @endphp
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">
                                        <a href="{{route('barang-campaign.show',$data->id)}}"><img src="{{$data->image}}"></a>
                                        <a href="{{route('barang-campaign.show',$data->id)}}"><img src="{{$data->image}}"></a>
                                        <div class="badge bg-success p-2">{{$data->status}}</div>
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title"><h3><a href="#">{{$data->judul}}</a></h3></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
</x-donatur-layout>