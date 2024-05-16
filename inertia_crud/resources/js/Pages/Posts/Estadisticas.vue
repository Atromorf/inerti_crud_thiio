<script setup>
import GraficaBase from "@/Graficas/GraficaBasica.vue";
import SideBar from "@/Layouts/SideBar.vue";

defineProps({
    posts: {
        type: Array,
    },
    components: {
        GraficaBase,
        SideBar
    },
});
</script>

<template>
    <SideBar title="Stats" />
    <div class="flex justify-center max-w-[800px] m-auto">
    </div>
</template>