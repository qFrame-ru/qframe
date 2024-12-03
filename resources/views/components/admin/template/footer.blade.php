{{--Футер--}}
<footer class="navbar navbar-expand bg-body-tertiary">
	<div class="container-fluid">
		<ul class="list-unstyled hstack column-gap-3 small mb-0">
			<x-admin.template.footer.label text="Связь с кьюФрейм"/>
			<x-admin.template.footer.link href="https://t.me/m/76kTC2bzZjcy" brand icon="telegram" text="Написать в Telegram"/>
			<x-admin.template.footer.link href="https://t.me/+JMz_sAYCA_cwYWJi" brand icon="telegram" text="Канал в Telegram"/>
			<x-admin.template.footer.link href="https://vk.com/qframe" brand icon="vk" text="Группа в VK"/>
			<x-admin.template.footer.link href="https://qframe.ru" icon="arrow-up-right-from-square" text="Сайт"/>
			<x-admin.template.footer.link href="mailto:qframe.ru@ya.ru" icon="envelope" text="qframe.ru@ya.ru"/>
			@if(false)<x-admin.template.footer.link href="tel:+79953336025" icon="phone" text="+7 995 333 60 25"/>@endif
		</ul>
	</div>
</footer>
