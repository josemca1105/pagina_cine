import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PeliculasPageComponent } from './peliculas-page.component';

describe('PeliculasPageComponent', () => {
  let component: PeliculasPageComponent;
  let fixture: ComponentFixture<PeliculasPageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PeliculasPageComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PeliculasPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
