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
                                    <h1 class="mb-15 text-white">Contact Us </h1>
                                    <h5 class="font-weight--normal text-white">   
                                        <Link :href="route('home')"><b>Home</b> </Link> - 
                                         Contact Us
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- banner end -->







            <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-lg-6">
                            <div class="conact-us-wrap-one mb-30">
                                <h3 class="heading">To make requests for <br>further information, <br><span class="text-color-primary">contact us</span> via our social channels. </h3>
                                <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days since receiving your issue ticket.</div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-form-wrap">

                                <!-- <form id="contact-form" action="http://whizthemes.com/mail-php/jowel/mitech/php/mail.php" method="post"> -->
                                <form id="contact-form" @submit.prevent="message" method="post">
                                    <div class="contact-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input v-model="form.name" type="text" placeholder="Name *">
                                                <div style="color:red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                            </div>
                                            <div class="contact-inner">
                                                <input v-model="form.email" type="email" placeholder="Email *">
                                                 <div style="color:red" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                                            </div>
                                        </div>
                                        <div class="contact-inner">
                                            <input name="con_subject" type="text" placeholder="Subject *">
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea v-model="form.message" placeholder="Please describe what you need."></textarea>
                                             <div style="color:red" v-if="form.errors.has('message')" v-html="form.errors.get('message')" />
                                        </div>
                                        <div class="submit-btn mt-20">
                                            <button class="ht-btn ht-btn-md" type="submit">Send message</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  Conact us Section End  ====================-->

            <!--====================  Conact us info Start ====================-->
            <div class="contact-us-info-wrappaer section-space--pb_100">
                <div class="container">
                    <div class="row align-items-center">

                        <div v-for="(data, index) in offices" :key="index" class="col-lg-4 col-md-6">
                            <div class="conact-info-wrap mb-2">
                                <h5 class="heading mb-2"> {{ data.name }} </h5>
                                <ul class="conact-info__list">
                                    <li> {{ data.location }} </li>
                                    <li><a :href="`mailto:`+data.email" class="hover-style-link text-color-primary"> {{ data.email }} </a></li>
                                    <li><a :href="`tel:`+data.phone" class="hover-style-link text-black font-weight--bold">  {{ data.phone }}  </a></li>
                                </ul>
                            </div>
                        </div>
             
                    </div>
                </div>
            </div>
            <!--====================  Conact us info End  ====================-->






            <!--========== Call to Action Area Start ============-->
            <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading">We run all kinds of IT services that vow your <span class="text-color-primary"> success</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-button-group--two text-center">
                                <a href="#" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt-dots"></i></span> Let's talk</a>
                                <a href="#" class="btn btn--secondary btn-two "><span class="btn-icon me-2"><i class="far fa-info-circle"></i></span> Get info</a>
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
import Client from '../Default/Client.vue';
import Testimonial from '../Default/Testimonial.vue';
import Form from 'vform'
import Swal from 'sweetalert2'


export default {
    mode: 'history',
    data() {
        return {
            paginante:true,
            form: new Form({
                name: '',
                email: '',
                subject: '',
                message: '',
            }),
            baseurl:'',
            parent_url:'',
        }
    },
    props: ['offices', 'setting','services','banner', 'ourclients', 'testimonials'],
    components:{
        Layout,
        Client,
        Testimonial,
    },
    methods:{
        blogDate(date){
            return moment(date).format('DD MMM, YYYY')
        },
        async message(){
            await this.form.post('/message').then(response => {
                if(response.data.status == 1){
                    Swal.fire({
                        imageUrl: '/uploads/images/backend-logo.jpg',
                        icon:'success',
                        text:response.data.message,
                        timer: 3000,
                        showCloseButton:true,
                        showConfirmButton:false,    
                    })
                }else{
                   alert('error');
                }
            });
        }
    },
	mounted(){
        this.baseurl = 'https://dhakaitsolutions.com';
        this.parent_url = 'https://admin.dhakaitsolutions.com';
	}
}
</script>