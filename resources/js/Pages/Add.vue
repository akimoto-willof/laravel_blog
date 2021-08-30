<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-1 gap-6">
                            <!-- <input type="hidden" name="user_id" v-model="form.user_id"> -->
                            <!-- :todo user-id表示できるように採番 -->
                            <label class="block">
                                <span class="text-gray-700">Title</span>
                                <input type="text" name="title" class="mt-1 block w-full" v-model="form.title">
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Body</span>
                                <textarea class="mt-1 block w-full" rows="3" name="body" v-model="form.body"></textarea>
                            </label>
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="send">
                        </div>
                    </form>
                    <BreezeResponsiveNavLink :href="route('blog.index')" :active="route().current('blog.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-10 rounded focus:outline-none focus:shadow-outline text-center">
                        back
                    </BreezeResponsiveNavLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'

export default {
    name: "add",
    components: {
      BreezeResponsiveNavLink,
    },
    props: {
        users: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                user_id: this.$attrs.articles.pop().id + 1,
                title: '',
                slug: '',
                body: '',
            })
        }
    },
    methods: {
        submit() {
            this.form.post(this.route('blog.create'))
        }
    },
    // computed: {
    //     addId() {
    //         if(this.users){
    //             return this.users.user_id++
    //         } else {
    //             return 1
    //         }
    //     }
    // }
}
</script>
