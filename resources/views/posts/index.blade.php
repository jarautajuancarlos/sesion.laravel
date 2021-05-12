<x-app-layout>

  <div class="container py-8">

    <div class="grid grid-cols-3 gap-6">

      @foreach ($posts as $post)

        <article
        class="w-full h-80 bg-cover bg-center @if($loop->first) col-span-2 @endif "
        style="background-image: url({{Storage::url(optional($post->image)->url)}})">
          <div class=" w-full h-full px-8 flex flex-col justify-center">
            <div>
            </div>
            <h1 class="text-4xl text-white leading-8 font-bold">
              <a>{{$post->name}}</a>
            </h1>
          </div>
        </article>

      @endforeach

    </div>
  </div>

</x-app-layout>
