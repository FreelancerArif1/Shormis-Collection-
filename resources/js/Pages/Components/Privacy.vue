<template>
<Head>
  <title>Privacy and Policy | DITS </title>
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
                                    <h1 class="mb-15 text-white">Privacy and Policy </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         Privacy Policy
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->





        <div class="container">
            <div class="row">
                <div class="col-md-12 cms_page_content pt-3 pb-3">
                    <h4 class="mb-3">{{ pageContent.title }}</h4>
                    <span v-html="pageContent.note"></span>
                </div>
            </div>
        </div>




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
    props: ['setting','services','banner', 'teams', 'pageContent'],
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