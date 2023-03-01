<template>
    <v-container>
        <v-row justify="space-between" class="text-center">
            <v-col>
                <v-btn icon="fa-heart" color="primary"></v-btn>
            </v-col>

            <v-col>
                <v-btn icon="fa-star" color="secondary"></v-btn>
            </v-col>

            <v-col>
                <v-btn icon="fa-cached" color="info"></v-btn>
            </v-col>

            <v-col>
                <v-btn icon="fa-thumb-up" color="success"></v-btn>
            </v-col>
        </v-row>

        <v-row justify="space-between" class="text-center">
            <v-col>
                <v-btn icon color="primary">
                    <v-icon>fa-heart</v-icon>
                </v-btn>
            </v-col>

            <v-col>
                <v-btn icon color="secondary">
                    <v-icon>fa-star</v-icon>
                </v-btn>
            </v-col>

            <v-col>
                <v-btn icon color="info">
                    <v-icon>fa-cached</v-icon>
                </v-btn>
            </v-col>

            <v-col>
                <v-btn icon color="success">
                    <v-icon>fa-thumb-up</v-icon>
                </v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
