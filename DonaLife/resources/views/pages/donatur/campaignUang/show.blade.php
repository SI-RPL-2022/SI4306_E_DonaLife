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
                                                <div class="slide" data-thumb="{{$uangCampaign->image}}"><a href="{{$uangCampaign->image}}" title="Pink Printed Dress - Back View" data-lightbox="gallery-item"><img src="{{$uangCampaign->image}}" alt="Pink Printed Dress"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($uangCampaign->status == 'mengumpulkan')
                                        <div class="sale-flash badge bg-secondary p-2">{{$uangCampaign->status}}</div>
                                    @elseif($uangCampaign->status == 'disalurkan')
                                        <div class="sale-flash badge bg-success p-2">{{$uangCampaign->status}}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 product-desc">

                                <div class="product-title">
                                    <h3>
                                       {{$uangCampaign->judul}}
                                    </h3>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="product-price"> Target Donasi : <ins>Rp. {{number_format($uangCampaign->target_nominal)}}</ins></div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$totalDonasi != 0 ? ($totalDonasi / $uangCampaign->target_nominal)*100 : 1}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax=""></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="product-price"> Donasi Terkumpul : <ins>Rp. {{number_format($totalDonasi)}}</ins></div>
                                </div>

                                <div class="line"></div>

                                
                                <form class="cart mb-0 d-flex justify-content-between align-items-center" >
                                    <div class="quantity ">
                                        @php
                                             $banyakOrangDonasi = \DB::table('uang_donasi')->where('campaign_uang_id',$uangCampaign->id)->count();
                                        @endphp
                                       <input type="text" name="quantity" value="{{$banyakOrangDonasi;}} Donasi" class="form-control" disabled/>
                                    </div>
                                    @if($uangCampaign->status == 'mengumpulkan')
                                        @guest
                                            <a href="{{route('auth.index')}}" class="add-to-cart button m-0">Donasi Sekarang</a>
                                        @endguest
                                        @auth
                                            <a  href="{{route('uang-donasi.create', $uangCampaign->id)}}" class="add-to-cart button m-0">Donasi Sekarang</a>
                                        @endauth
                                    @endif
                                </form>

                                <div class="line"></div>
                                <p>{{$uangCampaign->deskripsi}}</p>
                                
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
                                                    <div class="comment-author">{{$uangCampaign->inisiator->nama}}<i class="icon-ok" style="color:blue;"></i><span><a title="Permalink to this comment">Bergabung pada {{$uangCampaign->inisiator->created_at->format('Y-m-d')}}</a></span></div>
                                                    <p> 
                                                        <i>Menggalang utnuk <a>#{{$uangCampaign->judul}}</a> </i>
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
                                            <p>{{$uangCampaign->deskripsi}}
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
                                                                      Rp. {{number_format($data->nominal)}}
                                                                    </div>
                                                                </div>

                                                                <div class="clear"></div>

                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ol>

                                                <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="row mb-0" id="template-reviewform" name="template-reviewform" action="#" method="post">

                                                                    <div class="col-6 mb-3">
                                                                        <label for="template-reviewform-name">Name <small>*</small></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-text"><i class="icon-user"></i></div>
                                                                            <input type="text" id="template-reviewform-name" name="template-reviewform-name" value="" class="form-control required" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6 mb-3">
                                                                        <label for="template-reviewform-email">Email <small>*</small></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-text">@</div>
                                                                            <input type="email" id="template-reviewform-email" name="template-reviewform-email" value="" class="required email form-control" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-100"></div>

                                                                    <div class="col-12 mb-3">
                                                                        <label for="template-reviewform-rating">Rating</label>
                                                                        <select id="template-reviewform-rating" name="template-reviewform-rating" class="form-select">
                                                                            <option value="">-- Select One --</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="w-100"></div>

                                                                    <div class="col-12 mb-3">
                                                                        <label for="template-reviewform-comment">Comment <small>*</small></label>
                                                                        <textarea class="required form-control" id="template-reviewform-comment" name="template-reviewform-comment" rows="6" cols="30"></textarea>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

                        @foreach($allUangCampaign as $data)
                        @php
                            $donasiTotal =  \DB::table('uang_donasi')->where('campaign_uang_id',$data->id)->sum('nominal');
                        @endphp
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">
                                        <a href="{{route('uang-campaign.show',$data->id)}}"><img src="{{$data->image}}"></a>
                                        <a href="{{route('uang-campaign.show',$data->id)}}"><img src="{{$data->image}}"></a>
                                        <div class="badge bg-success p-2">{{$data->status}}</div>
                                        {{-- <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                                                <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>
                                                <a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div> --}}
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title"><h3><a href="#">{{$data->judul}}</a></h3></div>
                                        <div class="product-price">Target Donasi : <ins>Rp. {{number_format($data->target_nominal)}}</ins></div>
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width:{{($donasiTotal / $data->target_nominal)*100}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax=""></div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-price"> Donasi Terkumpul : <ins>Rp. {{number_format($donasiTotal)}}</ins></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->
</x-donatur-layout>