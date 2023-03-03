<template>
    <v-row>
        <v-col>
            <v-card class="mx-auto" color="teal-lighten-3" max-width="650">
                <v-toolbar flat color="teal-darken-4">
                    <v-btn icon="mdi-account"></v-btn>
                    <v-toolbar-title class="font-weight-light">
                        Send a Message
                    </v-toolbar-title>
                </v-toolbar>

                <v-card-text>
                    <v-autocomplete :items="categories" :disabled="categories.count == 0" color="white" item-title="name"
                        item-value="item.id" label="Category" return-object v-model="category"></v-autocomplete>
                    <v-textarea color="white" label="Name" v-model="message" rows="4" row-height="30"></v-textarea>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn append-icon="send" @click="sendMessage()">
                        Send
                    </v-btn>
                </v-card-actions>

                <v-snackbar v-model="messageSent" :timeout="2000" attach position="absolute" location="bottom left">
                    The message was sent
                </v-snackbar>
            </v-card>
        </v-col>
    </v-row>
    <v-row>
        <v-col>
            <v-table fixed-header height="300px">
                <thead>
                    <tr>
                        <th class="text-left">
                            Time
                        </th>
                        <th class="text-left">
                            Channel
                        </th>
                        <th class="text-left">
                            Message
                        </th>
                        <th class="text-left">
                            Category
                        </th>
                        <th class="text-left">
                            User
                        </th>
                        <th class="text-left">
                            Email
                        </th>
                        <th class="text-left">
                            Phone Number
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in logs" :key="item.id">
                        <td>{{ item.created_at }}</td>
                        <td>{{ item.channel }}</td>
                        <td>{{ item.message.message }}</td>
                        <td>{{ item.message.category.name }}</td>
                        <td>{{ item.user.name }}</td>
                        <td>{{ item.user.email }}</td>
                        <td>{{ item.user.phone_number }}</td>
                    </tr>
                </tbody>
            </v-table>
        </v-col>
    </v-row>
</template>
<script>
export default {
    data() {
        return {
            logs: null,
            categories: [],
            messageSent: false,
            message: '',
            category: null,
        }
    },
    mounted() {
        this.loadMessagesLog();
        this.loadCategories();
    },
    methods: {
        async loadMessagesLog() {
            try {
                const response = await axios.get(
                    "/logs"
                );
                this.logs = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async loadCategories() {
            try {
                const response = await axios.get(
                    "/categories"
                );
                this.categories = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        sendMessage() {
            try {
                const self = this;
                axios.post(
                    "/messages",
                    {
                        message: this.message,
                        category_id: this.category.id
                    }
                ).then(function (data) {
                    self.messageSent = true;
                    setTimeout(function () {
                        self.messageSent = false;
                        self.loadMessagesLog();
                    }, 2000);
                });
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
