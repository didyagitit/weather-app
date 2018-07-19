# Weather App

### Setup Backend


```bash
cd backend
```

Install all dependencies

```bash
composer install
```

Add your MySQL credentials in the .env file

```bash
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```
Create and populate MySQL Database

```bash
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load
```
Start the backend server

```bash
bin/console server:run
```

### Setup Frontend

```bash
# If you are following the previous steps
cd ../frontend
# If you are in the project root
cd frontend
```

Install all dependencies

```bash
yarn install
```

Run dev server

```bash
yarn start
```


### What would you do differently if you had more time?

- Would have used redux to deal with data in the Frontend;
- Add proper authentication logic;
- Add proper CSS styling;
- Add tests;

### With which parts of the application are you satisfied?

- I like the code organization (components, styles, utils, etc.).

### Which parts would need improvement?

- Frontend Server for production;
- Add more functionality on both Frontend and Backend;
- Please see reply to 'What would you do differently if you had more time?' for
  more.
