<template>
    <v-pagination
      v-model="currentPage"
      :length="lastPage"
    ></v-pagination>
</template>

<script>
export default{
    computed: {
        currentPage: {
            get(){
                return this.$store.state.lead.leads.current_page;
            }
        },
        lastPage:{
            get(){
                return this.$store.state.lead.leads.last_page;
            }
        }
    }
}
</script>

