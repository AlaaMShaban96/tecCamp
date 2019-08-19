@extends('busniss.layouts.app')

@section('content')
<div class="container-fluid">
  

<form action="{{route('busniss.register.pharmacie')}}" method="post" enctype="multipart/form-data">
@csrf
    <input type="text" name="busnisses_id" value="{{$busniss_id}}" style="display:none">
<input type="text" name="usernmae" id="" value="{{$busniss_name}}" >
    <div class="form-group">
      <label for=""> photo</label>
      <input type="file" class="form-control-file" name="photo" id="" placeholder="" aria-describedby="fileHelpId">
       <small id="fileHelpId" class="form-text text-muted">Help text</small>
    </div>
    <div class="form-group">
      <label for="">lincese</label>
      <input type="file" class="form-control-file" name="lincese" id="" placeholder="" aria-describedby="fileHelpId">
       <small id="fileHelpId" class="form-text text-muted">Help text</small>
    </div>

    <div class="form-group">
      <label for="">descrbtion</label>
      <textarea class="form-control" name="descrbtion" id="" rows="3"></textarea>
    </div>
    

    <div class="form-group">
      <label for=""> Number Phone</label>
      <input type="number"class="form-control" name="number" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
      <label for=""> Opning Time</label>
      <input type="time"
        class="form-control" name="opning_time" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
      <label for=""> Closing Time</label>
      <input type="time"
        class="form-control" name="closing_time" aria-describedby="helpId" placeholder=""> 
    </div>
  
  <div class="form-group">
    <label for="">Diserict</label>
    <select class="form-control" name="diserict" >
      @foreach ($diserict as $item)
          
      
    <option value="{{$item->id}}" >{{$item->name}}</option>
      @endforeach
     
    </select>
  </div>
   <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection