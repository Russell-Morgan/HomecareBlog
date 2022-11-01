# Starting the project

I ran this all using Docker Desktop, WSL2 (Unbutu 22.04.1 LTS).

In 'Windows Terminal' -> Unbutu 22.04.1 LTS sessions:

1. `vendor/bin/sail up` & leave running

2. `vendor/bin/sail php artisan migrate`

3. `vendor/bin/sail php artisan db:seed`

4. `vendor/bin/sail npm install`

5. `vendor/bin/sail npm run dev` & leave running

navigate to `http://localhost/`