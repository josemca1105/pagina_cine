import { Component } from '@angular/core';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import {
  faBars,
  faLock,
  faUserCircle,
} from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-page',
  standalone: true,
  imports: [FontAwesomeModule],
  templateUrl: './home-page.component.html',
  styleUrl: './home-page.component.css'
})
export class HomePageComponent {

  title = 'loginPage';
  public faUserCircle = faUserCircle;
  public faBars = faBars;
  public faLock = faLock;

}
