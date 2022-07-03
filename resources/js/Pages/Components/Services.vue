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
            <!-- banner start -->
            <div class="about-banner-wrap" :style='{ backgroundImage: "url("+parent_url+"/uploads/images/banner/"+ banner + ")", }'>
                <div class="banner_overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 m-auto">
                                <div class="about-banner-content text-center">
                                    <h1 class="mb-15 text-white">Services </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         Services
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->

            <!--===========  feature-images-wrapper  Start =============-->
            <div class="feature-images-wrapper section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                                <h3 class="heading">Preparing for your success, <br> we provide <span class="text-color-primary">  truly prominent IT solutions.</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="feature-images__one">
                                <div class="row" v-if="services">
							
                                    <div v-for="(data, index) in services" :key="index" class="col-lg-4 col-md-6 wow move-up">
                                        <div class="ht-box-images style-01">
                                            <div class="image-box-wrap">
                                                <div class="box-image" v-html="data.service_icone">

                                                </div>
                                                <div class="content">
                                                    <h5 class="heading">{{ data.service_name }}</h5>
                                                    <div class="text">{{  data.short_description  }} </div>
                                                    <div class="circle-arrow">
                                                        <div class="middle-dot"></div>
                                                        <div class="middle-dot dot-2"></div>
                                                        <Link :href="route('service.single', data.id)">
                                                            <i class="far fa-long-arrow-right"></i>
                                                        </Link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-under-heading text-center section-space--mt_80">Challenges are just opportunities in disguise. <a href="#">Take the challenge!</a></div>

                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-images-wrapper  End =============-->

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
import Callus from '../Default/Callus.vue';
export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['setting','services','banner'],
    components:{
        Layout,
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