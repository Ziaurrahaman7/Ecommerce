@props(['name','type'=>'text'])
<div class="col-md-12 mt-3">
  <div class="form-group">
    <x-form.label for="{{$name}}" name="{{$name}}"/>
      <textarea cols="12"
       id="{{$name}}" 
       name="{{$name}}"
        type="{{$type}}" 
         rows="10"
          class="form-control"
          >
          {{$attributes}}
          {{$slot ?? old($name)}}
        </textarea>
        <x-form.eror name="{{$name}}"/>
    </div>
</div>