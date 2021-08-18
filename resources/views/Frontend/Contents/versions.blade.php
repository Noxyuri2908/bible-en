@extends('Frontend.Layouts.index')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-links">
                    <a href="/"><i class="fa fa-home"></i> Home &ensp;/</a>
                    <span> available Bible versions</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<div class="product-history" style="margin-bottom: 50px;">
                <h3><i class="fas fa-bible"></i>&ensp; Available Bible Versions </h3>
                <div >
                    <table class="table-history col-12" id="products" style="">
                        @foreach($dataViewShare['enVersions'] as $enVersion)
                            <tr class="row" style="margin:0px;">
                                <td class="col-lg-6 col-md-6 col-sm-6 col-6"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('book', ['verSlug' => $enVersion->slug])}}"><i class="fa fa-caret-right"></i>&ensp;{{ $enVersion->name }}</a></td>
                                <td class="updating-chapter col-lg-6 col-md-6 col-sm-6 col-6"><a style="margin: 0px;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;" href="{{route('book', ['verSlug' => $enVersion->slug])}}">Copyright: {{ $enVersion->publisher }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
		</div>
		<div class="intro col-lg-3" style="">
                <div class="row">
                    <div class="col-lg-12 col-md-6 ">
                        <div class="website-intro">
                            <h5>What is the Bible?</h5>
                            <p>The Bible (from Koine Greek τὰ βιβλία, tà biblía, "the books") is a collection of religious texts, writings, or scriptures sacred in Judaism, Samaritanism, Christianity, Islam, Rastafarianism, and many other faiths. It appears in the form of an anthology, a compilation of texts of a variety of forms that are all linked by the belief that they are collectively revelations of God.</p>
                            <a href="{{ route('what-is-the-bible') }}">- Xem Thêm - </a>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6 ">
                        <div class="website-intro">
                            <h5>The origin of the bible</h5>
                            <p>The English word Bible is derived from Koinē Greek: τὰ βιβλία, romanized: ta biblia, meaning "the books" (singular βιβλίον, biblion).[10] The word βιβλίον itself had the literal meaning of "scroll" and came to be used as the ordinary word for "book". It is the diminutive of βύβλος byblos, "Egyptian papyrus", possibly so called from the name of the Phoenician sea port Byblos (also known as Gebal) from whence Egyptian papyrus was exported to Greece.</p>
                            <a href="{{ route('what-is-the-bible') }}">- Xem Thêm -</a>
                        </div>
                    </div>
                    
                </div>
        </div>
	</div>
</div>
@endsection