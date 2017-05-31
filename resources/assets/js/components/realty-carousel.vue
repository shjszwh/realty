<template>
    <div class="block">
        <el-carousel height="300px">
            <el-carousel-item v-for="item in items" :key="item.title">
                <div class="realty-carousel" :style="'background: url('+item.img+');'"></div>
            </el-carousel-item>
        </el-carousel>
    </div>
</template>
<script>
    export default {
        name: 'RealtyCarousel',
        data: function () {
            return {
                items: [
                    {
                        title: '标题1',
                        img: '/images/banner1.png',
                        con: '内容'
                    },
                    {
                        title: '标题2',
                        img: '/images/banner2.png',
                        con: '内容'
                    },
                    {
                        title: '标题3',
                        img: '/images/banner3.png',
                        con: '内容'
                    },
                ]
            };
        }
    }
</script>
<style>
.realty-carousel{
    width:100%;
}
</style>