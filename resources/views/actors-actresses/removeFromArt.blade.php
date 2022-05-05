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
                        <div class="flex items-center space-x-4 grid grid-cols-1 lg:grid-cols-4">
                            <div class="flex-shrink-0">
                                @if($art->image)
                                <?php
                                $content = $art->image->image_content;
                                $image = $art->image->extension . "" . "" . $content;
                                ?>
                                <img class="w-20 h-20 rounded-full" src="{{$image}}" alt="{{$art->title}}" />
                                @else
                                <img class="w-20 h-20 rounded-full" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Title : {{$art->title}}
                                </p>
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Role : {{$art->pivot->role}}
                                </p>
                            </div>
                            <form action="{{route('actors-actresses.removeFromArtDestroy',$actor_actress,$art)}}" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" id="pivot_id" name="pivot_id" value="{{$art->id}}">
                                <input type="hidden" id="art_id" name="art_id" value="{{$art->art_id}}">

                                <div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
                                </div>
                            </form>
                        </div>



                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mx-4 py-8">
            {{$arts->links()}}
        </div>
    </div>
</x-app-layout>