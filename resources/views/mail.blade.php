こんにちは{{ $contact['name'] }}さん。<br>
@if (array_key_exists('syumi', $contact))
趣味<br>
{{ $contact['syumi'] }}
@else
特技<br>
{{ $contact['tokugi'] }}
@endif
問い合わせ内容は以下の通りです。<br>
{{ $contact['contact'] }}<br>