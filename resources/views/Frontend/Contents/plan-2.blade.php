@extends('Frontend.Layouts.index')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-links">
                    <a href="/"><i class="fa fa-home"></i> Home &ensp;/</a>
                    <span> Kế Hoạch &ensp;/</span>
                    <span>{{$plan->name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container content-book plan plan2">
	<div class="row" style="justify-content: center;">
		<div class="col-lg-12">
			<!--<div class="auto-left" style="text-align: left;" >-->
			<!--	<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$previousDay, 'month'=>$previousMonth, 'year'=>$year])}}" class="button left">&laquo;</a>-->
			<!--</div>-->
			<!--<div class="auto-right" style="text-align: right;" >-->
			<!--	<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$nextDay, 'month'=>$nextMonth, 'year'=>$year])}}" class="button right">&raquo;</a>-->
			<!--</div>-->
			<div class="top"></div>
			<div class="main-content">
				<div class="center">
					<div class="dropdown5" style="display: block;">
                        <button onclick="myFunction5()" class="dropbtn5">{{ $version->name }} <i class="fas fa-sort-down" style="font-size: 20px;color: #676767;" ></i></button>
                        <div id="myDropdown5" class="dropdown-content5">
                            @foreach($versions as $value)
							<a class="@if($value->id == $version->id)
										active
									  @endif
							" href="{{route('plan', ['type'=>$type, 'ver'=>$value->shortName, 'day'=>$day, 'month'=>$month, 'year'=>$year])}}"><i class="fas fa-angle-right"></i> {{ $value->name }}</a>
							@endforeach
                        </div>
                    </div>
					<div class="pagination plan-pagination">
						<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$previousDay, 'month'=>$previousMonth, 'year'=>$year])}}" class="button"><i class="fas fa-angle-left"></i></a>&ensp;
						<input value="{{$month}}/{{$day}}/{{$year}}" type="text" id="txtDate" name="SelectedDate" value="" readonly="readonly" />&ensp;
						<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$nextDay, 'month'=>$nextMonth, 'year'=>$year])}}" class="button"><i class="fas fa-angle-right"></i></a>
					</div>
				</div>
                <div class="center">
                    <img class="divider" src="{{ asset('Frontend/img/divider-content.png') }}">
                </div>
				@if(count($contents) != 0)
				@foreach( $contents as $content )
				<h3 style="text-align: center;">{{ $content['chapterName'] }}</h3>
					@foreach($content['chapterContent'] as $chapterContent)
					@if($chapterContent->title != '')
					<h5>{{ $chapterContent->title }}</h5>
					@endif
					<span>
						<sup>{{ $chapterContent->id }}</sup>
						{!! html_entity_decode($chapterContent->content) !!}
					</span>
					@endforeach
				@endforeach
				@else 
					<h5 class="none-content" style="text-align: center; padding-top: 50px;" >Unavailable Bible Contents</h5>
				@endif
				<div class="center">
					<div class="pagination plan-pagination">
						<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$previousDay, 'month'=>$previousMonth, 'year'=>$year])}}" class="button"><i class="fas fa-angle-left"></i> </a>&ensp;&ensp;
						<a href="{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$nextDay, 'month'=>$nextMonth, 'year'=>$year])}}" class="button"> <i class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>
			<div class="bot"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
        $(function () {
            $("#txtDate").datepicker({
                changeMonth: true,
                changeYear: true,
                todayHighlight: true,
                onSelect: function (dateString, txtDate) {
                    var date = $(this).datepicker('getDate'),
                        day  = date.getDate(),  
                        month = date.getMonth(),              
                        year =  date.getFullYear();
                    var link = "{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$previousDay, 'month'=>$previousMonth, 'year'=>$year])}}";
                    var array = link.split("/");
                    var type = array[4];
                    var ver = array[5];
                    window.location = "http://kinhthanh.truyenapp.com/plan/"+type+"/"+ver+"/"+dateString;
                }
            });
        });
</script>
<script type="text/javascript">
        $(function () {
            $("#Date").datepicker({
                changeMonth: true,
                changeYear: true,
                todayHighlight: true,
                onSelect: function (dateString, txtDate) {
                    var date = $(this).datepicker('getDate'),
                        day  = date.getDate(),  
                        month = date.getMonth(),              
                        year =  date.getFullYear();
                    var link = "{{route('plan', ['type'=>$type, 'ver'=>$ver, 'day'=>$previousDay, 'month'=>$previousMonth, 'year'=>$year])}}";
                    var array = link.split("/");
                    var type = array[4];
                    var ver = array[5];
                    window.location = "http://kinhthanh.truyenapp.com/plan/"+type+"/"+ver+"/"+dateString;
                }
            });
        });
</script>

<script type="text/javascript">
function myFunction5() {
		document.getElementById("myDropdown5").classList.toggle("show");
	}
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content5') {
            $('#myDropdown5').removeClass('show');
        } 
    });
</script>
@endsection