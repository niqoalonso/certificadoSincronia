@if(!empty($mensaje))
<button type="button" onclick="VerMensaje(this.id)" id="{{$id}}" class="btn btn-info btn-mini"><i class="fa fa-ellipsis-h "></i></button>
@endif
<button type="button" onclick="EnviarCertificado(this.id)" id="{{$id}}" class="buttonload btn btn-success btn-mini btn-send-icon{{$id}}"><i  id="im{{$id}}" class="fa fa-send"></i></button>
<button type="button" class="btn btn-danger btn-mini" onclick="ConfirmarDelete(this.id)" id="{{$id}}"><i class="fa fa-trash"></i></button>