<x-app-layout>

    <div class="main-show-art">
        <div class="p-4  bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Actors & Actresses</h3>
                <a href="{{route('actors-actresses.create')}}">
                    <button class=" relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Add
                        </span>
                    </button>
                </a>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($actors_actresses as $actor_actress)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4 grid grid-cols-1 lg:grid-cols-4">
                            <div class="flex-shrink-0">
                                @if($actor_actress->image)
                                <?php
                                $content = $actor_actress->image->image_content;
                                $image = $actor_actress->image->extension . "" . "" . $content;
                                ?>
                                <img class="w-20 h-20 rounded-full" src="{{$image}}" alt="{{$actor_actress->title}}" />
                                @else
                                <img class="w-20 h-20 rounded-full" src="{{asset('images/actor_actress_placeholder.jpg')}}" alt="{{$actor_actress->title}}" />
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$actor_actress->name}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <a href="{{route('actors-actresses.edit',$actor_actress)}}">
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <form action="{{route('actors-actresses.destroy',$actor_actress)}}" method="POST">
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
        <div class="mx-4 py-8">
            {{$actors_actresses->links()}}
        </div>
    </div>
</x-app-layout>