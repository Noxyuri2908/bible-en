@extends('Frontend.Layouts.index')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-links">
                    <a href="/"><i class="fa fa-home"></i> Home &ensp;/</a>
                    <span> Holy Bible and the origin of the bible</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-9 infomation">
			<h3>Holy Bible and the origin of the bible.</h3>
			<!-- <img src="{{ asset('Frontend/img/chua.png') }}" style="width: 100%;"> -->
			<p style="font-weight: 600;">
				The Bible (from Koine Greek τὰ βιβλία, tà biblía, "the books") is a collection of religious texts, writings, or scriptures sacred in Judaism, Samaritanism, Christianity, Islam, Rastafarianism, and many other faiths. 
			</p>
			<p>It appears in the form of an anthology, a compilation of texts of a variety of forms that are all linked by the belief that they are collectively revelations of God. These texts include theologically-focused historical accounts, hymns, prayers, proverbs, parables, didactic letters, admonitions, essays, poetry, and prophecies. Believers also generally consider the Bible to be a product of divine inspiration.</p>
			<p>
				Those books that are included in the Bible by a tradition or group are called canonical, indicating that the tradition/group views the collection as the true representation of God's word and will. A number of biblical canons have evolved, with overlapping and diverging contents from denomination to denomination. The Hebrew Bible shares most of its content with its ancient Greek translation, the Septuagint, which in turn was the base for the Christian Old Testament. The Christian New Testament is a collection of writings by early Christians, believed to be Jewish disciples of Christ, written in 1st-century Koine Greek. Among Christian denominations there is some disagreement about what should be included in the canon, primarily about the biblical apocrypha, a list of works that are regarded with varying levels of respect or recognition.
			</p>
			<p>
				Attitudes towards the Bible also differ among Christian groups. Roman Catholics, High Church Anglicans, Methodists and Eastern Orthodox Christians stress the harmony and importance of both the Bible and sacred tradition, while many Protestant churches focus on the idea of sola scriptura, or scripture alone. This concept rose to prominence during the Reformation, and many denominations today support the use of the Bible as the only infallible source of Christian teaching. Others, though, advance the concept of prima scriptura in contrast, meaning scripture primarily or scripture mainly.
			</p>
			<p>
				The Bible has had a profound influence on literature and history, especially in the Western world, where the Gutenberg Bible was the first book printed using movable type. According to the March 2007 edition of Time, the Bible "has done more to shape literature, history, entertainment, and culture than any book ever written. Its influence on world history is unparalleled, and shows no signs of abating."[4] With estimated total sales of over five billion copies, it is widely considered to be the best-selling book of all time.As of the 2000s, it sells approximately 100 million copies annually.
			</p>
			<p>
				The English word Bible is derived from Koinē Greek: τὰ βιβλία, romanized: ta biblia, meaning "the books" (singular βιβλίον, biblion). The word βιβλίον itself had the literal meaning of "scroll" and came to be used as the ordinary word for "book". It is the diminutive of βύβλος byblos, "Egyptian papyrus", possibly so called from the name of the Phoenician sea port Byblos (also known as Gebal) from whence Egyptian papyrus was exported to Greece.
			</p>
			<p>
				By the 2nd century BCE, Jewish groups began calling the books of the Bible the "scriptures" and they referred to them as "holy", or in Hebrew כִּתְבֵי הַקֹּדֶשׁ (Kitvei hakkodesh), and Christians now commonly call the Old and New Testaments of the Christian Bible "The Holy Bible" (in Greek τὰ βιβλία τὰ ἅγια, tà biblía tà ágia) or "the Holy Scriptures" (η Αγία Γραφή, e Agía Graphḗ).
			</p>
			<p>
				The Greek ta biblia (lit. "little papyrus books") was "an expression Hellenistic Jews used to describe their sacred books" (the Septuagint). Christian use of the term can be traced to c. 223 CE. The biblical scholar F. F. Bruce notes that Chrysostom appears to be the first writer (in his Homilies on Matthew, delivered between 386 and 388) to use the Greek phrase ta biblia ("the books") to describe both the Old and New Testaments together.
			</p>
			<p>
				Medieval Latin biblia is short for biblia sacra "holy book", while biblia in Greek and Late Latin is neuter plural (gen. bibliorum). It gradually came to be regarded as a feminine singular noun (biblia, gen. bibliae) in medieval Latin, and so the word was loaned as singular into the vernaculars of Western Europe. Latin biblia sacra "holy books" translates Greek τὰ βιβλία τὰ ἅγια tà biblía tà hágia, "the holy books".
			</p>
		</div>
		<div class="col-lg-3 row sidebar-info" style="padding-right: 0px; height: fit-content;">
			<div class="version-sidebar col-lg-12 col-md-6 col-sm-12">
				<div class="website-intro">
                    <div class="plan-info" style="height: 690px; overflow: auto;">
                    	<h5 class="col-12" style="margin-top: 10px; margin-bottom: 0px; font-size: 20px; font-weight:600;">Available Versions</h5>

						@foreach($dataViewShare['enVersions'] as $enVersion)
						<div class="col-12">
			                <a href="{{route('book', ['verSlug' => $enVersion->slug])}}" class="detail-plan-info">&rsaquo;&ensp; {{ $enVersion->name }}</a>
			            </div>
			            @endforeach  
					</div>
                </div>
				
			</div>
			<div class="plan-sidebar col-lg-12 col-md-6 col-sm-12">
				<div class="plan-info">
					<h5 class="col-12" style="margin-top: 10px; margin-bottom: 0px; font-size: 20px; font-weight:600;">Daily Plans</h5>
					@foreach($dataViewShare['plans'] as $plan)
					<div class="col-12">
		                <a href="{{route('plan', ['type'=>$plan->slug, 'ver'=>$dataViewShare['defaultVersion'], 'day'=> $dataViewShare['now']->day, 'month'=>$dataViewShare['now']->month, 'year'=>$dataViewShare['now']->year])}}" class="detail-plan-info">&rsaquo;&ensp; {{$plan->name}} </a>
		            </div>
		            @endforeach
				</div>
			</div>					
		</div>
	</div>
</div>
@endsection