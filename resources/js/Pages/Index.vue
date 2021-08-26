<template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="article in articles" :key="article.id">
                                <td>{{ article.title }}</td>
                                <td>{{ article.slug }}</td>
                                <td>{{ article.body }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <BreezeResponsiveNavLink :href="route('blog.add')" :active="route().current('blog.add')">
                        add blog
                    </BreezeResponsiveNavLink>

                <a href="/article/add" as="button" class="text-sm text-gray-700">
                </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'

export default {
    components: {
        BreezeResponsiveNavLink,
    },
    props: {
        articles: Array,
        users: Array,
    }
}
</script>

<style>

</style>
