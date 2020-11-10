<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="img/header.jpeg">
    <div class="overlay-bg overlay"></div>
    <div class="container">
        <div class="row fullscreen justify-content-lg-end">
            <div class="banner-content col-lg-7">
                <h1>
                    세계 모든 어린이가    <br>
                    행복해지는 그 날까지
                </h1>
                <h4>더 나은 세상 위하여</h4>
                <a href="index.php?page=3" class="primary-btn">
                    함께하기
                    <i class="ti-angle-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================ End banner Area =================-->
<?php
include 'cookie.php';
?>
<style>
    /*#coco{*/
    /*    margin-left: 0px; margin-right: 0px;*/
    /*}*/
</style>
<!--================ Start About Area =================-->
<section class="about_area lite_bg">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-5">
                <div class="about_details lite_bg">
                    <h2>어린이가 살기 좋은 <br>
                        세상은 모두가 살기  <br>
                        좋은 세상입니다</h2>
                    <p class="top_text">
                        다굶주림 없는 세상, 더불어 사는 세상을 만들기 위해 전문사회복지사업과 국제개발협력사업을 활발히 수행하고 있습니다.
                    </p>
                    <p class="mb-0">
                        전문적인 구호개발사업을 활발히 수행하며 사업 규모와 역량 측면에서도 유수의 국제 NGO와 어깨를 나란히 하는 글로벌 NGO로 성장했습니다.
                        2011년에는 국내 NGO 최초로 유엔세계식량계획(WFP)의 공식 파트너 기관으로 선정되는 등 UN 기구와의 글로벌 네트워크를 기반으로, 국제사회에서
                        민간외교의 역할을 주도해나가며 대한민국을 대표하는 NGO로서 좋은 변화를 이끌어가고 있습니다.
                    </p>
                    <!--						<a href="#" class="primary-btn mt-5">-->
                    <!--							자세히-->
                    <!--							<i class="ti-angle-right ml-1"></i>-->
                    <!--						</a>-->

                    <div class="active-brand-carusel">
                        <div class="single-brand">
                            <img class="mx-auto w-auto" src="img/brands/dd.PNG" alt="">
                        </div>
                        <div class="single-brand">
                            <img class="mx-auto w-auto" src="img/brands/g.PNG" alt="">
                        </div>
                        <div class=" single-brand">
                            <img class="mx-auto w-auto" src="img/brands/ss.PNG" alt="">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-3 col-md-6 offset-md-1 d-lg-block d-none">
                <div class="about_right">
                    <div class="video-inner justify-content-center align-items-center d-flex">
                        <a id="play-home-video" class="video-play-button"
                           href="https://www.youtube.com/watch?v=tEq2VM0-I_M">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="about_bg d-lg-block d-none"></div>
    </div>
</section>
<!--================ End About Area =================-->

<!--================ Start Features Area =================-->
<section class="features-area section-gap-top">
    <div class="container" id="coco">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2> <span>함께 하는 방법 </span> </h2>
                </div>
            </div>
        </div>
        <div class="row feature_inner">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <i class="fi flaticon-compass"></i>
                    <h4>후원하기</h4>
                    <p>누구나 한 걸음부터 시작합니다. 후원자분들의 작은 정성이 모여 수많은 어린이 구호 활동을
                        펼쳤습니다. 함께하는 나눔의 첫걸음, 모이면 기적이 만들어집니다.</p>
                    <a href="index.php?page=3" class="primary-btn2">자세히</a>
                </div>
            </div>
            <div class="col-lg-8">
<!--                <div class="feature-item">-->
<!--                    <i class="fi flaticon-desk"></i>-->
                    <div class="col-12">
                        <h2 class="contact-title">희망의 메세지</h2>

                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form"  method="post" id="contactForm" onsubmit="return false;"
                              novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                          placeholder="희망의 메세지를 전해주세요"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text"
                                               placeholder="보내는 사람">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email"
                                               placeholder="이메일">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text"
                                               placeholder="제목">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2 mb-5 mb-rg-0">
                                <button type="submit" class="button button-contactForm primary-btn">메세지 보내기</button>
                            </div>
                        </form>
