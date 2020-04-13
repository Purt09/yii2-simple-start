# CRM_army
CRM for 5fak

## Install
```
git clone https://github.com/Purt09/CRM_army.git
php init
```
С настройками Development - [0] \
Создать базу данных \
В файле common/main-local.php прописать данные для БД \
###Поднимаем БД
```
php yii migrate up
php yii migrate --migrationPath=@yii/rbac/migrations/
php yii rbac/init
```
##Настройка сервера
Настраиваем домены (Присерно так: https://prnt.sc/rxwreb)\
Рекомендую сделать всего один домен в корень проекта(Как на скрине)\
Версия php 7.2+\
Версия MySQL 5.7+\
###Подключаем пакеты
```
composer install
```
###Пользователи которые уже созданы:
Admin \
fas123
----
Cafet \
fas123
---
Officer \
fas123
###Настройка сайта
Необходима поменять домен в файле common/config/params.php на свои (Иначе не будут работаь cookie and session)
