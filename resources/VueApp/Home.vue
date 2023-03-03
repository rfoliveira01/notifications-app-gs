<template>
    
    <v-card height="800">
        <v-card-title primary-title>
            <div id="welcome-message">
                <h1>{{ welcomeMessage }}</h1>
            </div>
        </v-card-title>
        <v-card-actions class="justify-center">
            <v-btn  color="blue-grey" prepend-icon="mdi-email-multiple-outline" variant="outlined" @click="openMessageHome()">
                Send a Message
            </v-btn>
        </v-card-actions>
    </v-card>
</template>
<script>
    export default {
        mounted() {
        },
        data(){
            return {
                welcomeMessage: 'Welcome to the notification app'
            }
        },
        methods:{
            openMessageHome(){
                this.$router.push('/messages');
            }
        }
    }
</script>
<style scoped>
    #welcome-message{
        text-align: center;
    }
</style>