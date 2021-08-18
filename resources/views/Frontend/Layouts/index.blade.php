<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="kinhthanh.com">
    <meta property="og:site_name" content="kinhthanh.com">
    <meta property="og:type" content="kinh thanh">
    <meta property="og:url" content="/" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
        rel="Stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('Frontend/js/jquery.ui.datepicker-vi-VN.js') }}"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
    <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}" type="text/css">

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-5">
                    <div class="header-logo">
                        <a class="navbar-brand mr-auto" href="/">
                            <img src="{{ asset('Frontend/img/logo.png') }}" alt="">
                            Bible
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 main-menu">
                    <div class="footer-header-nav row">
                        <p class="col-4" style="padding-right:0px;"><a class="active" href="/"><i class="fa fa-home"></i> Homepage</a></p>
                        <div class="dropdown row col-4">
                            <button onclick="" class="dropbtn">Daily Plan</button>
                            <div id="myDropdown" class="dropdown-content row">
                                @foreach($dataViewShare['plans'] as $plan)
                                <a href="{{route('plan', ['type'=>$plan->slug, 'ver'=>'NKJV', 'day'=> $dataViewShare['now']->day, 'month'=>$dataViewShare['now']->month, 'year'=>$dataViewShare['now']->year])}}" class="col-lg-6 col-md-6">&rsaquo;&ensp; {{$plan->name}} </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown row col-4">
                            <button onclick="" class="dropbtn">Versions</button>
                            <div id="myDropdown" class="dropdown-content row versions" style="height: 300px; overflow: auto;">
                                @foreach($dataViewShare['enVersions'] as $enVersion)
                                <a href="{{route('book', ['verSlug' => $enVersion->slug])}}" class="col-lg-12">&rsaquo;&ensp; {{ $enVersion->name }}</a>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-7 col-6 search-form">
                    <div class="form-group search">
                        <form class="search-input row" method="GET" action="">
                            <input type="text" name="book" id="book" placeholder="Search by book's name ..." class="form-control" style="color: #303030;"> 
                            <button type="submit"><i class="fa fa-search" style="color: #692409;"></i></button>  
                        </form>  
                        <div class="col-12" id="book_list"></div>
                    </div>
                </div>
                <div class="dropdown2 col-sm-1 col-xs-1 col-1" id="menu-mobile">
                    <i onclick="menuFunction()" class="fa fa-bars dropbtn2"></i>
                </div>
            </div>
            <div class="main-mobile-menu">
                <div id="myDropdown2" class="dropdown-content2">
                    <div class="container">
                        <div class="header-logo">
                            <a class="navbar-brand mr-auto" href="/" style="padding: 3px 0px;" >
                                <img src="{{ asset('Frontend/img/logo.png') }}" alt="">
                                Bible
                            </a>
                        </div>
                        <hr>
                        <p><a class="active" href="/" style="font-size: 18px;color: black;"><i class="fa fa-home" style="color: #343434;"></i>&ensp; Home</a></p>
                        <div class="dropdown3 col-12">
                            <button onclick="myFunction3()" class="dropbtn3"><i class="fas fa-bible" style="color: #343434;"></i>&ensp; Bible</button>
                            <div id="myDropdown3" class="dropdown-content3 versions">
                                @foreach($dataViewShare['enVersions'] as $enVersion)
                                <a href="{{route('book', ['verSlug' => $enVersion->slug])}}" class="col-lg-12">&rsaquo;&ensp; {{ $enVersion->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown4 col-12">
                            <button onclick="myFunction4()" class="dropbtn4" style="margin-top: 20px;" ><i class="far fa-calendar-check" style="color: #343434;"></i>&ensp; Plan</button>
                            <div id="myDropdown4" class="dropdown-content4 versions">
                                @foreach($dataViewShare['plans'] as $plan)
                                <a href="{{route('plan', ['type'=>$plan->slug, 'ver'=>$dataViewShare['defaultVersion'], 'day'=> $dataViewShare['now']->day, 'month'=>$dataViewShare['now']->month, 'year'=>$dataViewShare['now']->year])}}" class="col-lg-12">&rsaquo;&ensp; {{$plan->name}} </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- <hr style="margin-top: 5px; margin-bottom: 0px;"> -->
    <div class="main-contents">
        @yield('content')    
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row footer-menu">
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer-logo">
                        <a class="navbar-brand mr-auto" href="/">
                            <img src="{{ asset('Frontend/img/logo.png') }}" alt="">
                            Bible
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 " style="padding: 0px;">
                    <div class="footer-header-nav row">
                        <p class="col-4"><a class="active" href="/">Home</a></p>
                        <p class="col-4" style="padding:0px;"><a class="active" href="/">Bible</a></p>
                        <p class="col-4"><a class="active" href="/">Plan</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <p>
                       Copyright &copy;<script>document.write(new Date().getFullYear());</script>All rights reserved | This website is made with <i class="fa fa-heart" aria-hidden="true"></i> <a href="" target="_blank">Holy Bible</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

<script type="text/javascript">
function myFunction1() {
        document.getElementById("myDropdown1").classList.toggle("show1");
    }
    $(document).mouseup(function(e) {
        if (e.target.className != 'dropdown-content1') {
            $('#myDropdown1').removeClass('show1');
        } 
    });
</script>

<script type="text/javascript">
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn3')) {
    var dropdowns = document.getElementsByClassName("dropdown-content3");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script type="text/javascript">
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction4() {
  document.getElementById("myDropdown4").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn4')) {
    var dropdowns = document.getElementsByClassName("dropdown-content4");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

<script type="text/javascript">
const active = document.getElementById('scroll ');

// julie.scrollIntoView(true);
active.scrollIntoView({
  block: 'center',
  // block: 'start',
});
</script>
<script type="text/javascript">
const active = document.getElementById('scroll1 ');

// julie.scrollIntoView(true);
active.scrollIntoView({
  block: 'center',
  // block: 'start',
});
</script>

<script type="text/javascript">
    var Books = (function() {

    var $books = $('#bk-list > li > div.bk-book'),
        booksCount = $books.length;

    function init() {

        $books.each(function() {

            var $book = $(this),
                $other = $books.not($book),
                $parent = $book.parent(),
                $page = $book.children('div.bk-page'),
                $bookview = $parent.find('button.bk-bookview'),
                $content = $page.children('div.bk-content'),
                current = 0;

            $parent.find('button.bk-bookback').on('click', function() {

                $bookview.removeClass('bk-active');

                if ($book.data('flip')) {

                    $book.data({
                        opened: false,
                        flip: false
                    }).removeClass('bk-viewback').addClass('bk-bookdefault');

                } else {

                    $book.data({
                        opened: false,
                        flip: true
                    }).removeClass('bk-viewinside bk-bookdefault').addClass('bk-viewback');

                }

            });

        });

    }

    return {
        init: init
    };

})();

    $(function() {

    Books.init();

});
</script>
    <script type="text/javascript">
        $(document).ready(function () {   
            $('#book').on('keyup',debounce(function() {
                var query = $(this).val();
                if (query != '') {
                    $('#book_list').show();
                    $('#book_list').html('<div></div>');
                    $.ajax({
                        url:"{{ route('search') }}",
                        type:"GET",
                        data:{'book':query},
                        success:function (data) {
                            // $('input#book').css({'border-radius':'12.5px 12.5px 0px 0px'});
                            // $('input#book').css({'border-image': 'url(../img/border-search.png) 24 round'});
                            // $('input#book').css({'border': '4px solid transparent'});
                            if (data.length > 0) {
                                var string = '';
                                for (let book of data) {
                                    console.log(book);
                                    string += '<p><a href="/content/' + book.bookSlug +'/'+book.chapterSlug+'">'+ book.bookName +'</a></p>'
                                } 
                                $('#book_list').html('<div class="list-group">'+string+'</div>');
                            } else {
                                    $('#book_list').html('<div class="list-group"><p>No result</p></div>');
                            }
                        },
                    })
                } else {
                    $('input#book').css({'border-radius':'50px'});
                    $('#book_list').hide();
                }
            },500));
            $(document).on('click', 'p', function(){
                var value = $(this).text();
                $('#book').val(value);
                $('input#book').css({'border-radius':'50px'});
                $('#book_list').hide();
            });
            function debounce(func, wait, immediate) {
                var timeout;
                return function() {
                    var context = this, args = arguments;
                    var later = function() {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    };
                    var callNow = immediate && !timeout;
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                    if (callNow) func.apply(context, args);
                };
            };
        });
    </script>

    <script>
        function menuFunction() {
            $('.main-mobile-menu').toggleClass('show');
        }
        $(document).mouseup(function(e) {
            var container = $("#myDropdown2");
            if (e.target.className != 'dropdown-content2' && e.target.className != 'dropbtn3' &&   e.target.className != 'dropbtn4') {
                $('.main-mobile-menu').removeClass('show');
            }
        });
    </script>
</html>