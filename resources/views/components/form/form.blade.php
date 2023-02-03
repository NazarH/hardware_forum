@guest
	@php(redirect('login')->send())
@else
	<div class="form__topic">
		<a href="/viewforum/forum-{{$forum[0]->id}}">{{$forum[0]->name}}</a>
		<div>
			<form action="{{route('preview.index')}}" method="get">
				<input type="text" id="preTitleField" name='pre_title'>
				<textarea name="pre_text" id="preTextArea" cols="30" rows="10"></textarea>
				<div onclick="sendData()" class="preSendBtn">Попередній перегляд</div>
				<button type="submit" id="submit" target="_blank"></button>
			</form>
		</div>
	</div>
	<form class="form" action="{{route('viewforum.posting.create', $forum[0]->id)}}" method="POST">
		@csrf
		<div class="form__atrb">
			<div>
				Нова тема
			</div>
			<div>
				<div>
					Заголовок:
				</div>
				<div>
					<input type="text" id="titleField" name="title">
				</div>
			</div>
			<div>
				<span class="form__text-btn" title="Жирний текст: <b>текст</b>" onclick='textWeight()'>
					B
				</span>

				<span class="form__text-btn tilted" title="Нахилений текст: <i>текст</i>" onclick='textTilted()'>
					I
				</span>

				<span class="form__text-btn emphatic" title="Підкреслений текст: <u>текст</u>" onclick='textEmphatic()'>
					U
				</span>

				<span class="form__text-btn" title="Цитата: <q>текст</q>" onclick='textQuote()'>
					Q
				</span>

				<span class="form__text-btn" title="Перекреслений: <s>текст</s>" onclick='textCrossedOut()'>
					S
				</span>

				<span class="form__text-btn list-left" title="Звичаний cписок: <ul></ul>" onclick='textList()'>
					L
				</span>

				<span class="form__text-btn list" title="Нумерований cписок: <ol></ol>" onclick='textNumberList()'>
					LN
				</span>

				<span class="form__text-btn list" 
				title="Елемент списку: <ul><li>елемент</li><li>елемент</li></ul>
			    <ol><li>елемент</li><li>елемент</li></ol>" onclick='textListElement()'>
					Le
				</span>
			</div>
			<div>
				<textarea name="text" id="textArea" cols="30" rows="10" ></textarea>
			</div>
			<div class="form__emot">
				<div onclick="textEmote1()">
					🙂
				</div>
				<div onclick="textEmote2()">
					🙁
				</div>
				<div onclick="textEmote3()">
					😟
				</div>
				<div onclick="textEmote4()">
					😉
				</div>
				<div onclick="textEmote5()">
					😕
				</div>
				<div onclick="textEmote6()">
					😐
				</div>
				<div onclick="textEmote7()">
					😁
				</div>
				<div onclick="textEmote8()">
					😎
				</div>
				<div onclick="textEmote9()">
					😛
				</div>
				<div onclick="textEmote10()">
					😲
				</div>
				<div onclick="textEmote11()">
					🙄
				</div>
				<div onclick="textEmote12()">
					😭
				</div>
				<div onclick="textEmote13()">
					🤔
				</div>
				<div onclick="textEmote14()">
					🤨
				</div>
				<div onclick="textEmote15()">
					😆
				</div>
				<div onclick="textEmote16()">
					🤬
				</div>
				<div onclick="textEmote17()">
					🤢
				</div>
				<div onclick="textEmote18()">
					🤡
				</div>
				<div onclick="textEmote19()">
					👍
				</div>
				<div onclick="textEmote20()">
					👎
				</div>
				<div onclick="textEmote21()">
					🍻
				</div>
			</div>
		</div>
		<div class=form__btns>
			<button>
				Створити
			</button>
		</div>
	</form>
@endguest
