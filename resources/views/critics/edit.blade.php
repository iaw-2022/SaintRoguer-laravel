<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::model($critic,['route'=>['critics.update',$critic], 'method' =>'put','files'=>true]) !!}
            <div class="mb-6">
                {!! Form::label('from', 'From', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::text('from', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the name of the critic']) !!}
                @error('from')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-6">
                {!! Form::label('comment', 'Comment', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::textarea('comment', null, ['rows' => 4,'cols' => 54,'class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the comment of the movie or TVShow']) !!}
                @error('comment')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-6">
                {!! Form::label('rating', 'Rating', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::number('rating', null, ['class' => 'form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'placeholder' => 'Input the rating of the movie or TVShow']) !!}
                @error('rating')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            {!! Form::submit('Update critic', ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>