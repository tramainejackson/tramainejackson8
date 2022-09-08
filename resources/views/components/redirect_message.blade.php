@if (session('status'))
	<div class="alert alert-info fade show" role="alert">

		<p><strong> {{ session('status') }}</strong></p>

		<script type="text/javascript">
			setTimeout(function() {
                $('.alert').alert('close');
			}, 6000);

		</script>
	</div>
@endif