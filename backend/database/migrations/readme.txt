as migrações devem ser feitas de maneira gradual, de modo que sejam feitas primeiros as tabelas que não sao relacionadas a nenhuma chave estrangeira para
depois ir migrando as tabelas que contem chaves estrangeiras.

executar o comando: artisan migrate --path=/database/migrations/nome_da_tabela para ir migrando corretamente sem obter erros
A tabela orders nao irá automaticamente pois precisa que a tabela users vá primeiro
Essa é a ordem correta após o erro migrate da tabela orders: 


1)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200116_create_employeers_table.php
2)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200014_create_recipe_table.php
3)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200132_create_deliveries_table.php
4)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200042_create_paymentmethod_table.php
5)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200100_create_orders_table.php
6)./vendor/bin/sail artisan migrate --path=/database/migrations/2024_08_05_200142_create_cart_table.php

