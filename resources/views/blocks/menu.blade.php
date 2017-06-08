<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
		<ul>
			@foreach ($menu as $key)
				<li>
					@if ($key->is_active)
						<a class='current' href="{{ $key->href }}">{{ $key->text }}</a>
					@else
						<a href="{{ $key->href }}">{{ $key->text }}</a>
					@endif
				</li>
			@endforeach
		</ul>
	</div>
</div> 