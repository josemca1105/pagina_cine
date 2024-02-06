import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-salas-create',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './salas-create.component.html',
  styleUrl: './salas-create.component.css'
})
export class SalasCreateComponent implements OnInit {
  salaArray: any[] = [];

  nombre: string = '';
  asientos: string = '';
  desde: string = '';
  hasta: string = '';
  tipo: string = '';

  currentSalaID = '';

  constructor(private http: HttpClient, private router: Router) {
    this.getAllSala();
  }

  ngOnInit(): void {

  }

  getAllSala() {
    this.http.get('http://127.0.0.1:8000/api/salas').subscribe((resultData: any) => {
      this.getAllSala();
    });
  }

  register() {
    let bodyData = {
      'nombre': this.nombre,
      'asientos': this.asientos,
      'desde': this.desde,
      'hasta': this.hasta,
      'tipo': this.tipo
    }

    this.http.post('http://127.0.0.1:8000/api/salas/create', bodyData).subscribe((resultData: any) => {
      alert('Sala creada con exito!');
      this.getAllSala();
      this.nombre = '';
      this.asientos = '';
      this.desde = '';
      this.hasta = '';
      this.tipo = '';
      this.router.navigateByUrl('salas');
    });
  }

  saveSala() {
    if (this.currentSalaID == '') {
      this.register();
    }
  }
}
