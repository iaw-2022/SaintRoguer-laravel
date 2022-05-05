<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::model($art,['route'=>['arts.update',$art], 'method' =>'put','files'=>true]) !!}

            <div class="mb-6">
                {!! Form::label('imdb_id', 'IMBD ID', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('imdb_id', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the imbd id of the movie or TVShow']) !!}
                @error('imdb_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('title', 'Title', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('title', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('slug', 'Slug', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('slug')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Type',['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::select('type', $type,null,['class'=> 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}

                @error('type')
                <span class="text-danger">{{$message}}</span>
                @enderror

            </div>

            <div class="mb-6">
                {!! Form::label('year', 'Year of release', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::number('year', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('year')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('realeaseDate', 'releaseDate', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::date('releaseDate', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('releaseDate')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('duration', 'Duration', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::number('duration', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('duration')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('plot', 'Plot', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::textarea('plot', null, ['rows' => 4,'cols' => 54,'class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('plot')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('userRating', 'User Rating', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::number('userRating', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('userRating')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('imdbRating', 'IMBD Rating', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::number('imdbRating', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('imdbRating')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('director', 'Director', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('director', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('director')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-6">
                {!! Form::label('videoLink', 'Video Link', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('videoLink', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('videoLink')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        @if($art->image)
                        <?php
                        $content = $art->image->image_content;
                        $image = $art->image->extension . "" . "" . $content;
                        ?>
                        <img src="{{$image}}" alt="{{$art->title}}" />
                        @else
                        <img src="{{asset('images/art_placeholder.jpg')}}" alt="{{$art->title}}" />
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form ::label('file','Default image', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                        {!! Form ::file('file',['class'=>'form-control-file block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400','accept'=>'image/*']) !!}
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    You can select an image from your drive to change the default image of the art.
                </div>
            </div>
            {!! Form::submit('Update art', ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>