após configurado o seeder, é necessario executar com o comando:

./vendor/bin/sail artisan db:seed --class='nome_do_seeder';



É necessario ir migrando os seeders com o comando abaixo de acordo com a ordem especificada para evitar erros entre chaves estrangeiras:
artisan db:seed --class=UserSeeder

1)./vendor/bin/sail artisan db:seed --class=UserSeeder
2)./vendor/bin/sail artisan db:seed --class=EmployeesSeeder
3)./vendor/bin/sail artisan db:seed --class=DeliveriesSeeder  
4)./vendor/bin/sail artisan db:seed --class=RecipeSeeder
5)./vendor/bin/sail artisan db:seed --class=ProductSeeder     
6)./vendor/bin/sail artisan db:seed --class=PaymentmethodSeeder
7)./vendor/bin/sail artisan db:seed --class=OrderSeeder
8)./vendor/bin/sail artisan db:seed --class=CartSeeder

