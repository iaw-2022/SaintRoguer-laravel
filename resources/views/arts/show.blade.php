<x-app-layout>
    <div class="main-show-art">
        <div class='show-card-art'>
            <div class='show-card-art-border'></div>

            <div class="show-card-transition2">
                <div class="show-card-transition"></div>
                <div class="show-art-card2" data-lity="" href="https://www.youtube.com/embed/aSHs224Dge0">
                    <div class="poster__info align-self-end w-full">
                        <div class="h-32"></div>
                        <div class="show-art-card1">
                            <div class="show-art-text1">
                                <h3 class="show-art-text2" data-unsp-sanitized="clean">{{$art->title}}</h3>
                            </div>
                            <div class="show-art-card4 ">
                                <div class="show-art-card5">
                                    <?php

                                    $avgRating = 0;
                                    $count = 0;
                                    foreach ($art->critics as $critic) {
                                        $avgRating += $critic->rating;
                                        $count++;
                                    }
                                    if ($count > 0)
                                        $avgRating = $avgRating / $count;
                                    ?>
                                    <div class="popularity">{{$avgRating}}</div>
                                    <div class="show-art-text3">Critic rating</div>
                                </div>
                                <div class="show-art-structure">
                                    <div class="release">{{$art->releaseDate}}</div>
                                    <div class="show-art-text3">Release date</div>
                                </div>
                                <div class="show-art-structure">
                                    <div class="release">{{$art->duration}} min</div>
                                    <div class="show-art-text3">Runtime</div>
                                </div>
                            </div>
                            <div class="show-art-structure">
                                <div class="show-art-structure"></div>
                                <div class="show-art-text4">Overview:</div>
                                <p class="show-art-text5">
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
                <img class="show-art-image1" src="{{$image}}" alt="{{$art->title}}" style=" filter: grayscale(0); " />
                @else
                <img class="show-art-image1" src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" style=" filter: grayscale(0); " />
                @endif
                <div class="show-art-form">
                    <form class="show-art-form2" action="{{route('favorites.store',$art)}}" method="POST">
                        @csrf
                        @method('post')

                        <input type="hidden" id="art_id" name="art_id" value="{{$art->id}}">

                        <button type="submit" class="button-red ">Add to list</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="show-art-table-act ">
            <!-- Actor / Actress -->
            <div class="show-art-table-act-1">
                <div class="title-area">
                    <h3 class="title-area-text">Artist</h3>
                    <h3 class="title-area-text">Role</h3>
                </div>
                <div class="inner-table1">
                    <ul role="list" class="inner-table2">
                        @foreach($actors_actresses as $actor_actress)
                        <li class="row-separation">
                            <div class="row3">

                                <div class="table-image">
                                    @if($actor_actress->image)
                                    <?php
                                    $content = $actor_actress->image->image_content;
                                    $image = $actor_actress->image->extension . "" . "" . $content;
                                    ?>
                                    <img class="image-in-table2" src="{{$image}}" alt="{{$actor_actress->title}}">
                                    @else
                                    <img class="image-in-table2" src="{{asset('images/actor_actress_placeholder.jpg')}}" alt="{{$actor_actress->title}}">
                                    @endif
                                </div>
                                <div class="table-text-area">
                                    <p class="table-text-area2">
                                        {{$actor_actress->name}}
                                    </p>
                                </div>
                                <div class="button-above">
                                    {{$actor_actress->pivot->role}}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Critics -->
            <div class="show-art-table-act-1">
                <div class="title-area">
                    <h3 class="title-area-text">Critics</h3>
                </div>
                <div class="title-area">
                    @can('critics.create')
                        <a href="{{route('critics.create',['art'=>$art])}}">
                            <button class=" show-art-table-critic1">
                                <span class="button-span">
                                    Add a Critic
                                </span>
                            </button>
                        </a>
                    @endcan
                </div>
                <div class="inner-table1">
                    <ul role="list" class="inner-table2">
                        @foreach ($critics as $critic)
                        <li class="row-separation ">

                            <div class="show-art-table-critic2">

                                <div>
                                    <h2 class="show-art-table-critic3">{{$critic->from}}</h2>
                                    <p class="show-art-table-critic4">{{$critic->comment}}</p>
                                </div>
                                <div class="show-art-table-critic5">
                                    <div class="show-art-table-critic6">{{$critic->rating}}</div>
                                </div>
                            </div>
                        </li>
                        @can('critics.edit')
                            <li class="row-separation ">
                                <div class="button-above">
                                    <a href="{{route('critics.edit',$critic)}}">
                                        <button class="button-purple-to-pink">
                                            <span class="button-span">
                                                Edit
                                            </span>
                                        </button>
                                    </a>
                                    <form action="{{route('critics.destroy',['critic' => $critic, 'art' => $art])}}" method="POST">
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
                        @endcan
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>