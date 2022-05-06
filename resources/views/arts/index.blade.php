<x-app-layout>

    <div class="main-art">
        <div class="header top-art">
            <div class="title">
                <p class="page-title-art">
                    Art catalog
                </p>
                <a href="{{route('arts.create')}}">
                    <button class=" button-teal-to-lime">
                        <span class="button-span">
                            Add Movie or TVSeries
                        </span>
                    </button>
                </a>
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
        <div class="art-index-table ">
            @foreach ($arts as $art)
            <div class="card-art rounded-lgcursor-pointer ">
                <h1 class="card-h1  ">
                    <a href="{{route('arts.show',$art)}}">
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
                            <div class="tag-pos">
                                @foreach ($art->tags as $tag)
                                <button type="button" class="tag-index">
                                    {{$tag->name}}
                                </button>
                                @endforeach
                            </div>
                    </a>
                    <div class="button-above">
                        <a href="{{route('arts.edit',$art)}}">
                            <button class="button-purple-to-pink">
                                <span class="button-span">
                                    Edit
                                </span>
                            </button>
                        </a>
                        <form action="{{route('arts.destroy',$art)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="button-pink-to-orange">
                                <span class="button-span">
                                    Eliminate
                                </span>
                            </button>
                        </form>
                    </div>

            </div>
            </h1>
        </div>
        @endforeach
    </div>
    <div class="links">
        {{$arts->links()}}
    </div>
    </div>

</x-app-layout>