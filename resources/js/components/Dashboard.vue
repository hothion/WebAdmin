<template>
 <div class="container">
     <div>
     <navigation />
     </div>
    <div>
        <content />
    </div>
 </div>
</template>
<script>
import content from './Content.vue';
import navigation from './Navigation.vue';
export default {
 name: 'app',
    data(){
        return{
            msg:'Hello '
        }
    },
    components:{
         content,
         navigation
    }
}
</script>
<style lang="scss">
</style>
