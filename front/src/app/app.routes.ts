import { Routes } from '@angular/router';
import { HomePageComponent } from './Pages/home-page/home-page.component';
import { LoginPageComponent } from './Pages/login-page/login-page.component';
import { RegisterPageComponent } from './Pages/register-page/register-page.component';
import { SalasPageComponent } from './Pages/salas-page/salas-page.component';
import { SalasCreateComponent } from './Pages/salas-create/salas-create.component';
import { PeliculasCreateComponent } from './Pages/peliculas-create/peliculas-create.component';
import { Movie1Component } from './Pages/Movies/movie1/movie1.component';
import { Movie2Component } from './Pages/Movies/movie2/movie2.component';
import { Movie3Component } from './Pages/Movies/movie3/movie3.component';
import { Movie4Component } from './Pages/Movies/movie4/movie4.component';
import { Movie5Component } from './Pages/Movies/movie5/movie5.component';
import { PeliculasPageComponent } from './Pages/peliculas-page/peliculas-page.component';
import { Sala1Component } from './Pages/sala-1/sala-1.component';

export const routes: Routes = [
  { path: '', component: HomePageComponent, title: 'Inicio' },
  { path: 'index', component: HomePageComponent, title: 'Inicio' },
  { path: 'login', component: LoginPageComponent, title: 'Login' },
  { path: 'register', component: RegisterPageComponent, title: 'Registrar Usuario' },
  { path: 'salas', component: SalasPageComponent, title: 'Salas' },
  { path: 'sala/1', component: Sala1Component, title: 'Sala 1' },
  { path: 'salas/create', component: SalasCreateComponent, title: 'Crear Salas' },
  { path: 'peliculas', component: PeliculasPageComponent, title: 'Peliculas' },
  { path: 'peliculas/create', component: PeliculasCreateComponent, title: 'Crear Peliculas' },
  { path: 'movies/1', component: Movie1Component, title: 'John Wick' },
  { path: 'movies/2', component: Movie2Component, title: 'Interestelar' },
  { path: 'movies/3', component: Movie3Component, title: 'Infinity War' },
  { path: 'movies/4', component: Movie4Component, title: 'El Exorcista' },
  { path: 'movies/5', component: Movie5Component, title: 'La La Land' },
];
