<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::open(['route' => ['critics.store',$art]]) !!}
            <div class="form-separation">
                {!! Form::label('from', 'From', ['class' => 'form-label']) !!}
                {!! Form::text('from', null, ['class' => 'form-control form-text ', 'placeholder' => 'Input the name of the critic']) !!}
                @error('from')
                <span class="form-text-danger">{{$message}}</span>
                @enderror
            </div>

            {!! Form::hidden('art_id', $art->id) !!}

            <div class="form-separation">
                {!! Form::label('comment', 'Comment', ['class' => 'form-label']) !!}
                {!! Form::textarea('comment', null, ['rows' => 4,'cols' => 54,'class' => 'form-control form-textarea', 'placeholder' => 'Input the comment of the movie or TVShow']) !!}
                @error('comment')
                <span class="form-text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-separation">
                {!! Form::label('rating', 'Rating', ['class' => 'form-label']) !!}
                {!! Form::number('rating', null, ['class' => 'form-control form-number', 'placeholder' => 'Input the rating of the movie or TVShow']) !!}
                @error('rating')
                <span class="form-text-danger">{{$message}}</span>
                @enderror
            </div>


            {!! Form::submit('Add critic', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>