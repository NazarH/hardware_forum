<div class="footer">
	<div class="statistic">
		<div class="statistic__header">
			Статистика
		</div>
		<div class="statistic__block">
			<div>
				Всього повідомлень: <span>{{$postsMessages}}</span>
			</div>
			<div>
				Всього тем: <span>{{$postsCount}}</span>
			</div>
			<div>
				Всього учасників: <span>{{$userCount}}</span>
			</div>
			<div>
				Останній зареєстрований учасник: <span>{{$lastUser[0]->name}}</span>
			</div>
		</div>
	</div>
	<div class="statistic__general">
		<div>
			<a href="" class="statistic__logo">HardwareForum.ua</a>
		</div>
		<div>
			<div>
				Правила конференції
			</div>
			<div>
				Видалити cookies форуму
			</div>
			<div>
				Часовий пояс: {{date_default_timezone_get()}}
			</div>
		</div>
	</div>
</div>