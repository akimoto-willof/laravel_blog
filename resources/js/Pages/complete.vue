<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        更新が完了しました。
                    </div>
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
    components: {
      BreezeResponsiveNavLink,
    },
}
</script>

<style>

</style>