<!--                    <h4>Give Inspiration</h4>-->
<!--                    <p>Multiply is rule light dominion given midst a living i set every bring also of rule Set light fifth best-->
<!--                        bearing.</p>-->
<!--                    <a href="#" class="primary-btn2">Learn more</a>-->
                </div>
            </div>
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="feature-item">-->
<!--                    <i class="fi flaticon-bathroom"></i>-->
<!--                    <h4>Become Bolunteer</h4>-->
<!--                    <p>Multiply is rule light dominion given midst a living i set every bring also of rule Set light fifth best-->
<!--                        bearing.</p>-->
<!--                    <a href="#" class="primary-btn2">Learn more</a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script> // 글,제목,이름 데이터 저장

    $(document).ready(function () {

        $('#contactForm').submit(function (e) {

            let name = document.getElementById("name").value;
            let message = document.getElementById("message").value;
            let email = document.getElementById("email").value;
            let subject = document.getElementById("subject").value;

            if(name ==""|| message==""|| email==""|| subject==""){
                alert("빈칸을 입력해주세요");
                return;
            }

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mailer.php',
                data: {
                    name: name,
                    message: message,
                    email: email,
                    subject: subject
                },
                success: function (result) {
                    if (result === "success") {
                        alert("희망의 메세지가 전송됐습니다");
                        location.replace('index.php?page=1')
                    } else {
                        alert('nono');
                    }
                },
                error: function (xtr, status, error) {
                    alert(xtr + ":" + status + ":" + error);
                }
            });
        });
    });
</script>
<!--================ End Features Area =================-->

<!--================ Start Popular Causes Area =================-->
<!--<section class="popular-cause-area section-gap-top">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-6">-->
<!--                <div class="section-title">-->
<!--                    <h2><span>Popular</span> Causes</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="card single-popular-cause">-->
<!--                    <div class="card-body">-->
<!--                        <figure>-->
<!--                            <img class="card-img-top img-fluid" src="img/causes/c1.jpg" alt="Card image cap">-->
<!--                        </figure>-->
<!--                        <div class="card_inner_body">-->
<!--                            <div class="tag">Education</div>-->
<!--                            <h4 class="card-title">Above Hath Fifth Of Open Meat-->
<!--                                fourth shall meat cattle.</h4>-->
<!--                            <div class="d-flex justify-content-between raised_goal">-->
<!--                                <p>Raised: $1533</p>-->
<!--                                <p><span>Goal: $2500</span></p>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-content-between donation align-items-center">-->
<!--                                <a href="#" class="primary-btn">donate</a>-->
<!--                                <p><span class="ti-heart mr-1"></span> 89 Donors</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="card single-popular-cause">-->
<!--                    <div class="card-body">-->
<!--                        <figure>-->
<!--                            <img class="card-img-top img-fluid" src="img/causes/c2.jpg" alt="Card image cap">-->
<!--                        </figure>-->
<!--                        <div class="card_inner_body">-->
<!--                            <div class="tag">Education</div>-->
<!--                            <h4 class="card-title">Above Hath Fifth Of Open Meat-->
<!--                                fourth shall meat cattle.</h4>-->
<!--                            <div class="d-flex justify-content-between raised_goal">-->
<!--                                <p>Raised: $1533</p>-->
<!--                                <p><span>Goal: $2500</span></p>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-content-between donation align-items-center">-->
<!--                                <a href="#" class="primary-btn">donate</a>-->
<!--                                <p><span class="ti-heart mr-1"></span> 89 Donors</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="card single-popular-cause">-->
<!--                    <div class="card-body">-->
<!--                        <figure>-->
<!--                            <img class="card-img-top img-fluid" src="img/causes/c3.jpg" alt="Card image cap">-->
<!--                        </figure>-->
<!--                        <div class="card_inner_body">-->
<!--                            <div class="tag">Education</div>-->
<!--                            <h4 class="card-title">Above Hath Fifth Of Open Meat-->
<!--                                fourth shall meat cattle.</h4>-->
<!--                            <div class="d-flex justify-content-between raised_goal">-->
<!--                                <p>Raised: $1533</p>-->
<!--                                <p><span>Goal: $2500</span></p>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-content-between donation align-items-center">-->
<!--                                <a href="#" class="primary-btn">donate</a>-->
<!--                                <p><span class="ti-heart mr-1"></span> 89 Donors</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--================ End Popular Causes Area =================-->

