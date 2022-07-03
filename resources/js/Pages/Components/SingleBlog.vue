<template>
<Head>
  <title>Blog | DITS </title>
  <meta name="description" content="Welcome To Dhaka It Solution">
</Head>

<layout :setting ="setting" :services="services">
<div class="every_page">





    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area" :style="{ 'background-image': 'url('+parent_url+'/uploads/images/banner/' + banner + ')' }">
        <div class="banner_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Blog </h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item">  <Link :href="route('home')">Home  </Link> - </li>
                            <li class="breadcrumb-item active"> {{ data.title }} </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- breadcrumb-area end -->











    <div id="main-wrapper">
        <div class="site-wrapper-reveal" id="blog_single">
            <!--====================  Blog Area Start ====================-->
            <div class="blog-pages-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 order-lg-2 order-2">
                            <div class="page-sidebar-content-wrapper page-sidebar-right small-mt__40 tablet-mt__40">
                                <div class="sidebar-widget widget-blog-recent-post wow move-up">
                                    <h4 class="sidebar-widget-title">Recent Posts</h4>
                                </div>
                                






                                <span v-for="(data, index) in blogs" :key="index">
                                <div class="row" v-if="index < 7">
                                    <div class="col-md-4 small_blog_img">
                                        <Link :href="route('blog.single', data.alias)">
                                            <img v-if="data.image" class="img-fluid" :src="parent_url+`/uploads/images/${data.image}`"  alt="">
                                            <img v-else class="img-fluid" src="/uploads/images/notfound.jpg" alt="">
                                        </Link>
                                    </div>
                                    <div class="col-md-8 small_blog_text">
                                        <b class="media-heading">
                                            <Link :href="route('blog.single', data.alias)">
                                                {{ data.title.substr(0, 20)+'..'  }} 
                                            </Link> 
                                        </b>
                                        <div class="post-date">
                                            <span class="far fa-calendar meta-icon"></span>
                                            {{  blogDate(data.created_at)  }}
                                        </div>
                                        <div class="post-comments">
                                            <span class="far fa-comment-alt meta-icon"></span>
                                           {{ data.comments ?data.comments:'0' }} Comments
                                        </div>   
                                    </div>
                                </div>
                                </span>


                            </div>
                        </div>




   
                        <div class="col-lg-8 order-lg-1 order-1">
                            <div class="main-blog-wrap">
                                <div class="single-blog-item">
                                    <img v-if="data.image" class="img-fluid" :src="parent_url+`/uploads/images/${data.image}`"  alt="">
                                    <img v-else class="img-fluid" src="/uploads/images/notfound.jpg" alt="">
                              
                    
                                    <div class="post-info lg-blog-post-info  wow move-up">
                                        <h3 class="post-title">{{ data.title }}</h3>
                                        <div class="post-meta mt-20">
                                            <div class="post-author">
                                                <img v-if="data.avatar" class="img-fluid avatar-96" :src="parent_url+`/uploads/users/${data.avatar}`" alt=""> 
                                                <img v-else src="uploads/users/17.png" alt="">
                                                <b>Author: </b> {{ user.username }}
                                            </div>
                                            <div class="post-date">
                                                <span class="far fa-calendar meta-icon"></span>
                                                {{  blogDate(data.created_at)  }}
                                            </div>
                                            <div class="post-view">
                                                <span class="meta-icon far fa-eye"></span>
                                                {{ data.views }} views
                                            </div>
                                            <div class="post-comments">
                                                <span class="far fa-comment-alt meta-icon"></span>
                                                <a href="#" class="smooth-scroll-link">{{ data.comments ?data.comments:'0' }} Comments</a>
                                            </div>
                                        </div>
                                        <div class="post-excerpt mt-15">
                                            <p v-html="data.note"> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Blog Area End  ====================-->






            <!--========== Call to Action Area Start ============-->
            <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading text-white">Assess your business potentials and find opportunities <span class="text-color-secondary">for bigger success</span></h3>
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
    props: ['canLogin', 'canRegister','laravelVersion', 'phpVersion', 'services', 'setting', 'status', 'errors' , 'blogs', 'data', 'banner', 'user'],
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



