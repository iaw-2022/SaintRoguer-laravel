<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::model($critic,['route'=>['critics.update',$critic], 'method' =>'put','files'=>true]) !!}
            <div class="form-separation">
                {!! Form::label('from', 'From', ['class' => 'form-label']) !!}
                {!! Form::text('from', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the name of the critic']) !!}
                @error('from')
                <span class="form-text-danger">{{$message}}</span>
                @enderror
            </div>
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


            {!! Form::submit('Update critic', ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>