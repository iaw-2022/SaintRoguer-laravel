<x-app-layout>

    <div class="main-show-art">
        <div class="table">
            <div class="title-area">
                <h3 class="title-area-text">Movies & TVShows</h3>
            </div>
            <div class="inner-table1">
                <ul role="list" class="inner-table2">
                    @foreach($arts as $art)
                    <li class="row-separation">
                        <div class="row">
                            <div class="table-image">
                                @if($art->image)
                                <?php
                                $content = $art->image->image_content;
                                $image = $art->image->extension . "" . "" . $content;
                                $id = $art->id;
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
                            <form action="{{route('actors-actresses.addToArtStore',$actor_actress,$art)}}" method="POST">
                                @csrf
                                @method('post')
                                <div class="mb-6">
                                    <label for="role" class="label-1">Role</label>
                                    <input type="hidden" id="art_id" name="art_id" value="{{$art->id}}">
                                    <input type="text" id="role" name="role" class="text-2" placeholder="Shrek" required>
                                </div>
                                <div>
                                    <button type="submit" class=" group button-cyan-to-blue">
                                        <span class="button-span">
                                            Add Role
                                        </span>
                                    </button>
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