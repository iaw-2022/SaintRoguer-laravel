<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::model($favorite,['route'=>['favorites.update', 'favorite'=>$favorite->id], 'method' =>'put']) !!}

            <div class="form-group">
                {!! Form::label('state', 'State',['class' => 'form-label']) !!}
                {!! Form::select('state', $state,null,['class'=> 'form-select']) !!}

                @error('state')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror

            </div>

            <div class="form-separation">
                {!! Form::label('rating', 'Rating', ['class' => 'form-label']) !!}
                {!! Form::number('rating', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the rating of the movie or TVShow']) !!}
                @error('rating')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>


            {!! Form::submit('Update favorite', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>