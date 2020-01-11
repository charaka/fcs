{!! Form::model($lokasi, ['method' => $method, 'id'=>'form-lokasi', 'route' => $route, 'class' => 'validated_form', 'files'=> true]) !!}
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
			{!! Form::label('lokasi', 'Lokasi') !!}
			{!! Form::text('lokasi', $lokasi->lokasi, array('id' => 'lokasi', 'class' => 'form-control', 'placeholder'=>'lokasi', 'required'=>'required')) !!}
		</div>
	</div>
</div>
<br>
<hr>
<div class="row">
	<div class="col-md-12">
		<center>
			<button class="btn btn-md btn-primary btn-flat" type="submit" data-toggle="tooltip" data-placement="top" title="Simpan data"><i class="fa fa-save"></i> Simpan</button> 
 					<a href="#" data-dismiss="modal" class="btn btn-md btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke list data"><i class="fa fa-undo"></i> Kembali</a>
		</center>
	</div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2();
	})
</script>
