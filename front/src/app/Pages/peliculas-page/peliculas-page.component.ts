import { NgFor, CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { NgxPaginationModule } from 'ngx-pagination';

@Component({
  selector: 'app-peliculas-page',
  standalone: true,
  imports: [NgFor, NgxPaginationModule, CommonModule],
  templateUrl: './peliculas-page.component.html',
  styleUrl: './peliculas-page.component.css'
})
export class PeliculasPageComponent {
  p: number = 1;

  imagen: string = '';
  nombre: string = '';
  descripcion: string = '';
  duracion: string = '';
  genero: string = '';
  estreno: string = '';

  currentPeliculaID = '';
  peliculaArray: any[] = [];

  constructor(private http: HttpClient) {
    this.getAllPelicula();
  }

  getAllPelicula() {
    this.http.get("http://127.0.0.1:8000/api/peliculas").subscribe((resultData: any)=> {
        // console.log(resultData);
        this.peliculaArray = resultData;
    });
  }

  setDelete(data: any) {
    this.http.delete("http://127.0.0.1:8000/api/peliculas/delete" + "/" + data.id).subscribe((resultData: any) => {
        // console.log(resultData);
        alert("Pelicula Eliminado")
        this.getAllPelicula();
    });
  }
}
