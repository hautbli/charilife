<!DOCTYPE html>


<!--================ Start Header Area =================-->

<!--================ End Header Area =================-->

<!--================ Start top-section Area =================-->
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">위치</h1>
                <p>대표 전화 : 02 123 4566</p>
            </div>
        </div>
    </div>
</section>
<!--================ End top-section Area =================-->


<!-- ================ contact section start ================= -->
<section class="section-gap">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <h2 class="contact-title">오시는 길</h2>
            <p class="top_text">
                주소 : 서울특별시 용산구 한강대로 405
            </p>
            <!--            <div id="map" style="height: 480px;"></div>-->
<!--            <script>-->
<!--                function initMap() {-->
<!--                    var uluru = {lat: -25.363, lng: 44};-->
<!--                    var grayStyles = [-->
<!--                        {-->
<!--                            featureType: "all",-->
<!--                            stylers: [-->
<!--                                {saturation: -90},-->
<!--                                {lightness: 50}-->
<!--                            ]-->
<!--                        },-->
<!--                        {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}-->
<!--                    ];-->
<!--                    var map = new google.maps.Map(document.getElementById('map'), {-->
<!--                        center: {lat: 37.555880, lng: 126.969621},-->
<!--                        zoom: 17,-->
<!--                        styles: grayStyles,-->
<!--                        scrollwheel: true,-->
<!---->
<!--                    });-->
<!--                }-->
<!---->
<!--            </script>-->
<!--            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyE_ryzvEBoAS9pskMMDky_nR5kOXKaNY&callback=initMap"></script>-->
            <?php
            include "board.php";
            ?>

        </div>

        <div class="row">
<!--            <div class="col-12">-->
<!--                <h2 class="contact-title">Get in Touch</h2>-->
<!--            </div>-->
<!--            <div class="col-lg-8">-->
<!--                <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"-->
<!--                      novalidate="novalidate">-->
<!--                    <div class="row">-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-group">-->
<!--                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"-->
<!--                                          placeholder="Enter Message"></textarea>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control" name="name" id="name" type="text"-->
<!--                                       placeholder="Enter your name">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control" name="email" id="email" type="email"-->
<!--                                       placeholder="Enter email address">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-group">-->
<!--                                <input class="form-control" name="subject" id="subject" type="text"-->
<!--                                       placeholder="Enter Subject">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group mt-2 mb-5 mb-lg-0">-->
<!--                        <button type="submit" class="button button-contactForm primary-btn">Send Message</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->

            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-home"></i></span>
                    <div class="media-body">
                        <h3>서울특별시 용산구 한강로 123</h3>
                        <p></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-phone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654">02 123 4566</a></h3>
                        <p>월-금, 9시_6시</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fa fa-envelope-o"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@colorlib.com">charilfe@exemail.com</a></h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<!--================ start footer Area =================-->


</html>