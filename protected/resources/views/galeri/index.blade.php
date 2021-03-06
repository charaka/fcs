@extends('template')
@section('title')
  <h1>
    Galeri  
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
        <a href="{{ url('galeri/create') }}" class="btn btn-md btn-primary btn-flat pull-right" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></a>
      </div>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-condensed table-bordered table-striped" id="tb_galeri" style="width: 100%"> 
          <thead>
            <tr>
              <th>No</th>
              <th width="30%">Judul</th>
              <th width="10%">Status</th>
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
  var tb_galeri = $('#tb_galeri').dataTable( {
    processing: true,
        serverSide: true,
        ajax: '{{ url("galeri/listing") }}',
        columns: [
            {data: 'no', name: 'no',width:"2%"},
            {data: 'judul_in', name: 'judul_in'},                                                
            {data: 'status_id', name: 'status_id'},                                                
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
      
  $('#tb_galeri_filter input').unbind();
  $('#tb_galeri_filter input').bind('keyup', function(e) {
    if(e.keyCode == 13) {
      tb_galeri.fnFilter(this.value);
    }
  })

  function show_form(id = ""){
    if(id == ""){
      url_form = '{{url("kategori/create")}}';
      title_form = 'Tambah Data';
    } else {
      url_form = '{{url("kategori/")}}/'+id+'/edit';
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
                      url : '{{ url("galeri") }}/'+id,
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
                                location.href = "{{ url('galeri') }}";
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

  function aktif_post(id){
      $.confirm({
        title: 'Ubah Status',
        type: 'red',
        icon: 'fa fa-warning',
        escapeKey: true, // close the modal when escape is pressed.
        content: 'Apakah anda yakin akan merubah status data ini ?',
        backgroundDismiss: true, // for escapeKey to work, backgroundDismiss should be enabled.
        buttons: {
            okay: {
                keys: [
                    'enter'
                ],
                action: function () {
                  $.ajax({
                      url : '{{ url("galeri") }}/aktif_post',
                      data : { id:id },
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      type : 'POST',
                      dataType : 'json',
                      success:function(data){
                              if(data.submit=='1'){
                                $.alert({
                                  title: 'Hapus Data',
                                  type : 'green',
                                  content :data.msg
                                });   
                                location.href = "{{ url('galeri') }}";
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