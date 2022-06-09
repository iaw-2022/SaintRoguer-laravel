<x-app-layout>

    <div class="main-show-art">
        <div class="favorite-index1">
            <div class="title-area">
                <h3 class="title-area-text">Tags</h3>
                <a href="{{route('tags.create')}}">
                    <button class="group button-teal-to-lime ">
                        <span class="button-span">
                            Create Tag
                        </span>
                    </button>
                </a>
            </div>
            <div class="inner-table1">
                <ul role="list" class="inner-table2 ">
                    @foreach($tags as $tag)
                    <li class="row-separation">
                        <div class="row3">
                            <div class="table-text-area">
                                <p class="table-text">
                                    {{$tag->name}}
                                </p>
                            </div>
                           
                            <div class="button-above">
                                <a href="{{route('tags.edit',$tag)}}">
                                    <button class="button-purple-to-pink">
                                        <span class="button-span">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                                <form action="{{route('tags.destroy',$tag)}}" method="POST">
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



                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>