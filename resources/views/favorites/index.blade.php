<x-app-layout>

    <div class="main-show-art">
        <div class="favorite-index1">
            <div class="title-area">
                <h3 class="title-area-text">Movies & TVShows</h3>
            </div>
            <div class="inner-table1">
                <ul role="list" class="inner-table2 ">
                    @foreach($arts as $art)
                    <li class="row-separation">
                        <div class="row4">
                            <div class="table-image">
                                @if($art->image)
                                <?php
                                $content = $art->image->image_content;
                                $image = $art->image->extension . "" . "" . $content;
                                $id = $art->id;
                                $favorite = $art->pivot->id;
                                ?>
                                <img class="image-in-table" src="{{$image}}" alt="{{$art->title}}" />
                                @else
                                <img class="image-in-table" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                                @endif
                            </div>
                            <div class="table-text-area">
                                <p class="table-text">
                                    {{$art->title}}
                                </p>
                            </div>
                            <div class="table-text-area">
                                <p class="table-text">
                                    {{$art->pivot->state}}
                                </p>
                            </div>
                            <div class="table-text-area">
                                <p class="table-text">
                                    {{$art->pivot->rating}}
                                </p>
                            </div>
                            <div class="button-above">
                                <a href="{{route('favorites.edit',$art->pivot->id)}}">
                                    <button class="button-purple-to-pink">
                                        <span class="button-span">
                                            Edit
                                        </span>
                                    </button>
                                </a>
                                <form action="{{route('favorites.destroy',['favorite' => $favorite])}}" method="POST">
                                    @csrf
                                    @method('post')

                                    <button type="submit" class="button-pink-to-orange">
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