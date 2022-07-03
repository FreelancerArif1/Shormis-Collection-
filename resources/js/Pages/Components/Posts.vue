<template>
<Head>
  <title>Blog | DITS </title>
  <meta name="description" content="Welcome To Dhaka It Solution">
</Head>

<layout :setting ="setting" :services="services">
<div class="every_page">

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area" :style="{ 'background-image': 'url('+'/uploads/images/banner/' + breadcum.image + ')' }">
        <div class="banner_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Blog </h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item">  <Link :href="route('home')">Home  </Link> - </li>
                            <li class="breadcrumb-item active"> {{ breadcum.title }} </li>
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
        <div class="site-wrapper-reveal">

            <!--====================  Blog Area Start ====================-->
            <div class="blog-pages-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="row"  v-if="posts">
                        <div v-for="(data, index) in posts.data" :key="index" class="col-lg-4 col-md-4  mb-30 wow move-up">
                            <!--======= Single Blog Item Start ========-->
                            <div class="single-blog-item blog-grid">
                                <div class="post-feature blog-thumbnail">
                                    <Link :href="route('blog.single', data.alias)">
                                        <img v-if="data.image" class="img-fluid" :src="`/uploads/images/${data.image}`"  alt="">
                                        <img v-else class="img-fluid" src="/uploads/images/notfound.jpg" alt="">
                                    </Link>
                                </div>
                                <div class="post-info lg-blog-post-info">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-calendar meta-icon"></span>
                                            {{  blogDate(data.created_at)  }}
                                        </div>
                                    </div>
                                    <h5 class="post-title font-weight--bold">
                                        <Link :href="route('blog.single', data.alias)">
                                            {{ data.title.substr(0, 50)+'..'  }} 
                                        </Link> 
                                    </h5>
                                    <div class="post-excerpt mt-15">
                                        
                                        <p v-html="data.metadesc.substr(0, 90)+'..'"> </p>
                                    </div>
                                    <div class="btn-text">
                                        <Link :href="route('blog.single', data.alias)">
                                            Read more <i class="ml-1 button-icon far fa-long-arrow-right"></i>
                                        </Link> 
                                    </div>
                                </div>
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>


                        <div class="col-lg-12 wow move-up">
                            <div class="ht-pagination mt-30 pagination justify-content-center">
                                <div class="pagination-wrapper">
                                     <pagination class="mt-6" :links="posts.links" />
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
import Pagination from '@/Components/Pagination'
export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
    props: [ 'setting', 'status', 'posts', 'title', 'breadcum', 'services'],
    components:{
        Layout,
        Pagination,
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