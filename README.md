# Тестовое задание КИТ
<p>Созданы 2 страницы: для администратора (admin.php) и для пользователя (user.php).</p>

<p>admin.php отображает дерево объектов из базы. выводит формы для создания, редактирования и удаления объектов. Доступна только юзерам, заведенным в таблицу "admins" в базе данных. При попытке неавторизованного доступа юзер перенаправляется на форму входа.</p>

<p>user.php отображает дерево объектов с изначально скрытыми дочерними объектами, видны только корневые объекты. Дочерние объекты открываются по нажатию на кнопку "+". Скрытие/раскрытие дочерних объектов реализовано через Javascript. По нажатию на объект отображается его описание из базы. Чтобы не происходило перезагрузки страницы, и пользователю не приходилось заново раскрывать дочерние объекты, описание запрашивается через ajax (файл actions/get_description.php). </p>

<p>Реализовано на PHP, JavaScript, HTML без использования фреймворков и сторонних библиотек.</p>

<h2>Структура папок</h2>

<p>В папке actions - обработчики форм и авторизация</p>
<p>В папке helpers - вспомогательные функции</p>
<p>В папке forms - формы авторизации, создания, редактирования и удаления объектов</p>

<h2>Приложения</h2>
<p>дамп базы данных mysql</p>
