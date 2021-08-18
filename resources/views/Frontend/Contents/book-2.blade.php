@extends('Frontend.Layouts.index')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-links">
                    <a href="/"><i class="fa fa-home"></i> Home &ensp;/</a>
                    <span>{{ $version->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container content-book heed-book heed-book2">
	<div class="row">
		<div class="col-lg-9">
			<div class="main-content" style="margin-top: 25px;">
				<div class="center">
					<div class="dropdown15" style="display: block; margin-top: 10px;">
                        <button onclick="myFunction15()" class="dropbtn15">{{ $version->name }} <i class="fas fa-sort-down" style="font-size: 20px;color: #676767;" ></i></button>
                        <div id="myDropdown15" class="dropdown-content15">
							@foreach($dataViewShare['enVersions'] as $enVersion)
							<a class="@if($enVersion->id == $version->id)
											active
										  @endif
								" href="{{route('book', ['verSlug' => $enVersion->slug])}}">&raquo;&ensp; {{ $enVersion->name }}</a>
							@endforeach
                        </div>
                    </div>
					<h3 style="text-align: center;">Table of contents</h3>
				</div>
                <div class="center">
                    <img class="divider" src="{{ asset('Frontend/img/divider-content.png') }}" style="margin-top: 5px;margin-bottom: 20px;"> 
                </div>
				@foreach( $books as $key=>$book )
				<div class="row index">
					<div class="col-lg-10 col-md-9 col-sm-8 col-7" style="padding-left: 0px;overflow: hidden; 
					   white-space: nowrap;padding-left: 0px;overflow: hidden; font-size: 18px;"><a href="{{route('content', ['bookSlug' => $book->slug,'chapterSlug' => $book->chapters->first()->slug ])}}">{{$key+1}}. {{ $book->name }}</a>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-5" style="padding-right: 0px; padding-top: 10px; text-align: right;">{{count($book->chapters)}} chapters</div>
				</div>
				@endforeach
				<div class="center">
				</div>
			</div>
		</div>
		<div class="intro col-lg-3" style="margin-top: 26px;">
                <div class="row">
                    <!-- <div class="col-lg-12 app-download row">
                        <img src="{{ asset('Frontend/img/GooglePlay.png') }}" class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <img src="{{ asset('Frontend/img/AppStore.png') }}" class="col-lg-6 col-md-6 col-sm-6 col-6">
                    </div> -->
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
<script type="text/javascript">
function myFunction15() {
		document.getElementById("myDropdown15").classList.toggle("show");
	}
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content15') {
            $('#myDropdown15').removeClass('show');
        } 
    });
</script>
@endsection