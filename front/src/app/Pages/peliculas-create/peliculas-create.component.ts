import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-peliculas-create',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './peliculas-create.component.html',
  styleUrl: './peliculas-create.component.css'
})
export class PeliculasCreateComponent {

  imagen: string = '';
  nombre: string = '';
  descripcion: string = '';
  duracion: string = '';
  genero: string = '';
  estreno: string = '';

  peliculasArray: any[] = [];

  currentPeliculaID = '';

  constructor(private http: HttpClient, private router: Router) {
    this.getAllPelicula();
  }

  getAllPelicula() {
    this.http.get('http://127.0.0.1:8000/api/peliculas').subscribe((resultData: any) => {
      this.peliculasArray = resultData;
    });
  }

  register() {
    let bodyData = {
      'imagen': this.imagen,
      'nombre': this.nombre,
      'descripcion': this.descripcion,
      'duracion': this.duracion,
      'genero': this.genero,
      'estreno': this.estreno
    };

    this.http.post('http://127.0.0.1:8000/api/peliculas/create', bodyData).subscribe((resultData: any) => {
      alert('Pelicula creada con exito!');
      this.getAllPelicula();
      this.imagen = '';
      this.nombre = '';
      this.descripcion = '';
      this.duracion = '';
      this.genero = '';
      this.estreno = '';
      this.router.navigateByUrl('peliculas');
    });
  }

  savePelicula() {
    if (this.currentPeliculaID == '') {
      this.register();
    }
  }

}
