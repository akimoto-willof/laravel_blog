<template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-10">
                        <div class="mb-10 p-2 border-gray-200 border-solid border-b-2 text-2xl">SNS</div>
                        <a class="twitter-timeline" data-width="500" data-height="300" href="https://twitter.com/Akimon6134?ref_src=twsrc%5Etfw">Tweets by Akimon6134</a>
                    </div>

                    <div class="mt-32">
                        <div class="mb-10 p-2 border-gray-200 border-solid border-b-2 text-2xl">blog</div>
                        <table class="table-auto mt-10 w-full">
                            <thead>
                                <tr class="p-2 text-lg">
                                    <th class="w-7/12">Title</th>
                                    <th class="w-4/12">Date</th>
                                    <th class="w-1/12">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="qiitaArticle in qiitaArticles" :key="qiitaArticle.guid">
                                    <tr class="pb-4 hover:bg-gray-100">
                                        <td class="text-center p-5"><a class="block" target="_blank" :href="qiitaArticle.link">{{ qiitaArticle.title }}</a></td>
                                        <td class="text-center p-5"><a class="block" target="_blank" :href="qiitaArticle.link">{{ qiitaArticle.pubDate }}</a></td>
                                        <td class="text-center p-5"><a class="block" target="_blank" :href="qiitaArticle.link">詳細…</a></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <!-- <BreezeResponsiveNavLink :href="route('blog.add')" :active="route().current('blog.add')">追加</BreezeResponsiveNavLink> -->
                    <div class="mt-32">
                        <div class="mb-10 p-2 border-gray-200 border-solid border-b-2 text-2xl">news</div>
                        <select class="block mb-10 text-center w-2/5" name="news" v-model="searchQuiz">
                            <option value="business">ビジネス</option>
                            <option value="entertainment">エンタメ</option>
                            <option value="health">ヘルス</option>
                            <option value="science">サイエンス</option>
                            <option value="sports">スポーツ</option>
                            <option value="technology">IT</option>
                        </select>
                        <table class="table-auto mt-10 w-full">
                            <thead>
                                <tr>
                                    <th class="w-4/12">Image</th>
                                    <th class="w-7/12">Title</th>
                                    <th class="w-1/12">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="newsArticle in newsArticles" :key="newsArticle">
                                    <tr class="pb-4 hover:bg-gray-100">
                                        <td class="text-center"><a class="block" target="_blank" :href="newsArticle.url"><img class="w-3/6 h-32 m-auto object-cover" :src="newsArticle.urlToImage" alt="" srcset=""></a></td>
                                        <td class="text-center"><a class="block" target="_blank" :href="newsArticle.url">{{ newsArticle.title }}</a></td>
                                        <td class="text-center"><a class="block" target="_blank" :href="newsArticle.url">詳細…</a></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import axios from 'axios'

    const qiitaURL = 'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fqiita.com%2Fhiroyuki_0507%2Ffeed&api_key=m2ksrp2xfjc8un9cobyywxstbsthyswxjzkafj6j'
    const newsPram = 'https://newsapi.org/v2/everything?'
    const newsKey = '32e3595e76c247fea16c5fd7d7bb2df2'

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
            newsArticles: null,
            searchQuiz: 'business'
        }
    },
    mounted() {
        let tweetScript = document.createElement('script')
        tweetScript.setAttribute('src', 'https://platform.twitter.com/widgets.js')
        document.head.appendChild(tweetScript)


        const self = this;
        axios.get(qiitaURL)
        .then(function(response){
            self.qiitaArticles = response.data.items;
        })
        .catch(function(error){
            console.log(error);
        })

        axios.get(`https://newsapi.org/v2/top-headlines?country=jp&category=${this.searchQuiz}&apiKey=${newsKey}`)
        .then(function(response){
            self.newsArticles = response.data.articles;
        })
        .catch(function(error){
            console.log(error);
        })
    },
    watch: {
        searchQuiz() {
            const self = this;
            axios.get(`https://newsapi.org/v2/top-headlines?country=jp&category=${this.searchQuiz}&apiKey=${newsKey}`)
            .then(function(response){
                console.log(response, 'データ')
                self.newsArticles = response.data.articles;
            })
            .catch(function(error){
                console.log(error);
            })
        }
    }
}
</script>

<style>

</style>
