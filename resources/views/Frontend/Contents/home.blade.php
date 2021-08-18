@extends('Frontend.Layouts.index')
@section('content')
</div>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @if(count($histories) > 0)
                <div class="product-history">
                    <h3><i class="fas fa-history"></i>&ensp; Recently Read</h3>
                    <div >
                        <table class="table-history col-12" id="products" style="">
                            @foreach($histories as $key=>$history)
                            @if($key < 5)
                                @if(count(json_decode($history, TRUE)) == 9)
                                <tr class="row" style="margin:0px;">
                                    <td class="col-lg-4 col-md-4 col-sm-4 col-4"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('content', ['bookSlug' => $history->book->slug,'chapterSlug' => $history->slug ])}}"><i class="fa fa-caret-right"></i>&ensp;{{ $history->name }}</a></td>
                                    <td class="updating-chapter col-lg-4 col-md-4 col-sm-4 col-4"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('content', ['bookSlug' => $history->book->slug,'chapterSlug' => $history->slug ])}}">{{ $history->book->name }}</a></td>
                                    <td class="time col-lg-4 col-md-4 col-sm-4 col-4"><p style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{ $history->book->version->name }}</p></td>
                                </tr>
                                @elseif(count(json_decode($history, TRUE)) == 10)
                                <tr class="row" style="margin:0px;">
                                    <td class="col-lg-4 col-md-4 col-sm-4 col-4"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('plan', ['type'=>$history->plan->slug, 'ver'=>$history->version->shortName, 'day'=> $history->day, 'month'=>$history->month, 'year'=>$dataViewShare['now']->year])}}"><i class="fa fa-caret-right"></i>&ensp;Ngày {{ $history->day }} tháng {{ $history->month }}</a></td>
                                    <td class="updating-chapter col-lg-4 col-md-4 col-sm-4 col-4"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('plan', ['type'=>$history->plan->slug, 'ver'=>$history->version->shortName, 'day'=> $history->day, 'month'=>$history->month, 'year'=>$dataViewShare['now']->year])}}" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;">{{ $history->plan->name }}</a></td>
                                    <td class="time col-lg-4 col-md-4 col-sm-4 col-4"><p style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;">{{ $history->version->name }}</p></td>
                                </tr>
                                @endif
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                @endif
                <div class="product-version">
                    <h3><i class="fas fa-bible"></i>&ensp; Available Bible Versions <a href="{{route('all-versions')}}" style="float: right; padding-top: 5px; color: #cc3900; font-size: 18px;">-- See All --</i></a></h3>
                    <div class="main">
                        <ul id="bk-list" class="bk-list clearfix row" style="padding-left: 0px;">
                            @foreach($dataViewShare['enVersions']->take(6) as $key=>$enVersion)
                            <li class="col-lg-4 col-md-4 col-sm-6 col-6 ">
                                <div class="bk-book book-{{$key+1}} bk-bookdefault">
                                    <div class="bk-front">
                                        <div class="bk-cover-back"></div>
                                        <div class="bk-cover">
                                            <img src="{{ asset('Frontend/img/top-left.png') }}" class="top-left">
                                            <img src="{{ asset('Frontend/img/top-right.png') }}" class="top-right">
                                            <img src="{{ asset('Frontend/img/bottom-left.png') }}" class="bottom-left">
                                            <img src="{{ asset('Frontend/img/bottom-right.png') }}" class="bottom-right">
                                            <a href="{{route('book', ['verSlug' => $enVersion->slug])}}">
                                            
                                                <h2>HOLY BIBLE</h2>
                                                <h3>
                                                    <span>{{ $enVersion->name }}</span>
                                                </h3>
                                                <p>Copyright: {{ $enVersion->publisher }}</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="bk-back">
                                        <p>{{$enVersion->infomation}}</p>
                                    </div>
                                    <div class="bk-right"></div>
                                    <div class="bk-left">
                                        <h2>
                                            <span>{{ $enVersion->publisher }}</span>
                                        </h2>
                                    </div>
                                    <div class="bk-top"></div>
                                    <div class="bk-bottom"></div>
                                </div>
                                <div class="bk-info row" style="padding-right: 15px;">
                                    <div class="col-6" style="padding-right: 0px; text-align: center;">
                                        <button onclick="" class="bk-bookback" style="width: 100%;">infor</button>
                                    </div>
                                    <div class="col-6" style="padding-right: 0px; text-align: center;">
                                        <a href="{{route('book', ['verSlug' => $enVersion->slug])}}" class="read" style="width: 100%;">Read</a>
                                    </div>
                                   <!--  <h3>
                                        <span>{{ $enVersion->infomation }}</span>
                                    </h3> -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="product-plan">
                    <h3><i class="far fa-calendar-check"></i>&ensp; Bible Reading Plans</h3>
                    <div class="row">
                        @foreach($dataViewShare['plans'] as $plan)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                            <a href="{{route('plan', ['type'=>$plan->slug, 'ver'=>$dataViewShare['defaultVersion'], 'day'=> $dataViewShare['now']->day, 'month'=>$dataViewShare['now']->month, 'year'=>$dataViewShare['now']->year])}}" class="col-12 detail-plan">&rsaquo;&ensp; {{$plan->name}} </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
                
            <div class="intro col-lg-3">
                <div class="row">
                    
                    <div class="col-lg-12 col-md-6 ">
                        <div class="website-intro">
                            <h5>What is the Bible?</h5>
                            <p>The Bible (from Koine Greek τὰ βιβλία, tà biblía, "the books") is a collection of religious texts, writings, or scriptures sacred in Judaism, Samaritanism, Christianity, Islam, Rastafarianism, and many other faiths. It appears in the form of an anthology, a compilation of texts of a variety of forms that are all linked by the belief that they are collectively revelations of God.</p>
                            <a href="{{ route('what-is-the-bible') }}">- Read more - </a>
                        </div>
                    </div>
                    <div class="col-lg-12 app-download row">
                        <img src="{{ asset('Frontend/img/GooglePlay.png') }}" class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <img src="{{ asset('Frontend/img/AppStore.png') }}" class="col-lg-6 col-md-6 col-sm-6 col-6">
                    </div>
                    <div class="col-lg-12 col-md-6 ">
                        <div class="website-intro">
                            <h5>The origin of the bible</h5>
                            <p>The English word Bible is derived from Koinē Greek: τὰ βιβλία, romanized: ta biblia, meaning "the books" (singular βιβλίον, biblion).[10] The word βιβλίον itself had the literal meaning of "scroll" and came to be used as the ordinary word for "book". It is the diminutive of βύβλος byblos, "Egyptian papyrus", possibly so called from the name of the Phoenician sea port Byblos (also known as Gebal) from whence Egyptian papyrus was exported to Greece.</p>
                            <a href="{{ route('what-is-the-bible') }}">- Read more -</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
            
    </div>
</section>
@endsection