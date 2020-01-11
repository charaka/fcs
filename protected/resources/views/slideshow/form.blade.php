<div class="box-body">  
  <fieldset>
    <legend>Image Slide Show</legend>
  
    <div class="row">
      <div class="main_tmp">
        @if(!empty($slide_show->image))
        <div class="form-group">
          <div class="col-md-12">
            <img src="{{ url($slide_show->image) }}" width="40%">
          </div>
        </div>
        @else
        @endif
        <div class="form-group">
          <div class="col-md-6">
            {!! Form::label('image', 'Image Slide Show') !!}
            {!! Form::file('image', ['id'=>'image','class' => 'galerix', 'placeholder' => 'Galeri', 'accept' => 'image/jpeg,image/x-png']) !!}
          </div>
        </div>
        
      </div>
    </div>
  </fieldset>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('url', 'URL') !!}
        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL','id'=>'url']) !!}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('lokasi', 'Lokasi') !!}
        {!! Form::select('id_lokasi', ['' => 'Pilih Lokasi...']+$lokasi , $slide_show->id_lokasi, ['class' => 'form-control select2','style'=>'width:100%']) !!}
      </div>
    </div>
  </div>
</div>


<!-- /.box-body -->


