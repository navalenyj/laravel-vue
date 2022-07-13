<template>
    <div>
        <spin v-if="loading"></spin>
        <div v-else-if="!loading && !not_found">
            <div class="mt-2">
                <div class="border border-dark rounded">
                    <div class="p-3">
                        <h2>
                            <div class="text-center">Одно объявление</div>
                        </h2>

                        <hr>
                        <div class="mt-3">
                            <h5 class="font-weight-bold">Имя: {{ post.name }}</h5>
                        </div>
                        <div class="mt-3">
                            <div class="">Описание: {{ post.body }}</div>
                        </div>
                        <div v-for="(img , index) in post.images">
                            <div class="mt-3">
                                <div class="">Фото-{{ ++index }}: {{ img.image }}</div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="">Цена:{{ post.price }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-if="not_found">
            404 , пост не найдеен
        </div>
    </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";
export default {
    components: {
        Spin
    },
    data: () => ({
        loading: true,
        post: [],
        not_found: false
    }),
    mounted() {
        this.loadPost(this.$route.params.id);
    },
    methods: {
        loadPost(id) {
            axios.get('/api/posts/' + id)
                .then(res => {
                    this.post = res.data;
                        this.loading = false;
                })
                .catch(err => {
                    this.not_found = true;
                })
        }
    }
}
</script>

<style scoped>

</style>
