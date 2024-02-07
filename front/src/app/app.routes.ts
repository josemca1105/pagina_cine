import { Routes } from '@angular/router';
import { HomePageComponent } from './Pages/home-page/home-page.component';
import { LoginPageComponent } from './Pages/login-page/login-page.component';
import { RegisterPageComponent } from './Pages/register-page/register-page.component';
import { SalasPageComponent } from './Pages/salas-page/salas-page.component';
import { SalasCreateComponent } from './Pages/salas-create/salas-create.component';
import { PeliculasComponent } from './Pages/peliculas/peliculas.component';
import { PeliculasCreateComponent } from './Pages/peliculas-create/peliculas-create.component';
import { Movie1Component } from './Pages/Movies/movie1/movie1.component';

export const routes: Routes = [
  { path: '', component: HomePageComponent, title: 'Inicio' },
  { path: 'index', component: HomePageComponent, title: 'Inicio' },
  { path: 'login', component: LoginPageComponent, title: 'Login' },
  { path: 'register', component: RegisterPageComponent, title: 'Registrar Usuario' },
  { path: 'salas', component: SalasPageComponent, title: 'Salas' },
  { path: 'salas/create', component: SalasCreateComponent, title: 'Crear Salas' },
  { path: 'peliculas', component: PeliculasComponent, title: 'Peliculas' },
  { path: 'peliculas/create', component: PeliculasCreateComponent, title: 'Crear Peliculas' },
  { path: 'movies/1', component: Movie1Component, title: 'Pelicula 1' },
];
