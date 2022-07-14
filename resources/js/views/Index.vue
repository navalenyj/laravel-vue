<template>
    <div>
        <spin v-if="loading"></spin>
        <div v-else="loading">
            <div class="d-flex justify-content-between">
                <div>
                    Сортировать по цене:
                    <a class="link link-primary pointed" v-on:click="sortByPriceUp" >Возрастанию</a>|
                    <a class="link link-primary pointed" v-on:click="sortByPriceDown" >Убавнию</a>
                </div>
                <div class="fs-5">
                    Сортировать по дате:
                    <a class="link link-primary pointed" v-on:click="sortByDateUp" >Старые</a>|
                    <a class="link link-primary pointed" v-on:click="sortByDateDown">Новые</a>
                </div>
            </div>


            <div>
                <div class="border border-dark rounded">
                    <div class="p-3">
                        <h2>
                            <div class="text-center">Все объявления</div>
                        </h2>
                        <div v-for="post in paginatedPosts">
                            <hr>
                            <div class="d-flex justify-content-between align-baseline">

                                <div class="mt-3">
                                    <h5 class="font-weight-bold">{{ post.name }} </h5>
                                </div>
                                <div class="mt-3">
                                    <h5 class="">{{ post.images.created_at}}</h5>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="">Описание: {{ post.body }}</div>
                            </div>
                            <div class="mt-3">
                                <div class="">Фото: {{ post.images.image }}</div>
                            </div>
                            <div class="mt-3">
                                <div class="">Цена: {{ post.price }}</div>
                            </div>

                            <div class="mt-3">
                                <router-link :to="{ path: '/post/' + post.id }" class="link">Подробнее</router-link>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center v-pogination">
                <div class="page border-dark border m-2 p-2" v-for="page in pages"
                     :key="page"
                     :class="{'page_selected': page === pageNumber}"
                     @click="pageClick(page)">
                    {{ page }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from 'axios';

export default {
    components: {
        Spin
    },
    data: () => ({
        loading: true,
        posts: [],
        postsPerPage: 10,
        pageNumber: 1
    }),
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data;
                    this.loading = false
                    console.log(res.data)
                })
        },
        //сортировка
        pageClick(page) {
            this.pageNumber = page
        },
        sortByPriceUp(){
            this.posts.sort((a,b)=>a.price - b.price)
        },
        sortByPriceDown(){
            this.posts.sort((a,b)=>b.price - a.price)
        },
        sortByDateUp(){
             this.posts.sort((a,b)=>a.images.created_at.localeCompare(b.images.created_at))
        },
        sortByDateDown(){
            this.posts.sort((a,b)=>b.images.created_at.localeCompare(a.images.created_at))
        }
    },
    computed: {
        //пагинация
        pages() {
            return Math.ceil(this.posts.length / 10);
        },
        paginatedPosts() {
            let from = (this.pageNumber - 1) * this.postsPerPage;
            let to = from + this.postsPerPage;
            return this.posts.slice(from, to);
        }
    }
}
</script>

<style>
.page:hover {
    background: #2a9055;
    cursor: pointer;
}

.page_selected {
    background: #2a9055;
}

.pointed{
    cursor: pointer;
}
</style>
