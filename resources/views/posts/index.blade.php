@extends('layouts.login')

@section('content')

<script>
window.onload = function() {
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) //モーダルを呼び出すときに使われたボタンを取得
  var recipient = button.data('whatever') //data-whatever の値を取得

  //Ajaxの処理はここに

  var modal = $(this)  //モーダルを取得
  modal.find('.modal-title').text('New message to ' + recipient) //モーダルのタイトルに値を表示
  modal.find('.modal-body input#post').val(recipient) //inputタグにも表示
  var formmodel = document.getElementById('formmodel');
//formmodel.innerHTML = "かきかえました<div class=" + recipient +"></div>";
})
}
</script>

<div class="container">
        {!! Form::open(['url' => 'top']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        </div>
        <button type="submit" class="btn-create"></button>
        {!! Form::close() !!}
    </div>


<div class="container">
        <table class='table table-hover'>
            @foreach ($list as $list)
            <tr>
                <td><a href="{{ url('profile'.$list->follow_id) }}"><img src="images/{{$list->image}}"></a></td>
                <td>{{ $list->username }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->updated_at }}</td>

                @if(Auth::id() == $list->user_id)

                <td>
                <button type="button" class="update" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$list->post}}"><img src="images/edit.png"></button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                      </div>
                      <div class="modal-body">
                        <form method="POST" action="post/update">
                          <div class="form-group">
                            <label for="post" class="control-label">Tweet</label>
                            <input type="text" class="form-control" id="post" maxLength="150" >
                            <input id="id" class="form-control" type="hidden" name="id" value="">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="update"><img src="images/edit.png"></button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
                <td><a href="/{{$list->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png" onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'"></a></td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>



@endsection
