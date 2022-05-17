<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::open(['route' => 'arts.store','files'=>true]) !!}
            <div class="form-separation">
                {!! Form::label('imdb_id', 'IMBD ID', ['class' => 'form-label']) !!}
                {!! Form::text('imdb_id', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the imbd id of the movie or TVShow']) !!}
                @error('imdb_id')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the title of the movie or TVShow']) !!}
                @error('title')

                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror

            </div>

            <div class="form-separation">
                {!! Form::label('slug', 'Slug', ['class' => 'form-label']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the slug of the movie or TVShow']) !!}
                @error('slug')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('type', 'Type',['class' => 'form-label']) !!}
                {!! Form::select('type', $type,null,['class'=> 'form-select']) !!}

                @error('type')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror

            </div>

            <div class="form-separation">
                {!! Form::label('year', 'Year of release', ['class' => 'form-label']) !!}
                {!! Form::number('year', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the release year of the movie or TVShow']) !!}
                @error('year')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('realeaseDate', 'releaseDate', ['class' => 'form-label']) !!}
                {!! Form::date('releaseDate', null, ['class' => 'form-control form-date', 'placeholder' => 'Input the release date of the movie or TVShow']) !!}
                @error('releaseDate')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('duration', 'Duration', ['class' => 'form-label']) !!}
                {!! Form::number('duration', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the duration in minutes of the movie or TVShow']) !!}
                @error('duration')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('plot', 'Plot', ['class' => 'form-label']) !!}
                {!! Form::textarea('plot', null, ['rows' => 4,'cols' => 54,'class' => 'form-control form-textarea', 'placeholder' => 'Input the plot of the movie or TVShow']) !!}
                @error('plot')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('userRating', 'User Rating', ['class' => 'form-label']) !!}
                {!! Form::number('userRating', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the user rating of the movie or TVShow']) !!}
                @error('userRating')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('imdbRating', 'IMBD Rating', ['class' => 'form-label']) !!}
                {!! Form::number('imdbRating', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the imdb rating of the movie or TVShow']) !!}
                @error('imdbRating')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('director', 'Director', ['class' => 'form-label']) !!}
                {!! Form::text('director', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the director of the movie or TVShow']) !!}
                @error('director')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-separation">
                {!! Form::label('videoLink', 'Video Link', ['class' => 'form-label']) !!}
                {!! Form::text('videoLink', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the video link of the movie or TVShow']) !!}
                @error('videoLink')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>

            <div class="form-image-row">
                <div class="col">
                    <div class="image-wrapper">

                        <img src="{{asset('images/art_placeholder.jpg')}}" />
                    </div>
                </div>
                <div class="col form-label">
                    <div class="form-group">
                        {!! Form ::label('file','Default image', ['class' => 'form-label']) !!}
                        {!! Form ::file('file',['class'=>'form-control-file form-image','accept'=>'image/*']) !!}
                        @error('file')
                        <span class="form-text-danger form-error-text">{{$message}}</span>
                        @enderror
                    </div>
                    You can select an image from your drive to change the default image of the art.
                </div>
            </div>
            {!! Form::submit('Create art', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>