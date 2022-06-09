<x-app-layout>

    <div class="main-show-art">
        <div class="table">
            <div class="title-area">
                <h3 class="title-area-text">Actors & Actresses</h3>
                <a href="{{route('actors-actresses.create')}}">
                    <button class="group button-teal-to-lime ">
                        <span class="button-span">
                            Add
                        </span>
                    </button>
                </a>
            </div>
            <div class="inner-table1">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($actors_actresses as $actor_actress)
                    <li class="row-separation">
                        <div class="row2">
                            <div class="table-image">
                                @if($actor_actress->image)
                                <?php
                                $content = $actor_actress->image->image_content;
                                $image = $actor_actress->image->extension . "" . "" . $content;
                                ?>
                                <img class="image-in-table" src="{{$image}}" alt="{{$actor_actress->title}}" />
                                @else
                                <img class="image-in-table" src="{{asset('images/actor_actress_placeholder.jpg')}}" alt="{{$actor_actress->title}}" />
                                @endif
                            </div>
                            <div class="table-text-area">
                                <p class="table-text">
                                    {{$actor_actress->name}}
                                </p>
                            </div>
                            <div>
                                <a href="{{route('actors-actresses.addToArt',$actor_actress)}}">
                                    <button class="button-cyan-to-blue">
                                        <span class="button-span">
                                            Add to Movie or TVShow
                                        </span>
                                    </button>
                                </a>
                            </div>
                            <div>
                                <a href="{{route('actors-actresses.removeFromArt',$actor_actress)}}">
                                    <button class="button-red-to-yellow">
                                        <span class="button-span">
                                            Remove from Movie or TVShow
                                        </span>
                                    </button>
                                </a>
                            </div>

                            <div>
                                <a href="{{route('actors-actresses.edit',$actor_actress)}}">
                                    <button class="button-purple-to-pink">
                                        <span class="button-span">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                            </div>
                            <div>
                                <form action="{{route('actors-actresses.destroy',$actor_actress)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="button-pink-to-orange">
                                        <span class="button-span">
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
        <div class="link">
            {{$actors_actresses->links()}}
        </div>
    </div>
</x-app-layout>