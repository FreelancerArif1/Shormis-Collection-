<template>
<Head>
  <title>Portfolio | DITS </title>
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
                                    <h1 class="mb-15 text-white">Our Portfolio </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         Our Portfolio
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->

            <div class="container">
                <div class="row text-center">
                    <div class="portfolio_category">
                        <ul v-if="categorys">
                            <li> <Link :href="route('portfolio')" class="hover-style-link all_btn"><span>All</span></Link> </li>
                            <li v-for="(data, index) in categorys" :key="index" @click.prevent="getCategoryPortfolio(data.id)"> <span> {{ data.title }} </span> </li>
                        </ul>
                    </div>
                </div>
                <div class="row" v-if="protfolios2">

                    <div class="col-md-3" v-for="(data, index) in protfolios2.data" :key="index"> 
                        <div class="single_portfolio"> 
                            <img :src="parent_url+`/uploads/images/portfolio/${data.image}`" alt="">
                            <div class="single_portfolio_details">
                                 <b>{{ data.title }}</b>
                            </div> 
                        </div> 
                    </div>
                </div>
                <div v-if="paginante" class="col-lg-12 mb-5 mt-2 wow move-up">
                    <div class="ht-pagination mt-30 pagination justify-content-center">
                        <div class="pagination-wrapper">
                            <pagination class="mt-6" :links="protfolios2.links" />
                        </div>
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
import axios from "axios";
import Pagination from '@/Components/Pagination'
export default {
    mode: 'history',
    data() {
        return {
            protfolios2: this.protfolios,
            paginante:true,
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['setting','services','banner', 'teams', 'categorys', 'protfolios'],
    components:{
        Layout,
        Client,
        Testimonial,
        Pagination,
    },
    methods:{
        blogDate(date){
            return moment(date).format('DD MMM, YYYY')
        },
        getCategoryPortfolio(id){
            axios.get('/get-category-portfolio/'+id).then(response => {
                this.protfolios2 = response.data;
                this.paginante = false;
            });
        }
    },
	mounted(){
        this.baseurl = 'https://dhakaitsolutions.com';
        this.parent_url = 'https://admin.dhakaitsolutions.com';
	}
}
</script>

