<x-app-layout>

    <div class="main-art">
        <div class="header flex top-art">
            <div class="title">
                <p class="page-title-art">
                    Art catalog
                </p>
                <p class="search-description-art">
                    Search for art.
                </p>
            </div>
            <div class="text-end">
                <form class="flex search-form-art">
                    <div class=" relative ">
                        <input type="text" id="&quot;form-subscribe-Search" class=" border search-form-text-art" placeholder="Enter a title" />
                    </div>
                    <button class="search-form-button-art" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 ">
            @foreach ($arts as $art)
            <div class="card-art rounded-lgcursor-pointer ">

                <a href="{{route('arts.show',$art)}}" class="w-full block h-full ">
                    @if($art->image)
                    <?php
                    $content = $art->image->image_content;
                    $image = $art->image->extension . "" . "" . $content;
                    ?>
                    <img class="image-art object-fit" src="{{$image}}" alt="{{$art->title}}">
                    @else
                    <img class="image-art object-fit" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}">
                    @endif
                    <div class="card-botom-art">
                        <p class="text-md  title-art">
                            {{$art->title}}
                        </p>
                        <div class="flex items-center mt-4">
                            @foreach ($art->tags as $tag)
                            <button type="button" class="tag-art  h-90 w-60 ">
                                {{$tag->name}}
                            </button>
                            @endforeach
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
        </div>
        <div class="mx-4 py-8">
            {{$arts->links()}}
        </div>
    </div>

</x-app-layout>