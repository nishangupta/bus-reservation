# About Bus reservation
Bus reservation is made with laravel 8.10 and vue js. <br/>
Having user,admin role and permissions <br/>
Live : [Click Me](http://bus-reservation24.herokuapp.com/) <br/>

<br />
>Installation at the bottom 
<br />

<br />
### Screenshots of this app

<p>
    
### Home Page
<a href="https://i.ibb.co/yWRZv34/Screenshot-87.png"><img src="https://i.ibb.co/yWRZv34/Screenshot-87.png" target="_blank" alt="Capture" border="0" /></a>
<br />

### Vuejs Admin customer live chat
<a href="https://i.ibb.co/ccsrB0t/Screenshot-91.png"><img src="https://i.ibb.co/ccsrB0t/Screenshot-91.png" target="_blank" alt="Screenshot-23"
border="0" /></a>
<br />

### Dashboard
<a href="https://i.ibb.co/tHYrgVf/Screenshot-86.png"><img src="https://i.ibb.co/tHYrgVf/Screenshot-86.png" target="_blank" alt="Screenshot-9"
border="0" /></a>
<br />

### Bus finder
<a href="https://i.ibb.co/551DHT5/Screenshot-85.png"><img src="https://i.ibb.co/551DHT5/Screenshot-85.png" alt="Screenshot-46" border="0" /></a>
<br />

### Reservations
<a href="https://i.ibb.co/vkz2vbr/Screenshot-90.png"><img src="https://i.ibb.co/vkz2vbr/Screenshot-90.png" alt="Screenshot-46" border="0" /></a>
<br />

### My reservations
<a href="https://i.ibb.co/f0NgwTm/Screenshot-88.png"><img src="https://i.ibb.co/f0NgwTm/Screenshot-88.png" target="_blank" alt="Screenshot-10"
border="0" /></a>
<br />

</p>

## Installations

<br />
## If you receive and error while installation below::

> run composer update instead of composer install
> also run php artisan key:generate

## 1. Clone the repository

> https://github.com/nishangupta/bus-reservation.git

<br />

## 2. Set the basic config

> Edit example.env to .env <br/>
> Put your db username and password here with DB_DATABASE=busreservation. <br />
> '''

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=busreservation
    DB_USERNAME=root 
    DB_PASSWORD= 

'''
<br />

## 3. Install Dependencies

> ~composer install <br/>
> ~npm install <br/>
> ~npm run dev
> <br />

## 4. Migrate Database

> ~php artisan migrate:fresh <br>
> ~php artisan db:seed <br/>

## 5. Serve application

> ~php artisan serve <br />

