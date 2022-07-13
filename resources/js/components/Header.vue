<template>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid ms-xl-5 me-xl-5 me-lg-0 ms-lg-0 pt-1 pb-1">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3 me-3">
                        <li v-for="link in links" class="nav-item">
                            <router-link class="nav-link" aria-current="page"
                               :to="link.href">{{ link.title }}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


</template>

<script>
export default {
   data(){
       return {
           links: [
               {
                   title: 'Главная',
                   href: '/'
               },
               {
                   title: 'Добавить объявление',
                   href: '/addPost'
               }
           ]
       }
   }
}
</script>

<style scoped>

</style>
