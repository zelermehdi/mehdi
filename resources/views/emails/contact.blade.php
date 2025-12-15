<h2>Contact — {{ $label }}</h2>

<p><strong>Nom :</strong> {{ $d['name'] }}</p>
<p><strong>Téléphone :</strong> {{ $d['phone'] ?? '—' }}</p>

<hr>

<p style="white-space: pre-wrap">{{ $d['message'] }}</p>
