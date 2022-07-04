<template>
<layout>
<div>
<Head title="Home | Simen">
  <title>404 | Simen </title>
  <meta name="description" content="Welcome To Dhaka It Solution">
</Head>
<div class="page_wrapper">




<!-- BREADCRUMBS -->
<div id="sns_breadcrumbs" class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="sns_titlepage"></div>
                <div id="sns_pathway" class="clearfix">
                    <div class="pathway-inner">
                        <span class="icon-pointer "></span>
                        <ul class="breadcrumbs">
                            <li class="home">
                                <a title="Go to Home Page" href="#">
                                    <i class="fa fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="category3 last">
                                <span>404</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- AND BREADCRUMBS -->

<!-- CONTENT -->
<div id="sns_content" class="wrap layout-m">
    <div class="container">
        <div class="row">
            <div class="content">
                <h1>404</h1>
                <h2>Page not found</h2>
                <p>Sory but  the page you are looking for does not exit, have been removed or name changed.
                    Go back Homepage or enter the key words to search, please!</p>
                <form id="newsletter-validate">
                    <div class="input-box">
                        <div class="input_warp">
                            <input id="newsletter1" class="input-text"  placeholder="Enter the key words" type="text" name="email">
                            <button class="button" title="Subscribe" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- AND CONTENT -->



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
import Form from 'vform'
import Swal from 'sweetalert2'
export default {
    mode: 'history',
    data() {
        return {
            protfolios2: this.protfolios,
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

    props: ['banner', 'status', 'errors'],
    components:{
        Layout,
    },
    methods:{
        showTab(category_id){
           $('.tab-pane').hide();
           $('#tab_list_'+category_id).show();
        },
        blogDate(date){
            return moment(date).format('DD MMM, YYYY')
        },
        async message(){
            await this.form.post('/message').then(response => {
                if(response.data.status == 1){
                    Swal.fire({
                        imageUrl: '/uploads//assets//assets//assets//assets/images/backend-logo.jpg',
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
        },

        scrollToTop() {
            window.scrollTo(0,0);
        },
    },

    watch:{
        $route(to, from){
            const plugin = document.createElement("script");
            plugin.setAttribute( "src", this.baseurl+"/assets/js/vendor/modernizr-2.8.3.min.js");
            plugin.async = true;
            document.body.appendChild(plugin);
        }
    },

	mounted(){
        const plugin = document.createElement("script");
        plugin.setAttribute( "src", this.baseurl+"/assets/js/plugins/plugins.min.js");
        plugin.setAttribute( "src", this.baseurl+"/assets/js/vendor/modernizr-2.8.3.min.js");
        plugin.async = true;
        document.body.appendChild(plugin);

        this.baseurl = 'http://127.0.0.1:9000';
        this.parent_url = 'http://127.0.0.1:8000';
        
        this.scrollToTop();
	}
}
</script>