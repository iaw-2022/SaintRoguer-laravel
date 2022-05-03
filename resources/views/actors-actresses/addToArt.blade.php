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
                                $id = $art->id;
                                ?>
                                <img class="w-20 h-20 rounded-full" src="{{$image}}" alt="{{$art->title}}" />
                                @else
                                <img class="w-20 h-20 rounded-full" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$art->title}}
                                </p>
                            </div>
                            <form action="{{route('actors-actresses.addToArtStore',$actor_actress,$art)}}" method="POST">
                                @csrf
                                @method('post')
                                <div class="mb-6">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Role</label>
                                    <input type="hidden" id="art_id" name="art_id" value="{{$art->id}}">
                                    <input type="text" id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Shrek" required>
                                </div>
                                <div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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