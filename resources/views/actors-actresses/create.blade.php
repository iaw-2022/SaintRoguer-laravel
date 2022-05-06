<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::open(['route' => 'actors-actresses.store','files'=>true]) !!}
            <div class="mb-6">
                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control form-text', 'placeholder' => 'Input the name of the actor or actress']) !!}
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        <img src="{{asset('images/actor_actress_placeholder.jpg')}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form ::label('file','Default image', ['class' => 'form-label']) !!}
                        {!! Form ::file('file',['class'=>'form-control-file form-image','accept'=>'image/*']) !!}
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    You can select an image from your drive to change the default image of the new actor or actress.
                </div>
            </div>
            {!! Form::submit('Add actor/actress', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>