@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
      <div class="panel-heading">                                
        <h3 class="panel-title">List Data Customer</h3>
        <ul class="panel-controls">
          <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
          <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
          <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>                                
      </div>
      <br>
      <div class="pull-left" style="margin-top: 10px;margin-left: 13px;">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm1">Add Customer</button>
      </div>
      <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Input Data Customer</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-md-3 control-label">Customer ID</label>
                  <div class="col-md-8">
                    <input type="text" name="cid" id="cid" class="form-control" placeholder="cid">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Type Mesin</label>
                  <div class="col-md-8">
                    <input type="text" name="type_mesin" id="type_mesin" class="form-control" placeholder="Type Mesin">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Serial Number</label>
                  <div class="col-md-8">
                    <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Nama Customer</label>  
                  <div class="col-md-8">
                    <input id="nama_merchant" name="nama_merchant" type="text" placeholder="Nama Customer" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Alamat</label>  
                  <div class="col-md-8">
                    <textarea id="alamat_merchant" name="alamat_merchant" type="text" placeholder="Alamat Customer" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">PIC Customer</label>  
                  <div class="col-md-8">
                    <input id="pic_merchant" name="pic_merchant" type="text" placeholder="PIC Customer" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Telepon</label>  
                  <div class="col-md-8">
                    <input id="telepon" name="telepon" type="text" placeholder="No Telepon" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" id="add" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table datatable" id="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>CID</th>
              <th>Type Mesin</th>
              <th>Serial Number</th>
              <th>Nama Customer</th>
              <th>Alamat Customer</th>
              <th>PiC Customer</th>
              <th>Telepon</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($merchants as $merchant)
            <tr class="item{{$merchant->id}}">
              <td>{{$merchant->id}}</td>
              <td>{{$merchant->cid}}</td>
              <td>{{$merchant->type_mesin}}</td>
              <td>{{$merchant->serial_number}}</td>
              <td>{{$merchant->nama_merchant}}</td>
              <td>{{$merchant->alamat_merchant}}</td>
              <td>{{$merchant->pic_merchant}}</td>
              <td>{{$merchant->telepon}}</td>
              <td><button class="edit-modal btn btn-info btn-sm" data-id="{{$merchant->id}}" data-tid="{{$merchant->tid}}" data-cid="{{$merchant->cid}}" data-csi="{{$merchant->csi}}" data-type_mesin="{{$merchant->type_mesin}}" data-serial_number="{{$merchant->serial_number}}" data-nama_merchant="{{$merchant->nama_merchant}}" data-alamat_merchant="{{$merchant->alamat_merchant}}" data-pic_merchant="{{$merchant->pic_merchant}}" data-telepon="{{$merchant->telepon}}">Edit</button>
                <button class="delete-modal btn btn-danger btn-sm" data-id="{{$merchant->id}}">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Data Customer</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <div class="form-group">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label class="col-md-3 control-label">cid</label>
                  <div class="col-md-8">
                    <input type="text" name="cid-edit" id="cid-edit" class="form-control" placeholder="cid">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Type Mesin</label>
                  <div class="col-md-8">
                    <input type="text" name="type_mesin-edit" id="type_mesin-edit" class="form-control" placeholder="Type Mesin">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Serial Number</label>
                  <div class="col-md-8">
                    <input type="text" name="serial_number-edit" id="serial_number-edit" class="form-control" placeholder="Serial Number">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Nama Customer</label>  
                  <div class="col-md-8">
                    <input id="nama_merchant-edit" name="nama_merchant-edit" type="text" placeholder="Nama Customer" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Alamat</label>  
                  <div class="col-md-8">
                    <textarea id="alamat_merchant-edit" name="alamat_merchant-edit" type="text" placeholder="Alamat Customer" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">PIC Customer</label>  
                  <div class="col-md-8">
                    <input id="pic_merchant-edit" name="pic_merchant-edit" type="text" placeholder="PIC Customer" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Telepon</label>  
                  <div class="col-md-8">
                    <input id="telepon-edit" name="telepon-edit" type="text" placeholder="No Telepon" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" id="edit" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Delete modal -->
      <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                {{ csrf_field() }}
                <input type="hidden" name="id-delete" id="id-delete">
                <p>Yakin Ingin Menghapus Data? </p>
              </div>
              <div class="form-group" align="right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END DEFAULT DATATABLE -->
