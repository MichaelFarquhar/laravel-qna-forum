<div>
    <label for="{{$name}}">{{$label}}</label>
    @if($type == 'textarea')
        <textarea
            id="{{isset($id) ? $id : $name}}" 
            name="{{$name}}" 
            class="form-input @error($name) border-red-400 focus:border-red-200 focus:ring focus:ring-red-200 focus:ring-opacity-50 @enderror {{isset($classes) ?? ''}}" 
            placeholder="{{$placeholder ?? ''}}" 
            rows="4"
            {{$required ?? ''}}
        >{{old($name)}}</textarea>
    @else
        <input 
            id="{{isset($id) ? $id : $name}}" 
            name="{{$name}}" 
            class="form-input @error($name) border-red-400 focus:border-red-200 focus:ring focus:ring-red-200 focus:ring-opacity-50 @enderror {{isset($classes) ?? ''}}" 
            type="{{$type}}" 
            placeholder="{{$placeholder ?? ''}}" 
            value="{{old($name)}}"
            {{$required ?? ''}}
        />
    @endif

    @error($name)
        <div class="text-sm text-red-600 py-1.5 px-3">{{ $message }}</div>
    @enderror
</div>