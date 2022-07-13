<template>
    <div>
        <div class="mt-2">
            <div class="border border-dark rounded">
                <div class="p-3">
                    <h2>
                        <div class="text-center">Добавление поста</div>
                    </h2>
                    <div class="alert alert-danger" v-if="error" role="alert">
                        Проверьте правильность полей
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="" class="form-label">Название</label>
                            <input type="text" v-model:form="form.name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Описание</label>
                            <textarea type="text" v-model:form="form.body" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Фото#1</label>
                            <input type="text" v-model:form="form.image_main" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Фото#2(необязательное поле)</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Фото#3(необязательное поле)</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Цена</label>
                            <input type="number" v-model:form="form.price"  class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" @click.prevent="store">
                            Опубликовать
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data: ()=>({
        form:{
            name:"",
            body: "",
            price: "",
            image_main: ""
        },
        error: false
    }),
    mounted() {

    },
    methods:{
        store() {
            this.loading = true;
            axios.post('/api/posts', this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/post/' + res.data.post);
                    }else {
                        this.error=true;
                    }
                })
                .catch(err=>{
                    this.error=true;
                })
        }
    }
}
</script>

<style scoped>

</style>
