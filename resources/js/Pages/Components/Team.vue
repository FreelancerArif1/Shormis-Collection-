<template>
<Head>
  <title>Our Team | DITS </title>
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
                                    <h1 class="mb-15 text-white">Our Team </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         Our Team
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->


      <!-- ============ Team Member Wrapper Start =============== -->
        <div class="team-member-wrapper section-space--pt_100 section-space--pb_30 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-space--mb_60 text-center">
                            <h3 class="heading">We pride ourselves on having a team <br> of <span class="text-color-primary">highly-skilled</span> experts</h3>
                        </div>
                    </div>
                </div>
                <div class="row ht-team-member-style-two" v-if="teams">
             
             




                    <div class="col-lg-3 col-md-3 wow move-up" v-for="(data, index) in teams" :key="index">
                        <div class="grid-item">
                            <div class="ht-team-member">
                                <div class="team-image">
                                    <img class="img-fluid" :src="parent_url+`/uploads/images/team/${data.image}`" alt="">
                                    <div class="social-networks">
                                        <div class="inner">
                                            <a target="_blank" href="{{data.facebook }}" class=" hint--bounce  hint--top hint--theme-two" aria-label="Facebook"><i class="fab fa-facebook"></i>
                                            </a>
                                            <a target="_blank" href="{{data.twitter }}" class=" hint--bounce hint--top hint--theme-two" aria-label="Twitter"><i class="fab fa-twitter"></i>
                                            </a>
                                            <a target="_blank" href="{{data.linkedin }}" class=" hint--bounce hint--top hint--theme-two" aria-label="Instagram"><i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-info text-center">
                                    <h5 class="name">{{data.name }} </h5>
                                    <div class="position">{{data.position }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
               
               




                </div>
            </div>
        </div>
        <!-- ============ Team Member Wrapper End =============== -->






















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
import Testimonial from '../Default/Testimonial.vue';

export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['setting','services','banner', 'teams'],
    components:{
        Layout,
        Client,
        Testimonial,
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