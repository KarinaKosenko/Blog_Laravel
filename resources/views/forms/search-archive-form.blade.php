<form method="get">
	<strong>Год:</strong><br>
	<select name="year">
			
	@for ($year = 2017; $year <= getCurrentYear(); $year++)
		<option value="{{ $year }}">{{ $year }}</option>
	@endfor
   
   </select><br>
   
   <strong>Месяц:</strong><br>
	<select name="month">
	
	@foreach(getMonthsList() as $name => $number){
		<option value="{{ $number }}">{{ $name }}</option>
	@endforeach
   
   </select><br>
	<input type="submit" value="Поиск"><br>
</form>