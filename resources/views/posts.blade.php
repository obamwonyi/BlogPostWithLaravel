

<x-layout>

    @include("_posts-header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


        @if ($posts->count())
            <!-- this will pull in the featured component -->
            <!-- 
                Note a prop is created in the tag that can be accessed 
                at the component side .
            -->
            <x-post-grid :posts="$posts"/>

        @endif

    </main>

</x-layout>







