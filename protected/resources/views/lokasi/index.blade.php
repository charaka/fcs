@extends('template')
@section('title')
  <h1>
    Lokasi
    <small>Index</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kelengkapan PKKMB</a></li>
    <li class="active">Atribut PKKMB</li>
  </ol> -->
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-header">
    <div class="row">
      <div class="col-md-12">
        <a href="javascript:;" class="btn btn-md btn-primary btn-flat pull-right" onclick="show_form()" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></a>
      </div>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-condensed table-bordered table-striped" id="tb_lokasi" style="width: 100%"> 
          <thead>
            <tr>
              <th>No</th>
              <th>Lokasi</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->
@endsection

@section('script')
<script type="text/javascript">
  var tb_lokasi = $('#tb_lokasi').dataTable( {
    processing: true,
        serverSide: true,
        ajax: '{{ url("lokasi/listing") }}',
        columns: [
            {data: 'no', name: 'no',width:"2%"},
            {data: 'lokasi', name: 'lokasi'},                         
            {data: 'action', name: 'id',orderable: false, searchable: false}
        ],
        drawCallback: function (oSettings) {
          $('[data-toggle="tooltip"]').tooltip(); 
        },
        rowCallback: function( row, data, iDisplayIndex ) {
          var api = this.api();
          var info = api.page.info();
          var page = info.page;
          var length = info.length;
          var index = (page * length + (iDisplayIndex +1));
          $('td:eq(0)', row).html(index);
        }

  } );
      
  $('#tb_lokasi_filter input').unbind();
  $('#tb_lokasi_filter input').bind('keyup', function(e) {
    if(e.keyCode == 13) {
      tb_lokasi.fnFilter(this.value);
    }
  })

  function show_form(id = ""){
    if(id == ""){
      url_form = '{{url("lokasi/create")}}';
      title_form = 'Tambah Data';
    } else {
      url_form = '{{url("lokasi/")}}/'+id+'/edit';
      title_form = 'Edit Data';
    }

    $.ajax({
      type: "GET",
      url: url_form,
      async:true,
      beforeSend: function(data){
        // replace dengan fungsi loading
        // $('.overlay').show('slow');
      },
      success:  function(html){
        // $('.overlay').hide('slow');

        $("#modal-large .modal-title").html(title_form);
        $("#modal-large .modal-body-content").html(html);

      },
      complete: function(data){
        $("#modal-large").modal("show");
      },
      error: function(data) {
        alert("error ajax occured!");
      }
    });
  }
  function delete_data(id){
      $.confirm({
        title: 'Hapus Data',
        type: 'red',
        icon: 'fa fa-warning',
        escapeKey: true, // close the modal when escape is pressed.
        content: 'Apakah anda yakin akan menghapus data ini ?',
        backgroundDismiss: true, // for escapeKey to work, backgroundDismiss should be enabled.
        buttons: {
            okay: {
                keys: [
                    'enter'
                ],
                action: function () {
                  $.ajax({
                      url : '{{ url("lokasi") }}/'+id,
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      type : 'DELETE',
                      dataType : 'json',
                      success:function(data){
                              if(data.submit=='1'){
                                $.alert({
                                  title: 'Hapus Data',
                                  type : 'green',
                                  content :data.msg
                                });   
                                location.href = "{{ url('lokasi') }}";
                              }else{
                                $.alert({
                                  title: 'Hapus Data',
                                  type : 'red',
                                  content :data.msg
                                });                  
                              }
                          }
                  })
                }
            },
            cancel: {
                keys: [
                    'ctrl',
                    'shift'
                ],
                action: function () {
                    $.alert({
                      title: 'Hapus Data',
                      type : 'red',
                      content : '<strong>Proses dibatalkan</strong>.'
                    });
                }
            }
        },
    });
  }
</script>
@endsection