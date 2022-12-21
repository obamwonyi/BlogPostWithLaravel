

<x-layout>
{{-- 
    @include("_posts-header") --}}

    @include("components.posts-header")

    {{-- <x-posts-header  :currentCategory="$currentCategory" :categories="$categories" /> --}}

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


        @if ($posts->count())
            <!-- this will pull in the featured component -->
            <!-- 
                Note a prop is created in the tag that can be accessed 
                at the component side .
            -->
            <x-post-grid :posts="$posts"/>


            {{ $posts->links() }}

        @else

            <p class="text-center">No posts yet. Please check back later.</p>

        @endif

    </main>

</x-layout>







