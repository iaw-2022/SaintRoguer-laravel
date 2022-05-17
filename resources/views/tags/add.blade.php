<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::open(['route' => ['tags.addStore',$art]]) !!}
            <div class="form-group">
                {!! Form::label('tag', 'Tag',['class' => 'form-label']) !!}
                {!! Form::select('tag', $unownedTags,null,['class'=> 'form-select']) !!}

                @error('type')
                <span class="form-text-danger form-error-text">{{$message}}</span>
                @enderror

            </div>
            {!! Form::submit('Add tag to movie', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>