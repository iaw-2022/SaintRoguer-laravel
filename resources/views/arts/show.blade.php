<x-app-layout>
    <div class="main-show-art">
        <div class='show-card-art'>
            <div class='show-card-art-border'></div>

            <div class="show-card-transition2">
                <div class="show-card-transition"></div>
                <div class="relative cursor-pointer group z-10 px-10 pt-10 space-y-6 movie_info" data-lity="" href="https://www.youtube.com/embed/aSHs224Dge0">
                    <div class="poster__info align-self-end w-full">
                        <div class="h-32"></div>
                        <div class="space-y-6 detail_info">
                            <div class="flex flex-col space-y-2 inner">
                                <a class="relative flex items-center w-min flex-shrink-0 p-1 text-center text-white bg-red-500 rounded-full group-hover:bg-red-700" data-unsp-sanitized="clean">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM9.555 7.168A1 1 0 0 0 8 8v4a1 1 0 0 0 1.555.832l3-2a1 1 0 0 0 0-1.664l-3-2z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div class="absolute transition opacity-0 duration-500 ease-in-out transform group-hover:opacity-100 group-hover:translate-x-16 text-xl font-bold text-white group-hover:pr-2">Trailer</div>
                                </a>
                                <h3 class="text-2xl font-bold text-white" data-unsp-sanitized="clean">{{$art->title}}</h3>
                            </div>
                            <div class="flex flex-row justify-between datos">
                                <div class="flex flex-col datos_col">
                                    <?php

                                    $avgRating = 0;
                                    $count = 0;
                                    foreach ($art->critics as $critic) {
                                        $avgRating += $critic->rating;
                                        $count++;
                                    }
                                    if ($count > 0)
                                        $avgRating = $avgRating / $count;
                                    ?>
                                    <div class="popularity">{{$avgRating}}</div>
                                    <div class="text-sm text-gray-400">Critic rating:</div>
                                </div>
                                <div class="flex flex-col datos_col">
                                    <div class="release">{{$art->releaseDate}}</div>
                                    <div class="text-sm text-gray-400">Release date:</div>
                                </div>
                                <div class="flex flex-col datos_col">
                                    <div class="release">{{$art->duration}} min</div>
                                    <div class="text-sm text-gray-400">Runtime:</div>
                                </div>
                            </div>
                            <div class="flex flex-col overview">
                                <div class="flex flex-col"></div>
                                <div class="text-xs text-gray-400 mb-2">Overview:</div>
                                <p class="text-xs text-gray-100 mb-6">
                                    {{$art->plot}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if($art->image)
                <?php
                $content = $art->image->image_content;
                $image = $art->image->extension . "" . "" . $content;
                ?>
                <img class="absolute inset-0 transform w-full -translate-y-4" src="{{$image}}" alt="{{$art->title}}" style=" filter: grayscale(0); " />
                @else
                <img class="absolute inset-0 transform w-full -translate-y-4" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" style=" filter: grayscale(0); " />
                @endif
                <div class="poster__footer flex flex-row relative pb-10 space-x-4 z-10">
                    <form class="flex items-center py-2 px-4 rounded-full mx-auto text-white bg-red-500 hover:bg-red-700" action="{{route('favorites.store',$art)}}" method="POST">
                        @csrf
                        @method('post')

                        <input type="hidden" id="art_id" name="art_id" value="{{$art->id}}">

                            <button type="submit" class="text-sm text-white ml-2">Add to list</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-12 ">
            <!-- Actor / Actress -->
            <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Cast</h3>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($actors_actresses as $actor_actress)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-shrink-0">
                                    @if($actor_actress->image)
                                    <?php
                                    $content = $actor_actress->image->image_content;
                                    $image = $actor_actress->image->extension . "" . "" . $content;
                                    ?>
                                    <img class="w-8 h-8 rounded-full" src="{{$image}}" alt="{{$actor_actress->title}}">
                                    @else
                                    <img class="w-8 h-8 rounded-full" src="{{asset('images/actor_actress_placeholder.jpg')}}" alt="{{$actor_actress->title}}">
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{$actor_actress->name}}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{$actor_actress->pivot->role}}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Critics -->
            <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Critics</h3>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <a href="{{route('critics.create',['art'=>$art])}}">
                        <button class=" relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Add a Critic
                            </span>
                        </button>
                    </a>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($critics as $critic)
                        <li class="py-3 sm:py-4">

                            <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">

                                <div>
                                    <h2 class="text-gray-800 text-3xl font-semibold">{{$critic->from}}</h2>
                                    <p class="mt-2 text-gray-600">{{$critic->comment}}</p>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <div class="text-xl font-medium text-indigo-500">{{$critic->rating}}</div>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white mt-4">
                                <a href="{{route('critics.edit',$critic)}}">
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                                <form action="{{route('critics.destroy',['critic' => $critic, 'art' => $art])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Eliminate
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>