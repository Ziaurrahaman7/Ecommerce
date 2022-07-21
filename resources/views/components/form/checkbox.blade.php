@props(['name','type'=>'checkbox'])
<div class="col-md-6 mt-3">
    <div class="form-group">
        <x-form.label for="{{$name}}" name="{{$name}}"/>
        <input class="form-control" 
        type="{{$type}}"
         name="{{$name}}" 
          placeholder="{{$name}}" 
          id="{{$name}}"
          {{$attributes(['value'=>old($name)])}}
          />
    </div>
    <x-form.eror name="{{$name}}"/>
</div>