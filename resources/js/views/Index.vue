<template>
    <div>
        <spin v-if="loading"></spin>
        <div v-else="loading">
            <div class="mt-2">
                <div class="border border-dark rounded">
                    <div class="p-3">
                        <h2>
                            <div class="text-center">Все объявления</div>
                        </h2>
                        <div v-for="post in posts">
                            <hr>
                            <div class="mt-3">
                                <h5 class="font-weight-bold">{{ post.name }}  </h5>
                            </div>
                            <div class="mt-3">
                                <div class="">Описание: {{ post.body}} </div>
                            </div>
                                <div class="mt-3">
                                    <div class="">Фото: {{post.images.image}}</div>
                                </div>
                            <div class="mt-3">
                                <div class="">Цена: {{ post.price}}</div>
                            </div>
                            <div class="mt-3">
                                <router-link :to="{ path: '/post/' + post.id }" class="link">Подробнее</router-link>
                            </div>
                        </div>


                    </div>
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
        posts: []
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
                })
        }
    }
}
</script>

<style scoped>

</style>
