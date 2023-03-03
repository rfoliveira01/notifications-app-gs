<template>
    <v-app>
        <v-card color="grey-lighten-3">
            <v-layout>
                <v-app-bar color="teal-darken-4">
                    <template v-slot:image>
                        <v-img gradient="to top right, rgba(19,84,122,.8), rgba(128,208,199,.8)"></v-img>
                    </template>

                    <v-app-bar-title>{{currentRouteName}}</v-app-bar-title>

                </v-app-bar>
                <v-main>
                    <v-container fluid>
                        <router-view />
                    </v-container>
                </v-main>
            </v-layout>
        </v-card>
    </v-app>
</template>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    computed: {
        currentRouteName() {
            return this.$route.name;
        }
    }
}
</script>