
<x-layout>


    <div class="container">

        @foreach ($posts as $post)

        <h1>{{ $post->title }}</h1>
    
        <div>
            <p>
                {{ $post->body }}
            </p>
        </div>
            
        @endforeach

    </div>


</x-layout>



