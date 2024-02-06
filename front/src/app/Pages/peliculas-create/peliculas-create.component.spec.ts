import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PeliculasCreateComponent } from './peliculas-create.component';

describe('PeliculasCreateComponent', () => {
  let component: PeliculasCreateComponent;
  let fixture: ComponentFixture<PeliculasCreateComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PeliculasCreateComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PeliculasCreateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