</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).on('click', '.edit-modal', function() {
    $('#id-edit').val($(this).data('id'));
    $('#tid-edit').val($(this).data('tid'));
    $('#cid-edit').val($(this).data('cid'));
    $('#csi-edit').val($(this).data('csi'));
    $('#type_mesin-edit').val($(this).data('type_mesin'));
    $('#serial_number-edit').val($(this).data('serial_number'));
    $('#nama_merchant-edit').val($(this).data('nama_merchant'));
    $('#alamat_merchant-edit').val($(this).data('alamat_merchant'));
    $('#pic_merchant-edit').val($(this).data('pic_merchant'));
    $('#telepon-edit').val($(this).data('telepon'));
    $('.bs-example-modal-sm2').modal('show');
  });
  $(document).on('click', '.delete-modal', function() {
    $('#id-delete').val($(this).data('id'));
    $('.bs-example-modal-sm3').modal('show');
  });
  $("#add").click(function() {

    $.ajax({
      type: 'post',
      url: '/merchant/store',
      data: {
        '_token': $('input[name=_token]').val(),
        'tid': $('input[name=tid]').val(),
        'cid': $('input[name=cid]').val(),
        'csi': $('input[name=csi]').val(),
        'type_mesin': $('input[name=type_mesin]').val(),
        'serial_number': $('input[name=serial_number]').val(),
        'nama_merchant': $('input[name=nama_merchant]').val(),
        'alamat_merchant': $('textarea[name=alamat_merchant]').val(),
        'pic_merchant': $('input[name=pic_merchant]').val(),
        'telepon': $('input[name=telepon]').val(),
      },
      success: function(data) {
        if ((data.errors)){
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        }
        else {
          $('.error').remove();
          $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.tid + "</td><td>" + data.cid + "</td><td>" + data.csi + "</td><td>" + data.type_mesin + "</td><td>" + data.serial_number + "</td><td>" + data.nama_merchant + "</td><td>" + data.alamat_merchant + "</td><td>" + data.pic_merchant + "</td><td>" + data.telepon + "</td><td><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-tid='" + data.tid + "' data-cid='" + data.cid + "' data-csi='" + data.csi + "' data-type_mesin='" + data.type_mesin + "' data-serial_number='" + data.serial_number + "' data-nama_merchant='" + data.nama_merchant +"'  data-alamat_merchant='" + data.alamat_merchant + "' data-pic_merchant='" + data.pic_merchant + "' data-telepon='" + data.telepon + "'>Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-tid='" + data.tid + "' data-cid='" + data.cid + "' data-csi='" + data.csi + "' data-type_mesin='" + data.type_mesin + "' data-serial_number='" + data.serial_number + "' data-nama_merchant='" + data.nama_merchant +"'  data-alamat_merchant='" + data.alamat_merchant + "' data-pic_merchant='" + data.pic_merchant + "' data-telepon='" + data.telepon + "'>Delete</button></td></tr>");
          toastr.success("Data Berhasil Disimpan.");
        }
      },
    });
    $('#tid').val('');
    $('#cid').val('');
    $('#csi').val('');
    $('#type_mesin').val('');
    $('#serial_number').val('');
    $('#nama_merchant').val('');
    $('#alamat_merchant').val('');
    $('#pic_merchant').val('');
    $('#telepon').val('');
  });

  $("#edit").click(function() {
    $.ajax({
      type: 'post',
      url: '/merchant/update',
      data: {
        '_token': $('input[name=_token]').val(),
        'id' : $('input[name=id]').val(),
        'tid': $('input[name=tid-edit]').val(),
        'cid': $('input[name=cid-edit]').val(),
        'csi': $('input[name=csi-edit]').val(),
        'type_mesin': $('input[name=type_mesin-edit]').val(),
        'serial_number': $('input[name=serial_number-edit]').val(),
        'nama_merchant': $('input[name=nama_merchant-edit]').val(),
        'alamat_merchant': $('textarea[name=alamat_merchant-edit]').val(),
        'pic_merchant': $('input[name=pic_merchant-edit]').val(),
        'telepon': $('input[name=telepon-edit]').val()
      },
      success: function(data) {
        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.tid + "</td><td>" + data.cid + "</td><td>" + data.csi + "</td><td>" + data.type_mesin + "</td><td>" + data.serial_number + "</td><td>" + data.nama_merchant + "</td><td>" + data.alamat_merchant + "</td><td>" + data.pic_merchant + "</td><td>" + data.telepon + "</td><td><button class='edit-modal btn btn-info btn-sm' data-id='" + data.id + "' data-nama='" + data.nama + "' data-phone='" + data.phone + "'>Edit</button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'>Delete</button></td></tr>");
        toastr.success("Data Berhasil Diubah.");
      },
    });
  });

  $("#delete").click(function() {
    $.ajax({
      type: 'post',
      url: '/merchant/delete',
      data: {
        '_token': $('input[name=_token]').val(),
        'id' : $('input[name=id-delete]').val()
      },
      success: function(data) {
        $('.item' + data.id).remove();
        toastr.success("Data Berhasil Dihapus.");
      }
    });
  });
</script>
@endsection