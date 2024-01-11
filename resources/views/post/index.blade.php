<?php
/** @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>

<x-app-layout :meta_title="'The test blog - ' .$category->title" meta-description="By category description">
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @foreach($posts as $post)
            <x-post-item :post="$post"></x-post-item>
        @endforeach

        {{ $posts->onEachSide(1)->links() }}

    </section>

    <!-- Sidebar Section -->
    <x-sidebar :post="$post"></x-sidebar>
</x-app-layout>
