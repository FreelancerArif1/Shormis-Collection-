<template lang="pug">
<div>
      





<div class="testimonial-slider-area section-space--mb_40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_40">
                    <h6 class="section-sub-title">Testimonials </h6>
                    <h3 class="heading">What do people praise about <span class="text-color-primary"> Mitech?</span></h3>
                </div>
                <div class="testimonial-slider">
                    <div class="swiper-container testimonial-slider__container">
                        <div class="swiper-wrapper testimonial-slider__wrapper" v-if="testimonials">

                     




                                <div class="swiper-slide" v-for="(data, index) in testimonials" :key="index">
                                    <div class="testimonial-slider__one wow move-up">
                                        <div class="testimonial-slider--info">
                                            <div class="testimonial-slider__media">
                                                <img :src="parent_url+`/uploads/images/testimonial/${data.image}`" class="img-fluid" alt="">
                                            </div>
                                            <div class="testimonial-slider__author">
                                                <div class="author-info">
                                                    <h6 class="name">{{ data.name }}</h6>
                                                </div>
                                                <div class="designation">
                                                    <p>{{ data.designation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-slider__text">{{ data.dialogue }}</div>
                                    </div>
                                </div>





                         

                            
                        </div>
                        <div class="swiper-pagination swiper-pagination-t01 section-space--mt_30"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




</div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
defineProps({
    setting:Object,
    ourclients:Array,
    testimonials:Array,
});


</script>
<script>

export default {
    mode: 'history',
    data() {
        return {
            baseurl:'',
            parent_url:'',
        }
    },
	mounted(){
        this.baseurl = 'https://dhakaitsolutions.com';
        this.parent_url = 'https://admin.dhakaitsolutions.com';
	}
}
</script>