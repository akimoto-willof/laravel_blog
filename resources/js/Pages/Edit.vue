<template>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="/article/update/{{$article->id}}" method="post">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <label class="block">
                                <span class="text-gray-700">Title</span>
                                <input type="text" name="title" class="mt-1 block w-full" :value="$article">
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Body</span>
                                <textarea class="mt-1 block w-full" rows="3" name="body" v-model="$article"></textarea>
                            </label>
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="send">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
