<x-app-layout>

    <div class="main-show-art">
        <div class="table">
            <div class="title-area">
                <h3 class="title-area-text">Movies & TVShows</h3>
            </div>
            <div class="inner-table1">
                <ul role="list" class="inner-table2">
                    @foreach($arts as $art)
                    <li class="row-separation ">
                        <div class="row">
                            <div class="table-image ">
                                @if($art->image)
                                <?php
                                $content = $art->image->image_content;
                                $image = $art->image->extension . "" . "" . $content;
                                ?>
                                <img class="image-in-table" src="{{$image}}" alt="{{$art->title}}" />
                                @else
                                <img class="image-in-table" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                                @endif
                            </div>
                            <div class="table-text-area">
                                <p class="table-text">
                                    Title : {{$art->title}}
                                </p>
                            </div>

                            <div class="table-text-area ">
                                <p class="table-text">
                                    Role : {{$art->pivot->role}}
                                </p>
                            </div>
                            <form action="{{route('actors-actresses.removeFromArtDestroy',$actor_actress,$art)}}" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" id="pivot_id" name="pivot_id" value="{{$art->pivot->id}}">
                                <input type="hidden" id="art_id" name="art_id" value="{{$art->id}}">

                                <div>
                                    <button type="submit" class="form-button">Delete</button>
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