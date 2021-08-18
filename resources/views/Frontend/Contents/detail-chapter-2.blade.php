@extends('Frontend.Layouts.index')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-links">
                    <a href="/"><i class="fa fa-home"></i> Home &ensp;/</a>
                    <a href="{{route('book', ['verSlug' => $version->slug])}}"> {{ $version->name }} &ensp;/</a>
                    <span>{{ $chapter->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container content-book content-book2">
	<div class="row mobile-sidebar">
	</div>
	<div class="row" style="justify-content: center;">
		<!-- <div class="col-lg-2"></div> -->
		<div class="col-lg-12">
			<!--<div class="auto-left" style="text-align: left;" >-->
			<!--	<a href="{{route('content', ['bookSlug' => $previous->book->slug, 'chapterSlug' => $previous->slug])}}" class="button left" style="margin-right: 0px;" >&laquo;</a>-->
			<!--</div>-->
			<!--<div class="auto-right" style="text-align: right;" >-->
			<!--	<a href="{{route('content', ['bookSlug' => $next->book->slug, 'chapterSlug' => $next->slug])}}" class="button right">&raquo;</a>-->
			<!--</div>-->
			<div class="top"></div>
			<div class="main-content">
				<div class="mobile-pagination col-12 row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="padding: 0px;">
						<div class="dropdown10">
		                    <button onclick="myFunction10()" class="dropbtn10">{{ $version->name }} &ensp;<i class="fas fa-angle-down" style="font-size: 15px;color: #676767;" ></i></button>
		                    <div id="myDropdown10" class="dropdown-content10" style="left: 0;">
		                    	@foreach($versions as $key=>$ver)
								<a class="@if($ver->id == $version->id)
											active
										  @endif
								" href="{{route('content', ['bookSlug' => $ver->books->where('category', $book->category)->first()->slug, 'chapterSlug' => $ver->books->where('category', $book->category)->first()->chapters[$offset]->slug])}}">&raquo;&ensp; {{ $ver->name }}</a>
								@endforeach
		                    </div>
		                </div>
					</div>&ensp;
					<div class="col-lg-6 col-md-6 col-sm-12 col-12 mobile-sidebar">
						<div class="dropdown7">
	                        <button onclick="myFunction7()" class="dropbtn7">{{ $chapter->book->name }} &ensp;<i class="fas fa-angle-down" style="font-size: 15px;color: #676767;" ></i></button>
	                        <div id="myDropdown7" class="dropdown-content7">
	                            @foreach($books as $book)
								<a id="@if($book->id == $chapter->book_id)scroll1 @endif"  class="@if($book->id == $chapter->book_id)active
								  @endif
								" href="{{route('content', ['bookSlug' => $book->slug, 'chapterSlug' => $book->chapters->first()->slug])}}">&raquo;&ensp; </i> {{ $book->name }}</a>
								@endforeach
	                        </div>
	                    </div>
					</div>
				</div>
				<!-- <img src="{{ asset('Frontend/img/divider11.png') }}"> -->
				<div class="dropdown1">
                    <button onclick="myFunction1()" class="dropbtn1"><h3 style="margin-top: 0px;">{{ $chapter->name }} <i class="fas fa-angle-down" style="font-size: 20px;color: #676767;" ></i></h3></button>
                    <div id="myDropdown1" class="dropdown-content1 row">
                    	@php
                    		$dem = 1;
                    	@endphp
                    	@foreach($chapters as $value)
                        <a href="{{route('content', ['bookSlug' => $value->book->slug, 'chapterSlug' => $value->slug])}}" class="@if($chapter->id == $value->id)
													active
												@endif
			                                	">Chương {{ $dem++}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="center">
                    <img class="divider" src="{{ asset('Frontend/img/divider-content.png') }}">
                </div>
                <p></p>
                @if($contents != null)
				@foreach($contents as $content)
					@if($content->title != '')
					<h5>{{ $content->title }}</h5>
					@endif
					<span>
						<sup>{{ $content->id }}</sup>
						{!! html_entity_decode($content->content) !!}
					</span>
				@endforeach
				@else
					<h5 class="none-content" style="text-align: center; padding-top: 50px;" >Unavailable Bible Contents</h5>
				@endif
				 <div class="center">
					<div class="pagination">
						<a href="{{route('content', ['bookSlug' => $previous->book->slug, 'chapterSlug' => $previous->slug])}}" class="button">&laquo;</a>&ensp;&ensp;
						<a href="{{route('content', ['bookSlug' => $next->book->slug, 'chapterSlug' => $next->slug])}}" class="button">&raquo;</a>
					</div>
				</div>
			</div>
			<div class="bot"></div>
		</div>
		<!-- <div class="col-lg-3">
			<div class="sidebar">
				<ul>
					@foreach($books as $book)
					<li><a id="@if($book->id == $chapter->book_id)scroll @endif"  class="@if($book->id == $chapter->book_id)active
								  @endif
						" href="{{route('content', ['bookSlug' => $book->slug, 'chapterSlug' => $book->chapters->first()->slug])}}">&raquo;&ensp; </i> {{ $book->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div> -->
		
	</div>
</div>
<script type="text/javascript">
function myFunction6() {
		document.getElementById("myDropdown6").classList.toggle("show");
	}
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content6') {
            $('#myDropdown6').removeClass('show');
        } 
    });
</script>
<script type="text/javascript">
    function myFunction7() {
		document.getElementById("myDropdown7").classList.toggle("show");
	}
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content7') {
            $('#myDropdown7').removeClass('show');
        } 
    });
</script>

<script>
    function myFunction10() {
			document.getElementById("myDropdown10").classList.toggle("show");
	}
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content10') {
            $('#myDropdown10').removeClass('show');
        } 
    });
</script>

<!-- <script type="text/javascript">
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction10() {
  document.getElementById("myDropdown10").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn10')) {
    var dropdowns = document.getElementsByClassName("dropdown-content10");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script> -->
@endsection