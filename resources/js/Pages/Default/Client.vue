<template lang="pug">
<div>
      
      <!--====================  brand logo slider area ====================-->
      <div class="brand-logo-slider-area section-space--ptb_60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- brand logo slider -->
                    <div class="brand-logo-slider__container-area">
                        <div class="swiper-container brand-logo-slider__container">
                            <div class="swiper-wrapper brand-logo-slider__one" v-if="ourclients">
                              
                                <div v-for="(data, index) in ourclients" :key="index" class="swiper-slide brand-logo brand-logo--slider">
                                    <a :href="data.partner_link" target="__blank">
                                        <div class="brand-logo__image">
                                            <img  :src="parent_url+`/uploads/images/clients/${data.image}`" alt="">
                                        </div>      
                                        <div class="brand-logo__image-hover">
                                            <img :src="parent_url+`/uploads/images/clients/${data.image}`"  alt="">
                                        </div>
                                    </a>
                                </div>
                  
                            </div>
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
        this.baseurl = 'http://127.0.0.1:9000';
        this.parent_url = 'http://127.0.0.1:8000';
        // this.baseurl = 'https://dhakaitsolutions.com';
        // this.parent_url = 'https://admin.dhakaitsolutions.com';
	}
}
</script>