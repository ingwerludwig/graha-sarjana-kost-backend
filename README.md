<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


<p align="center">
  <img src="https://user-images.githubusercontent.com/54592376/205731352-0bb97163-c712-4f57-a34a-41d0da26096b.png" width="150" height="150">
</p>


<!-- ABOUT THE PROJECT -->
## About The Project


### PPL Implementation - Graha Sarjana Kost

| Nama                                  | NRP        |
|---------------------------------------|------------|
| Ida Bagus Kade Rainata Putra Wibawa   | 5025201235 |
| Muhammad Amin                         | 5025201251 |
| Ingwer Ludwig Nommensen               | 5025201259 |
| Muhammad Afdal Abdallah               | 5025201163 |
| Kadek Ari Dharmika                    | 5025201239 |


Graha-sarja-kost App is an Implementation of Software Design's Final Project using Framework Laravel 8 on server-side and Framework Vue.js on the client-side
Built with Monolith Architecture combined with Repository Design Pattern

### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]
* [![Postgres][Postgre.com]][Postgre-url]


<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

**First thing first**, install latest<a href="https://www.php.net/manual/en/install.php"> PHP </a> (min PHP 8) and follow those instruction based on your devices type

**Second**, install <a href="https://getcomposer.org/download">Composer</a> and follow those instruction

**Third**, install laravel from downloaded composer, in your terminal run
    ```
    composer global require laravel/installer
    ```
    
**Forth**, install latest<a href="https://www.postgresql.org/download"> PostgreSQL </a> (min Postgre 14) and follow those instruction based on your devices type

**Fifth**, install <a href="https://www.postman.com/downloads/">Postman</a> or other API developers and follow those instruction based on your devices type if you want to test out your API

**Sixth**, install latest <a href="https://nodejs.org/en/download/"> NodeJS </a> (min NodeJS v16) and follow those instruction based on your devices type


### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/ingwerludwig/graha-sarjana-kost-backend.git
   ```
  
2. Create Database in PostgreSQL named **graha-sarjana-kost**

3. Download and Install Vue.js Dependencies in terminal
    ```sh
    npm install
    ```

4. Download and Install Laravel 8 Dependencies in terminal
    ```sh
    composer install
    ```
5. In your cloned proejct, setup your .env to your local configuration

6. Generate JWT Secret on your app in terminal
    ```sh
    php artisan jwt:secret
    ```
    
7.  Migrate your database in terminal
   ```sh
   php artisan migrate
   ```   

8. Run your Vue.js in terminal
    ```sh
    npm run watch
    ```

9. Run your Laravel 8 in terminal
    ```sh
    php artisan serve
    ```

<!-- USAGE EXAMPLES -->
## Usage
_For more examples request and response, please refer to the [Documentation](https://smeci-abdimas.postman.co/workspace/FP-PPL~5fd8b115-591f-47ac-955a-586d97012f60/collection/16008949-e8771ea9-2d7e-4b2a-96b2-22299f9084d3?action=share&creator=16008949)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- CONTRIBUTING -->
## Contributing

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com


[Springboot.com]: https://img.shields.io/badge/Spring-6DB33F?style=for-the-badge&logo=spring&logoColor=white
[Springboot-url]: https://spring.io/projects/spring-boot
[Java.com]: https://img.shields.io/badge/Java-ED8B00?style=for-the-badge&logo=java&logoColor=white
[Java-url]: https://www.java.com/en/


[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
[Postgre.com]: https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white
[Postgre-url]: https://www.postgresql.org/
