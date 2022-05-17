<x-app-layout>

    <div class="main-show-art">
        <div class="favorite-index1">
            <div class="title-area">
                <h3 class="title-area-text">Tags</h3>
                <a href="{{route('tags.add',$art)}}">
                    <button class="group button-teal-to-lime ">
                        <span class="button-span">
                            Add Tag to Movie or TV Show
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
                                <form action="{{route('tags.remove',$art)}}" method="POST">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" id="tag_id" name="tag_id" value="{{$tag->id}}">
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