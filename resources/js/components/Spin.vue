<template>
    <div>
        <div class="spin">
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Spin"
}
</script>

<style>
    .spin{
        position: absolute;
        left: 50%;
        top:50%;
        transform: translate(50%,50%);
    }
</style>
