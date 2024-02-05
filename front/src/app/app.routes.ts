import { Routes } from '@angular/router';
import { HomePageComponent } from './Pages/home-page/home-page.component';
import { LoginPageComponent } from './Pages/login-page/login-page.component';
import { RegisterPageComponent } from './Pages/register-page/register-page.component';
import { SalasPageComponent } from './Pages/salas-page/salas-page.component';
import { PeliculasComponent } from './Pages/peliculas/peliculas.component';

export const routes: Routes = [
  { path: '', component: HomePageComponent, title: 'Inicio' },
  { path: 'index', component: HomePageComponent, title: 'Inicio' },
  { path: 'login', component: LoginPageComponent, title: 'Login' },
  { path: 'register', component: RegisterPageComponent, title: 'Registrar Usuario' },
  { path: 'salas', component: SalasPageComponent, title: 'Salas' },
  { path: 'peliculas', component: PeliculasComponent, title: 'Peliculas' },
];
