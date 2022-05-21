<x-app-layout>
    <div class="main-show-art ">
        <div class="form-table">
            {!! Form::open(['route' => 'arts.api-searching']) !!}
            <div class="mb-6">
                {!! Form::label('title', 'Title', ['class' => 'form-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the title of the Movie or TVShow']) !!}
                @error('title')
                <span class="text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Submit', ['class' => 'form-button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</x-app-layout>