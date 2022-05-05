<x-app-layout>

    <div class="main-show-art">
        <div class="p-4  bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Movies & TVShows</h3>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($arts as $art)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4 grid grid-cols-1 lg:grid-cols-5">
                            <div class="flex-shrink-0">
                                @if($art->image)
                                <?php
                                $content = $art->image->image_content;
                                $image = $art->image->extension . "" . "" . $content;
                                $id = $art->id;
                                $favorite = $art->pivot->id;
                                ?>
                                <img class="w-20 h-20 rounded-full" src="{{$image}}" alt="{{$art->title}}" />
                                @else
                                <img class="w-20 h-20 rounded-full" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="white-space: pre-wrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{$art->title}}
                                </p>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="white-space: pre-wrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{$art->pivot->state}}
                                </p>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="white-space: pre-wrap text-sm font-medium text-gray-900 dark:text-white">
                                    {{$art->pivot->rating}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="{{route('favorites.edit',$art->pivot->id)}}">
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                                <form action="{{route('favorites.destroy',['favorite' => $favorite])}}" method="POST">
                                    @csrf
                                    @method('post')

                                    <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Eliminate
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>



                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>