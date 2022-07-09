
@if($state == true)
	<div class="contentBtnApprove{{ $account }}">
		<a href="#" data-user="{{ $account }}" data-state="0" class="approve-user text-danger">❌ Desaprobar</a>
	</div>
	<a href="#" data-user="{{ $account }}" class="approve-email-user text-success">✅ Correo</a>
@else
	<div class="contentBtnApprove{{ $account }}">
		<a href="#" data-user="{{ $account }}" data-state="1" class="approve-user text-success">✅ Aprobar</a>
	</div>
	<a href="#" data-user="{{ $account }}" class="approve-email-user text-success">✅ Correo</a>
@endif
