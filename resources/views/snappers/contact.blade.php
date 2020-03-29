@extends('layouts.common')

@section('title', 'Contact | 風景写真家「SNAPPERS」')

@section('bodyId', 'contact')

@section('content')
<div id="ajax">
  <button class="btn">背景を更新</button>
</div>
<div class="main-center">
  <h1>Contact</h1>
  <p>SNAPPERSへのアクセス方法、お問い合わせ、撮影のご依頼フォームのページです。お気軽にお問い合わせください。</p>
</div>
<section class="access clearfix">
  <h2 class="icon">Access</h2>
  <table>
    <tr>
      <th>現在地住所</th>
      <td>〒123-4567<br />静岡県伊東市伊豆高原○△☆-12</td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td>012-3456-7890</td>
    </tr>
    <tr>
      <th>電車でのアクセス</th>
      <td>伊豆急行「伊豆高原」駅より徒歩15分</td>
    </tr>
    <tr>
      <th>お車でのアクセス</th>
      <td>伊豆山I.Cより国道135号線経由で50分</td>
    </tr>
  </table>
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d13092.000765136305!2d139.1009012332579!3d34.88134150864278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5LyK6LGG6auY5Y6f!5e0!3m2!1sja!2sjp!4v1587083215413!5m2!1sja!2sjp"
    width="460" height="220" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
    tabindex="0"></iframe>
</section>
<section>
  <h2 class="icon">Contact form</h2>
  <div class="form">
    <form>
      @csrf
      <dl>
        <dt><span class="required">お名前</span></dt>
        <dd>
          <input type="text" name="name" class="name" />
        </dd>
        <dt><span class="required">メールアドレス</span></dt>
        <dd>
          <input type="email" name="email" class="email" />
          <div id="email-msg" class="alert alert-danger"></div>
        </dd>
        <dt>お電話番号</dt>
        <dd>
          <input type="tel" name="tel" class="tel" />
        </dd>
        <dt>お問合せ種別</dt>
        <dd>
          <select name="type" class="type">
            <option value="撮影のご依頼">撮影のご依頼</option>
            <option value="講演・各種メディア出演のご依頼">講演・各種メディア出演のご依頼</option>
            <option value="その他お問い合わせ">その他お問い合わせ</option>
          </select>
        </dd>
        <dt>ご希望のご連絡方法</dt>
        <dd>
          <input type="radio" name="contact" value="Eメール" />Eメール
          <input type="radio" name="contact" value="お電話" />お電話
        </dd>
        <dt>メッセージ</dt>
        <dd>
          <textarea name="message" class="message"></textarea>
        </dd>
        <dt>添付画像</dt>
        <dd>
          <input type="file" name="attachment" class="attachment" />
          <div id="attachment-msg" class="alert alert-danger"></div>
        </dd>
      </dl>
      <button type="submit" class="btn">送信</button>
    </form>
    <div class="attention">
      <p>
        ※「<span class="required"></span>」の付いている項目は必須項目です。<br />
        ※メッセージ送信後、48時間以内に担当者よりご連絡いたします。
      </p>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  $(function() {
    // 非同期通信の共通設定
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'post'
    });

    // 送信ボタン押下イベント
    $('.btn[type="submit"]').on('click', function(e) {
      // submitを無効化
      e.preventDefault();
      $(this).css('pointer-events', 'none');
      $('.form .alert').hide();

      const form = $('.form form').get()[0];
      const formData = new FormData(form);
      $.ajax({
        url: '{{route("snappers.contact")}}',
        data: formData,
        processData: false,
        contentType: false
      }).done(function(data) {
        if (data.errors === null) {
          alert('送信完了！\n背景を更新してください');
          $('.form input, .form textarea').val('');
        } else {
          const errors = data.errors;
          $(Object.keys(errors)).each(function(i, name) {
            $(`#${name}-msg`).text(errors[name][0]).show();
          });
        }
      }).always(function() {
        $('.btn[type="submit"]').css('pointer-events', 'auto');
      });
    });

    $('#ajax .btn').on('click', function() {
      // 二重送信の防止
      $(this).css('pointer-events', 'none');
      // 非同期通信
      $.ajax({
        url: '{{route("snappers.recieve")}}'
      }).done(function(data) {
        const image = data.image;
        if (data.image !== null) {
          $('#contact').css('background-image', `url(data:${image.type};base64,${image.encodedImage})`);
        }
      }).always(function() {
        $('#ajax .btn').css('pointer-events', 'auto');
      });
    });
  });
</script>
@endsection