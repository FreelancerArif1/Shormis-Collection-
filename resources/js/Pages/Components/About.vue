<template>
<Head>
  <title>About Us | DITS </title>
  <meta name="description" content="Welcome To Dhaka It Solution">
</Head>

<layout :setting ="setting" :services="services">
<div  class="every_page">


<div class="page_wrapper">
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!-- banner start -->
            <div class="about-banner-wrap" :style='{ backgroundImage: "url("+parent_url+"/uploads/images/banner/"+ banner + ")", }'>
                <div class="banner_overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="about-banner-content text-center">
                                    <h1 class="mb-15 text-white">About Us </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         About Us
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->







        <!--===========  feature-large-images-wrapper  Start =============-->
        <div class="feature-large-images-wrapper section-space--ptb_100">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- section-title-wrap Start -->
                        <div class="section-title-wrap text-center section-space--mb_60">
                            <h6 class="section-sub-title mb-20">Our company</h6>
                            <h3 class="heading">We run all kinds of IT services that <br> vow your <span class="text-color-primary"> success</span></h3>
                        </div>
                        <!-- section-title-wrap Start -->
                    </div>
                </div>

                <div class="cybersecurity-about-box section-space--pb_70">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="modern-number-01">
                                <h2 class="heading  me-5"><span class="mark-text">5</span>Years’ Experience in IT</h2>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="cybersecurity-about-text">
                                <div class="text" v-html="about_ourself.about">  </div>
                                <div class="button-text">
                                    <!-- <a href="#" class="btn-text">
                                        Discover now
                                        <span class="button-icon ml-1">
                                <i class="far fa-long-arrow-right"></i>
                            </span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>








                <div class="cybersecurity-about-box section-space--pb_70" id="our_mission_vission">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                          <img :src="parent_url+`/uploads/images/${about_ourself.image}`" alt="">
                        </div>

                        <div class="col-lg-8 col-md-8">
                            <div class="cybersecurity-about-text">
                                <div class="resources-inner">
                                    <h3 class="heading">Our Vission</h3>
                                </div>
                                <div class="text" v-html="about_ourself.our_company">  </div>
                                <br>
                                <div class="resources-inner">
                                    <h3 class="heading">Our Mission</h3>
                                </div>
                                <div class="text" v-html="about_ourself.our_mission">  </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <div class="feature-images__six">
                            <div class="row">



                                <div v-for="(data, index) in discovers" :key="index" class="col-lg-4 col-md-6 wow move-up">
                                    <div class="ht-box-images style-06">
                                        <div class="image-box-wrap" id="myabout_default_image">
                                            <div class="box-image">
                                                <div class="default-image myabout_default_image">
                                                    <img class="img-fulid" :src="parent_url+`/uploads/images/discover/${data.image}`" alt="">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="heading">{{ data.title }}</h5>
                                                <div class="text">{{ data.description }}</div>
                                                <a href="#" class="box-images-arrow">
                                                    <span class="button-text">{{ data.btn_text }}</span>
                                                    <i class="far fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   

                            </div>
                        </div>

                        <div class="section-under-heading text-center section-space--mt_60">Challenges are just opportunities in disguise. <a href="#">Take the challenge!</a></div>

                    </div>
                </div>
            </div>
        </div>
        <!--===========  feature-large-images-wrapper  End =============-->




        <!--========= About Resources Wrapper Start ===========-->
        <div class="about-resources-wrapper">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="resources-left-box">
                            <div class="resources-inner">
                                <h6 class="sub-title mb-20">Resources</h6>
                                <h3 class="heading">Get a copy of brochure on <span class="text-color-primary"> Brand New IT Tech.</span></h3>
                                <div class="button mt-30">
                                    <a href="#" class="ht-btn ht-btn-md">Download now (3MB)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="resources-right-box">
                            <div class="resources-right-inner text-center">
                                <div class="resources-images">
                                    <img class="img-fluid" src="assets/images/banners/managed-it-services-book-cover.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========= About Resources Wrapper End ===========-->
        <!--========= About Delivering Wrapper Start ===========-->
        <div class="about-delivering-wrapper section-space--ptb_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center section-space--mb_20">
                            <h3 class="heading">We excel in delivering <br>optimal solutions.</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div v-for="(data, index) in optimalSolutions" :key="index" class="col-lg-6">
                        <div class="delivering-optimal-wrap">
                            <div class="list-item">
                                <div class="marker"></div>
                                <div class="title-wrap">
                                    <h5 class="title">{{ data.title }} </h5>
                                    <div class="desc">{{ data.description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=========== fun fact Wrapper Start ==========-->
        <div class="fun-fact-wrapper bg-theme-default section-space--pb_30 section-space--pt_60">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 wow move-up">
                        <div class="fun-fact--two text-center">
                            <div class="fun-fact__count counter">{{ about_basic.happy_client }}</div>
                            <h6 class="fun-fact__text">Happy clients</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow move-up">
                        <div class="fun-fact--two text-center">
                            <div class="fun-fact__count counter">{{ about_basic.finished_project }}</div>
                            <h6 class="fun-fact__text">Finished projects</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow move-up">
                        <div class="fun-fact--two text-center">
                            <div class="fun-fact__count counter">{{ about_basic.skiled_expart }}</div>
                            <h6 class="fun-fact__text">Skilled Experts</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 wow move-up">
                        <div class="fun-fact--two text-center">
                            <div class="fun-fact__count counter">{{ about_basic.midea_post }}</div>
                            <h6 class="fun-fact__text">Media Posts</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=========== fun fact Wrapper End ==========-->


        <Client :ourclients="ourclients"> </Client>
        <Testimonial :testimonials="testimonials"> </Testimonial>



        <!--============ Contact Us Area Start =================-->
        <Callus> </Callus>
        <!--============ Contact Us Area End =================-->

















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
import Client from '../Default/Client.vue';
import Callus from '../Default/Callus.vue';
import Testimonial from '../Default/Testimonial.vue';

export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['setting','services','banner', 'ourclients', 'testimonials', 'about_basic', 'discovers', 'optimalSolutions', 'about_ourself'],
    components:{
        Layout,
        Client,
        Testimonial,
        Callus,
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