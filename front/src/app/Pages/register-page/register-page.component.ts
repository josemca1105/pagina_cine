import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-register-page',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './register-page.component.html',
  styleUrl: './register-page.component.css'
})
export class RegisterPageComponent implements OnInit {
  nombre: string = '';
  email: string = '';
  password: string = '';

  usuarioArray: any[] = [];

  currentUsuarioID = '';

  constructor(private http: HttpClient, private router: Router) {
    this.getAllUsers();
  }

  ngOnInit(): void {

  }

  getAllUsers() {
    this.http.get('http://127.0.0.1:8000/api/usuarios').subscribe((resultData: any) => {
      this.usuarioArray = resultData;
    });
  }

  register() {
    let bodyData = {
      'nombre': this.nombre,
      'email': this.email,
      'password': this.password
    };

    this.http.post('http://127.0.0.1:8000/api/register', bodyData).subscribe((resultData: any) => {
      alert('Se ha registrado exitosamente');
      this.getAllUsers();
      this.nombre = '';
      this.email = '';
      this.password = '';
      this.router.navigateByUrl('login');
    })
  }

  saveUser() {
    if (this.currentUsuarioID == '') {
      this.register();
    }
  }
}
