
#### Каталог книг

Можно создавать/удалять/редактировать/искать книги.
Можно бронировать книги. При бронировании занятые(другими бронированиями) даты недоступны.
Перед занесением бронирования в базу корректность дат еще раз проверяется.
При удалении книги все её бронирования удаляются.

Для back-end я использовал примитивный Model View Controller - фреймворк с роутингом.
Роутер вызывает методы из контроллеров, контроллеры запрашивают модели,  отображают View или возвращиют json.
Фронт я сделал как single page application, все взаимодействие с сервером через ajax-запросы (кроме открытия  index-страницы)
Работа с БД через pdo.
менеджеры пакетов (composer и npm) я не использовал т.к. было указано работа с чистом php и jquery.

#### Какие были альтернативы?
Вместо jquery можно было использовать React. Также я бы использовал ORM вместо чистых запросов и какой-нибудь шаблонизатор (типа smarty)
Для таблицы книг я бы использовал DataTables (удобный пакет для таблиц со встроеной пагинацией, поиском)


***
Запуск:
docker-compose build;
docker-compose up;
Открыть http://localhost:8080/

#### Использованы библиотеки
-jquery; 
-jquery-ui (для календаря);
-semantic-ui;