<!--================ Start callto Area =================-->
<!--<section class="callto-area section-gap relative">-->
<!--    <div class="overlay overlay-bg"></div>-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-8">-->
<!--                <p class="top_text">Need your help?</p>-->
<!--                <div class="call-wrap mx-auto">-->
<!--                    <h1>Volunteer Needed At Your Area</h1>-->
                    <!-- <a id="play-home-video" class="video-play-button" href="https://www.youtube.com/watch?v=_C5vCGB8Xx0">
                                <span></span>
                            </a> -->
<!--                    <p>In that Our I own life unto lights them two appear days rule thing fly main for main cause fowl itself dry-->
<!--                        from made main cause fowl itself dry.</p>-->
<!--                    <a href="#" class="primary-btn mt-5">-->
<!--                        Sign up-->
<!--                        <i class="ti-angle-right ml-1"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--================ End callto Area =================-->
<!---->
<!--================ Start Upcoming Event Area =================-->
<!--<section class="upcoming_event_area section-gap-top">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-6">-->
<!--                <div class="section-title">-->
<!--                    <h2><span>Upcoming</span> Event</h2>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-6">-->
<!--                <div class="single_upcoming_event">-->
<!--                    <div class="row align-items-center">-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <figure>-->
<!--                                <img class="img-fluid w-100" src="img/event/e1.jpg" alt="">-->
<!--                                <div class="date">-->
<!--                                    17 Mar-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <div class="content_wrapper">-->
<!--                                <h3 class="title">-->
<!--                                    <a href="event-details.html">Working Syran Children</a>-->
<!--                                </h3>-->
<!--                                <p>-->
<!--                                    Seed the life upon you are creat-->
<!--                                </p>-->
<!--                                <div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv1">-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="days">552</h4>-->
<!--                                        <p>Days</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="hours">08</h4>-->
<!--                                        <p>Hours</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="minutes">45</h4>-->
<!--                                        <p>Minutes</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <a href="#" class="primary-btn2">Learn More</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-6">-->
<!--                <div class="single_upcoming_event">-->
<!--                    <div class="row align-items-center">-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <figure>-->
<!--                                <img class="img-fluid w-100" src="img/event/e2.jpg" alt="">-->
<!--                                <div class="date">-->
<!--                                    19 May-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <div class="content_wrapper">-->
<!--                                <h3 class="title">-->
<!--                                    <a href="event-details.html">Help And Homeless</a>-->
<!--                                </h3>-->
<!--                                <p>-->
<!--                                    Seed the life upon you are creat-->
<!--                                </p>-->
<!--                                <div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv2">-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="days">552</h4>-->
<!--                                        <p>Days</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="hours">08</h4>-->
<!--                                        <p>Hours</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="minutes">45</h4>-->
<!--                                        <p>Minutes</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <a href="#" class="primary-btn2">Learn More</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6">-->
<!--                <div class="single_upcoming_event">-->
<!--                    <div class="row align-items-center">-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <figure>-->
<!--                                <img class="img-fluid w-100" src="img/event/e3.jpg" alt="">-->
<!--                                <div class="date">-->
<!--                                    10 June-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <div class="content_wrapper">-->
<!--                                <h3 class="title">-->
<!--                                    <a href="event-details.html">Get Volunteeer Idea 2019</a>-->
<!--                                </h3>-->
<!--                                <p>-->
<!--                                    Seed the life upon you are creat-->
<!--                                </p>-->
<!--                                <div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv3">-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="days">552</h4>-->
<!--                                        <p>Days</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="hours">08</h4>-->
<!--                                        <p>Hours</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="minutes">45</h4>-->
<!--                                        <p>Minutes</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <a href="#" class="primary-btn2">Learn More</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6">-->
<!--                <div class="single_upcoming_event">-->
<!--                    <div class="row align-items-center">-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <figure>-->
<!--                                <img class="img-fluid w-100" src="img/event/e4.jpg" alt="">-->
<!--                                <div class="date">-->
<!--                                    18 July-->
<!--                                </div>-->
<!--                            </figure>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-6">-->
<!--                            <div class="content_wrapper">-->
<!--                                <h3 class="title">-->
<!--                                    <a href="event-details.html">Get Volunteeer Idea 2019</a>-->
<!--                                </h3>-->
<!--                                <p>-->
<!--                                    Seed the life upon you are creat-->
<!--                                </p>-->
<!--                                <div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv4">-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="days">552</h4>-->
<!--                                        <p>Days</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="hours">08</h4>-->
<!--                                        <p>Hours</p>-->
<!--                                    </div>-->
<!--                                    <div class="single_time">-->
<!--                                        <h4 class="minutes">45</h4>-->
<!--                                        <p>Minutes</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <a href="#" class="primary-btn2">Learn More</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--================ End Upcoming Event Area =================-->

