<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::open(['route' => 'tags.store']) !!}
            <div class="mb-6">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the name of the tag']) !!}
                @error('name')
                <span class="text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Add actor/actress', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>