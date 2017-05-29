<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
		<ul>
			@foreach ($menu as $key)
				<li>
					@if($key['is_active'])
						class='current'
					@endif
						<a href="{{ $key['href'] }}">{{ $key['text'] }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</div> 