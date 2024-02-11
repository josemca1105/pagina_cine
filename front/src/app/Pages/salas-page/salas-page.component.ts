import { NgFor, CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { NgxPaginationModule } from 'ngx-pagination';

@Component({
  selector: 'app-salas-page',
  standalone: true,
  imports: [NgFor, NgxPaginationModule, CommonModule],
  templateUrl: './salas-page.component.html',
  styleUrl: './salas-page.component.css'
})
export class SalasPageComponent {

  p: number = 1;

  nombre: string = "";
  asientos: string = '';
  desde: string = "";
  hasta: string = "";
  tipo: string = "";

  currentSalaID = "";
  SalaArray: any[] = [];

  constructor(private http: HttpClient) {
    this.getAllSala();
  }

  getAllSala() {
    this.http.get("http://127.0.0.1:8000/api/salas").subscribe((resultData: any)=> {
        // console.log(resultData);
        this.SalaArray = resultData;
    });
  }

  setDelete(data: any) {
    this.http.delete("http://127.0.0.1:8000/api/salas/delete" + "/" + data.id).subscribe((resultData: any) => {
        // console.log(resultData);
        alert("Sala Eliminado")
        this.getAllSala();
    });
  }
}
