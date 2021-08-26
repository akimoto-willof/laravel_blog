<template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @CRLF
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ article }}</td>
                        </tr>
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        article: Array,
    }

}
</script>

<style>

</style>
