<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::open(['route' => 'actors-actresses.store','files'=>true]) !!}
            <div class="mb-6">
                {!! Form::label('name', 'Name', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('name', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the name of the actor or actress']) !!}
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
                        {!! Form ::label('file','Default image', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                        {!! Form ::file('file',['class'=>'form-control-file block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400','accept'=>'image/*']) !!}
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    You can select an image from your drive to change the default image of the new actor or actress.
                </div>
            </div>
            {!! Form::submit('Add actor/actress', ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>