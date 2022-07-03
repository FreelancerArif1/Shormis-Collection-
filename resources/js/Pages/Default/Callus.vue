<template lang="pug">
<div> 
     
     
     
        <!--============ Contact Us Area Start =================-->
        <div class="contact-us-area infotechno-contact-us-bg section-space--pt_100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="image">
                            <img class="img-fluid" src="assets/images/banners/home-cybersecurity-contact-bg-image.webp" alt="">
                        </div>
                    </div>

                    <div class="col-lg-5 ms-auto">
                        <div class="contact-info style-two text-left">

                            <div class="contact-info-title-wrap">
                                <h3 class="heading  mb-10"> {{ $page.props.call_us.avarage_rating }} /5.0</h3>
                                <div class="ht-star-rating lg-style">

                                    <span v-if="$page.props.call_us.star_rating > 0 " class="fa fa-star"></span>
                                    <span v-if="$page.props.call_us.star_rating > 1 " class="fa fa-star"></span>
                                    <span v-if="$page.props.call_us.star_rating > 2 " class="fa fa-star"></span>
                                    <span v-if="$page.props.call_us.star_rating > 3 " class="fa fa-star"></span>
                                    <span v-if="$page.props.call_us.star_rating > 4 " class="fa fa-star"></span>
                                </div>
                                <p class="sub-text">by {{ $page.props.call_us.avarage_rating }}+ customers for {{ $page.props.call_us.clients }}+ clients</p>
                            </div>

                            <div class="contact-list-item">
                                <a :href="`tel:`+$page.props.call_us.phone" class="single-contact-list">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <div class="icon">
                                                <span class="fal fa-phone"></span>
                                            </div>
                                            <div class="main-content">
                                                <h6 class="heading">Call for advice now!</h6>
                                                <div class="text">{{ $page.props.call_us.phone }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a :href="`mailto:`+$page.props.call_us.email" class="single-contact-list">
                                    <div class="content-wrap">
                                        <div class="content">
                                            <div class="icon">
                                                <span class="fal fa-envelope"></span>
                                            </div>
                                            <div class="main-content">
                                                <h6 class="heading">Say hello</h6>
                                                <div class="text">{{ $page.props.call_us.email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============ Contact Us Area End =================-->



</div>
</template>        