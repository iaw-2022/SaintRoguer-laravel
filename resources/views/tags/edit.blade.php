<x-app-layout>
    <div class="main-show-art full-height">
        <div class="form-table ">
            {!! Form::model($tag,['route'=>['tags.update',$tag], 'method' =>'put']) !!}
            <div class="mb-6">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the name of the tag']) !!}
                @error('name')
                <span class="text-danger form-error-text">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Update tag', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>