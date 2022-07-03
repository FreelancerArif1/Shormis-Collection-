<template>
<Head>
  <title>Service | DITS </title>
  <meta name="description" content="Welcome To Dhaka It Solution">
</Head>

<layout :setting ="setting" :services="services">
<div  class="every_page">


<div class="page_wrapper">
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="about-banner-wrap" :style='{ backgroundImage: "url("+"/uploads/images/services/"+serviceSingle.banner_image + ")", }'>
                <div class="banner_overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="about-banner-content text-center">
                                    <h1 class="mb-15 text-white">Service </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> {{ serviceSingle.service_name }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-large-images-wrapper  Start =============-->
            <div class="feature-large-images-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="cybersecurity-about-box">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="modern-number-01">
                                    <h3 class="heading mt-30">{{ serviceSingle.service_name }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-1 border_left">
                                <div class="conact-us-wrap-one managed-it">
                                    <!-- <h5 class="heading ">Mitech specializes in <span class="text-color-primary"> technological and IT-related services</span> such as product engineering, warranty management, building cloud, infrastructure, network, etc. </h5> -->

                                    <div class="sub-heading" v-html="serviceSingle.details"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--===========  feature-large-images-wrapper  End =============-->

            <div class="accordion-wrapper section-space--pb_100">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 pe-5">
                            <div class="faq-two-wrapper section-space--mt_40">
                                <div id="accordion_two">
                                    <div class="card">
                                        <div class="card-header" id="heading__10">
                                            <h5 class="mb-0 font-weight--bold">
                                                <button class="btn-link" data-bs-toggle="collapse" data-bs-target="#tab__10" aria-expanded="true" aria-controls="tab__10">
                                                    New multiple site connectivity <span>
                                            <i class="far fa-caret-circle-down"></i>
                                            <i class="far fa-caret-circle-right"></i> </span>
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="tab__10" class="show" aria-labelledby="heading__10" data-bs-parent="#accordion_two">
                                            <div class="card-body">
                                                <p>We use a newly developed technology to connect sites that are based on different types of servers and networks, SiteConnect, which helps to reduce the misinterpretation of signals as well as the loss of data during transfering. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading__11">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapse__11" aria-expanded="false" aria-controls="collapse__11">
                                                    IT Security & Software<span>
                                            <i class="far fa-caret-circle-down"></i>
                                            <i class="far fa-caret-circle-right"></i>  </span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse__11" class="collapse" aria-labelledby="heading__11" data-bs-parent="#accordion_two">
                                            <div class="card-body">
                                                <p>To keep your systems, your devices, and network stay secure, we have developed a new program that limits the access of suspicious objects or people and authenticate all logins to the system. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading__12">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapse__12" aria-expanded="false" aria-controls="collapse__12">
                                                    Weak hosted capability<span><i class="far fa-caret-circle-down"></i>
                                    <i class="far fa-caret-circle-right"></i> </span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse__12" class="collapse" aria-labelledby="heading__12" data-bs-parent="#accordion_two">
                                            <div class="card-body">
                                                <p>Some hosts are unaware of the potential risks as well as security loopholes in their system. By detecting these errors and taking prompt actions on improving firewalls, we can upgrade the system security. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading__13">
                                            <h5 class="mb-0">
                                                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapse__13" aria-expanded="false" aria-controls="collapse__13">
                                                    Build internal network <span><i class="far fa-caret-circle-down"></i>
                                    <i class="far fa-caret-circle-right"></i>  </span>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse__13" class="collapse" aria-labelledby="heading__13" data-bs-parent="#accordion_two">
                                            <div class="card-body">
                                                <p>The internal network is essential for all companies and corporations, especially for those working in IT sector. To avoid possible risks when sharing internal confidential files and documentation to an external receiver, internal network must be strong. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Start single-popup-wrap -->
                            <div class="video-interview section-space--mt_40 video-popup">
                                <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link mt-30">
                                    <div class="single-popup-wrap">
                                        <img class="img-fluid border-radus-5" src="/assets/images/bg/mitech-home-infotechno-box-large-image-03-540x320.webp" alt="">
                                        <div class="ht-popup-video video-button">
                                            <div class="video-mark">
                                                <div class="wave-pulse wave-pulse-1"></div>
                                                <div class="wave-pulse wave-pulse-2"></div>
                                            </div>
                                            <div class="video-button__two">
                                                <div class="video-play">
                                                    <span class="video-play-icon"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- End single-popup-wrap -->
                        </div>
                    </div>
                </div>
            </div>

            <!--===========  feature-icon-wrapper  Start =============-->
            <div class="feature-icon-wrapper section-space--pb_70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_20">
                                <h3 class="heading">Prominent IT Security Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="feature-list__three">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fal fa-shield-check"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Mitech Management Systems
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Our service offerings enhance customer experience throughout secure & highly functional end-to-end warranty management.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fal fa-lock-alt"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Reliable Multi-function Technology
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Develop and propose product improvements through periodical and accurate testing, repairing & refining every version.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fal fa-magnet"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Highly Professional Staffs
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">Develop and propose product improvements through periodical and accurate testing, repairing & refining every version.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="grid-item animate">
                                            <div class="ht-box-icon style-03">
                                                <div class="icon-box-wrap">
                                                    <div class="content-header">
                                                        <div class="icon">
                                                            <i class="fal fa-medal"></i>
                                                        </div>
                                                        <h5 class="heading">
                                                            Infrastructure Integration Technology
                                                        </h5>
                                                    </div>
                                                    <div class="content">
                                                        <div class="text">At Mitech, we have a holistic and integrated approach towards core modernization to experience technological evolution.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-icon-wrapper  End =============-->











            <!--========== Call to Action Area Start ============-->
            <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading text-white">We run all kinds of IT services that vow your <span class="text-color-secondary"> success</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-button-group--one text-center">
                                <a href="#" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                                <a href="#" class="btn btn--secondary  btn-two"><span class="btn-icon me-2"><i class="far fa-info-circle"></i></span> Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========== Call to Action Area End ============-->




























        </div>
    </div>
</div>


</div>
</layout>
</template>


<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
</script>






<script>
import Layout from '../Default/Layout.vue';
import moment from 'moment';

export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['setting','serviceSingle','banner', 'services'],
    components:{
        Layout,
    },
    methods:{
        blogDate(date){
            return moment(date).format('DD MMM, YYYY')
        }
    },
	mounted(){
        this.baseurl = 'https://dhakaitsolutions.com';
        this.parent_url = 'https://admin.dhakaitsolutions.com';
	}
}
</script>