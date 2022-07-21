@props(['name', 'type'=>'radio'])
<div class="col-md-6 mt-3">
    <div class="mb-3 mb-md-0">
        <x-form.label for="{{$name}}" name="{{$name}}"/>
        <label for="inputradio"> Male    <input name="{{$name}}" id="inputradio" value="male" type="{{$type}}" /></label>
     
        <label for="inputradio"> Female   <input  name="{{$name}}"  id="inputradio" value="female" type="{{$type}}"/></label>
        <x-form.eror name="{{$name}}"/>
    </div>
</div>