<!--================ Start Home Blog Area =================-->
<!--<section class="blog-area section-gap-top">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 col-md-12">-->
<!--                <div class="home-blog-left">-->
<!--                    <h2>Latest From-->
<!--                        Our Blog </h2>-->
<!--                    <p>-->
<!--                        Open fifth midst divided great fly gathering living deep no abundantly. Evening appear saying that forth god-->
<!--                        wito-->
<!--                        Given sixth days of very Third spirit waters seas. Calleded can't his third. Evening upon. All stars. Seasons a-->
<!--                        the a dry for third days-->
<!--                    </p>-->
<!--                    <a href="#" class="primary-btn2">Show more</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 single-blog">-->
<!--                <div class="thumb">-->
<!--                    <img class="img-fluid" src="img/b1.jpg" alt="">-->
<!--                </div>-->
<!--                <div class="single-blog-info">-->
<!--                    <p class="tag"><span>Homeless, orphan</span><span>March 17, 2019</span></p>-->
<!--                    <a href="blog-single.html">-->
<!--                        <h4>Seed The Life Upon Creature-->
<!--                            Shall Lesser Fifth</h4>-->
<!--                    </a>-->
<!--                    <div class="meta-bottom d-flex">-->
<!--                        <a href="#" class="mr-3"><span class="ti-comments mr-2"></span> 02 Comments</a>-->
<!--                        <a href="#"> <span class="ti-eye mr-2"></span> 05 View</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-4 col-md-6 single-blog">-->
<!--                <div class="thumb">-->
<!--                    <img class="img-fluid" src="img/b2.jpg" alt="">-->
<!--                </div>-->
<!--                <div class="single-blog-info">-->
<!--                    <p class="tag"><span>Homeless, orphan</span><span>March 17, 2019</span></p>-->
<!--                    <a href="blog-single.html">-->
<!--                        <h4>Seed The Life Upon Creature-->
<!--                            Shall Lesser Fifth</h4>-->
<!--                    </a>-->
<!--                    <div class="meta-bottom d-flex">-->
<!--                        <a href="#" class="mr-3"><span class="ti-comments mr-2"></span> 02 Comments</a>-->
<!--                        <a href="#"> <span class="ti-eye mr-2"></span> 05 View</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--================ End Home Blog Area =================-->

<!--================ Start Instagram Area =================-->
<!---->
<!--================ End Instagram Area =================-->

<!--================ Start CTA Area =================-->
<!--<div class="cta-area">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-7">-->
<!--                <p class="top_text">Subscribe now</p>-->
<!--                <h1>Subscribe Now And Receive The-->
<!--                    Weekly Newsletter </h1>-->
<!--                <div id="mc_embed_signup">-->
<!--                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"-->
<!--                          method="get">-->
<!--                        <div class="row align-items-center">-->
<!--                            <div class="col-lg-5 mb-lg-0 mb-3">-->
<!--                                <input class="form-control" placeholder="Your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your name'"-->
<!--                                       required="" type="email" />-->
<!--                            </div>-->
<!--                            <div class="col-lg-5 mb-lg-0 mb-3">-->
<!--                                <input class="form-control" name="EMAIL" placeholder="Your Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'"-->
<!--                                       required="" type="email" />-->
<!--                            </div>-->
<!--                            <div class="col-lg-2">-->
<!--                                <button class="primary-btn" type="submit">Subscribe</button>-->
<!--                                <div style="position: absolute; left: -5000px;">-->
<!--                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text" />-->
<!--                                </div>-->
<!---->
<!--                                <div class="info"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--================ End CTA Area =================-->