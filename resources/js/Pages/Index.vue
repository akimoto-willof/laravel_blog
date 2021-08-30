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
                                <!-- <td><a :href="route('blog.edit')" :active="route().current('blog.edit')">編集</a></td> -->
                                <!-- <td><a :href="route('blog.add')" :active="route().current('blog.add')">削除</a></td> -->
                            </tr>
                        </tbody>

                        <thead>
                            <tr>
                                <th>【Qiita】Title</th>
                                <th>Date</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="qiitaArticle in qiitaArticles" :key="qiitaArticle.guid">
                                <tr>
                                    <td>{{ qiitaArticle.title }}</td>
                                    <td>{{ qiitaArticle.pubDate }}</td>
                                    <td><a target="_blank" :href="qiitaArticle.link">詳細…</a></td>
                                </tr>
                            </template>
                        </tbody>

                    </table>
                    <BreezeResponsiveNavLink :href="route('blog.add')" :active="route().current('blog.add')">追加</BreezeResponsiveNavLink>

                <a href="/article/add" as="button" class="text-sm text-gray-700">
                </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import axios from 'axios'

export default {
    components: {
        BreezeResponsiveNavLink,
    },
    props: {
        articles: Array,
        users: Array,
    },
    data() {
        return {
            qiitaArticles: null,
        }
    },
    mounted() {
    const self = this;
    axios.get('https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fqiita.com%2Fhiroyuki_0507%2Ffeed&api_key=m2ksrp2xfjc8un9cobyywxstbsthyswxjzkafj6j')
      .then(function(response){
        console.log(response.data.items)
        self.qiitaArticles = response.data.items;
      })
      .catch(function(error){
        console.log(error);
      })
    }
}
</script>

<style>

</style>
