<x-app-layout>

    <div class="main-art">
        <div class="header flex top-art">
            <div class="title">
                <p class="page-title-art">
                    Art catalog
                </p>
                <a href="{{route('arts.create')}}">
                    <button class=" relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 ">
            @foreach ($arts as $art)
            <div class="card-art rounded-lgcursor-pointer ">
                <h1 class="w-full block h-full ">
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
                            <div class="flex items-center mt-4">
                                @foreach ($art->tags as $tag)
                                <button type="button" class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                    {{$tag->name}}
                                </button>
                                @endforeach
                            </div>
                    </a>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white mt-4">
                        <a href="{{route('arts.edit',$art)}}">
                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Edit
                                </span>
                            </button>
                        </a>
                        <form action="{{route('arts.destroy',$art)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
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
    <div class="mx-4 py-8">
        {{$arts->links()}}
    </div>
    </div>

</x-app-layout>