<x-app-layout>
    <div class="main-show-art ">
        <div class="p-4 rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            {!! Form::model($actor_actress,['route'=>['actors-actresses.update',$actor_actress], 'method' =>'put','files'=>true]) !!}
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
                        @if($actor_actress->image)
                        <?php
                        $content = $actor_actress->image->image_content;
                        $image = $actor_actress->image->extension . "" . "" . $content;
                        ?>
                        <img src="{{$image}}" alt="{{$actor_actress->title}}" />
                        @else
                        <img src="{{asset('images/actor_actress_placeholder.jpg')}}" alt="{{$actor_actress->title}}" />
                        @endif
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
            {!! Form::submit('Update actor/actress', ['class' => 'form-button']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</x-app-layout>