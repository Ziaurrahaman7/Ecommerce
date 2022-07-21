@props(['name','type'=>'text'])
<div class="input-group input-group-outline my-3">
    <x-form.label for="{{$name}}" name="{{$name}}"/>
    <input class="form-control" 
        type="{{$type}}"
         name="{{$name}}" 
          id="{{$name}}"
          {{$attributes(['value'=>old($name)])}}
          />
          <x-form.eror name="{{$name}}"/>
    </div>