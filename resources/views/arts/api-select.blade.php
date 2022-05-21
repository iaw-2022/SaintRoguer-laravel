<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            <div class="title-area">
                        <h3 class="title-area-text">Title&Description</h3>
                        <h3 class="title-area-text">Choose one</h3>
            </div>
            <ul role="list" class="inner-table2">
                {!! Form::open(['route' => 'arts.api-save']) !!}
                @foreach ($imdb_array["results"] as $searchResult)
                    <li class="row-separation">
                        <div class="row3 ">                            
                                <div class="table-text-area">
                                    <p class="table-text-area2">
                                        {{$searchResult["title"]}}
                                    </p>
                                    <p class="table-text-area2">
                                        {{$searchResult["description"]}}
                                    </p>
                                </div>
                                <div className='w-full'>
                                    <img src={{$searchResult["image"]}} width="432" height="642">
                                </div>
                                <div  class="flex items-center mr-4 py-4">
                                    {!! Form::radio('imdb_id', $searchResult["id"],['class'=> 'form-radio']) !!}
                                    @error('imdb_id')
                                    <span class="text-danger form-error-text">{{$message}}</span>
                                    @enderror
                                </div>
                        </div>
                    </li>
                @endforeach
                {!! Form::submit('Submit', ['class' => 'form-button']) !!}
                {!! Form::close() !!}
            </ul>
        </div>
    </div>
</x-app-layout>