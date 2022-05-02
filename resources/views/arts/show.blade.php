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

                    <a class="flex items-center py-2 px-4 rounded-full mx-auto text-white bg-red-500 hover:bg-red-700" href="la ruta de la lista, agregando esto a la lista con el cartel verde, si ya esta se pone el rojo indicando que ya esta en la lisa">
                        <div class="text-sm text-white ml-2">Add to list</div>
                    </a>
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
                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{$actor_actress->name}}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{$actor_actress->role}}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="p-4 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Critics</h3>
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
                                    <a href="#" class="text-xl font-medium text-indigo-500">{{$critic->rating}}</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>